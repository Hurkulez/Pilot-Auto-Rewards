<?php 
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

class Awards extends CodonModule
{
//Main Functions
	public function HTMLHead() {
        $this->set('sidebar', 'award/award_sidebar.php');
    }
	public function NavBar() {
		if(PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
        	echo '<li><a href="'.SITE_URL.'/admin/index.php/awards">Awards System</a></li>';
		}
    }
	public function index() {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$this->show('award/award_index.php');
	}
	public function last_issues() {
		$this->set('issues', AwardData::last_issues(50));
		$this->show('award/last_issues.php');
	}
//Award Categories
	public function awardadm() {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$this->set('awardadm', AwardData::getAwardCategories());
		$this->show('award/award_admin.php');
	}
	public function category_add() {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
	    $this->show('award/category_add.php');
	    }
	public function category_add_db() {
		if($this->post->name == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error.php');
			return;
		}	
		$ret = AwardData::insert_category($this->post->name, $this->post->ai);
		$this->set('message', 'Award Category Added Successfully!');
		$this->show('core_success.php');
		$this->set('awardadm', AwardData::getAwardCategories());
		$this->show('award/award_admin.php');
		LogData::addLog(Auth::$userinfo->pilotid, "Added an award category named \"{$this->post->name}\"");
	}
	public function categorydelete($id) {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		AwardData::deletecategory($id);
		AwardData::deleteawarda($id);
		AwardData::deleteawardissues($id);
	    $this->set('message', 'Award Category Deleted!');
	    $this->show('core_success.php');
		$this->set('awardadm', AwardData::getAwardCategories());
		$this->show('award/award_admin.php');
	    LogData::addLog(Auth::$userinfo->pilotid, "Deleted an awards category from the database.");
	}
//Awards
	public function awardcat($id) {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$this->set('awardcat', AwardData::getAwardCatin($id));
		$this->set('catdeta', AwardData::getAwardCategoryDet($id));
		$this->show('award/award_category.php');
	}
	public function awardelete($awardid) {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		AwardData::deleteaward($awardid);
		AwardData::deleteawardissuesawa($awardid);
	    $this->set('message', 'Award Deleted!');
	    $this->show('core_success.php');
		$this->set('awardadm', AwardData::getAwardCategories());
		$this->show('award/award_admin.php');
	    LogData::addLog(Auth::$userinfo->pilotid, "Deleted an award from the database.");
	}
	public function award_edit($awardid) {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$this->set('form', AwardData::award_edit_form($awardid));
		$this->set('categories', AwardData::getAwardCategories());
		$this->show('award/award_edit.php');
	}
	public function award_edit_db() {
		if($this->post->name == '' or $this->post->image == '' or $this->post->descrip == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error.php');
			return;
		}
		$name = DB::escape($this->post->name);
		$descrip = DB::escape($this->post->descrip);
		$image = DB::escape($this->post->image);
		$category = DB::escape($this->post->category);
		$awardid = DB::escape($this->post->awardid);
		AwardData::edit_award($name, $descrip, $image, $category, $awardid);
		AwardData::edit_award_issue_award($category, $awardid);
		$this->set('message', 'Award Updated!');
		$this->show('core_success.php');
		$this->set('awardadm', AwardData::getAwardCategories());
		$this->show('award/award_admin.php');

		LogData::addLog(Auth::$userinfo->pilotid, "Updated the award $name");
	    }
	public function award_add($id) {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
	    $this->set('catdet', AwardData::getAwardCategoryDet($id));
	    $this->show('award/award_add.php');
	    }
	public function award_add_db() {
		if($this->post->name == '' or $this->post->descrip == '' or $this->post->image == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error.php');
			return;
		}	
		$ret = AwardData::award_add($this->post->name, $this->post->descrip, $this->post->image, $this->post->category);
		$this->set('message', 'Award Added Successfully!');
		$this->show('core_success.php');
		$this->set('awardadm', AwardData::getAwardCategories());
		$this->show('award/award_admin.php');
		LogData::addLog(Auth::$userinfo->pilotid, "Added an award named \"{$this->post->name}\"");
	}
	public function category_edit($id) {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$this->set('form', AwardData::category_edit_form($id));
		$this->show('award/category_edit.php');
	}
	public function category_edit_db() {
		if($this->post->name == ''){
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error.php');
			return;
		}
		$name = DB::escape($this->post->name);
		$ai = DB::escape($this->post->ai);
		$id = DB::escape($this->post->id);
		AwardData::edit_category($name, $ai, $id);
		$this->set('message', 'Award Category Updated!');
		$this->show('core_success.php');
		$this->set('awardadm', AwardData::getAwardCategories());
		$this->show('award/award_admin.php');
		LogData::addLog(Auth::$userinfo->pilotid, "Updated the award category $name");
	}
	public function issue_edit($id) {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$this->set('form', AwardData::issue_edit($id));
		$this->show('award/issue_edit.php');
	}
	public function issue_edit_db() {
		if($this->post->comment == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error.php');
			return;
		}
		$comment = DB::escape($this->post->comment);
		$id = DB::escape($this->post->id);
		AwardData::edit_award_issue($comment, $id);
		$this->set('message', 'Award Issue Updated!');
		$this->show('core_success.php');
		$this->set('awardadm', AwardData::getAwardCategories());
		$this->show('award/award_admin.php');
		LogData::addLog(Auth::$userinfo->pilotid, "Updated an award issue.");
	    }
//Auto-Awards
	public function auto_awards() {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$this->set('hours', AwardData::settings(1));
		$this->set('flights', AwardData::settings(2));
		$this->set('landings', AwardData::settings(3));
		$this->set('days', AwardData::settings(4));
		$this->set('nauticalmiles', AwardData::settings(5));
		$this->set('awards', AwardData::getallawards());
		$this->show('award/auto_awards.php');
	}
	public function auto_award_edit($id) {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$this->set('set', AwardData::setting_info($id));
		$this->set('awards', AwardData::getallawards());
		$this->show('award/auto_award_edit.php');
	}
	public function autoaward_edit() {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		if($this->post->achieve == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error.php');
			return;
		}
		$achieve = DB::escape($this->post->achieve);
		$awardid = DB::escape($this->post->awardid);
		$type = DB::escape($this->post->type);
		$auto = DB::escape($this->post->auto);
		$id = DB::escape($this->post->id);
		AwardData::edit_autoaward($achieve, $awardid, $type, $auto, $id);
		$this->set('message', 'Auto Award Setting Updated');
		$this->show('core_success.php');
		$this->set('hours', AwardData::settings(1));
		$this->set('flights', AwardData::settings(2));
		$this->set('landings', AwardData::settings(3));
		$this->set('days', AwardData::settings(4));
		$this->set('nauticalmiles', AwardData::settings(5));
		$this->set('awards', AwardData::getallawards());
		$this->show('award/auto_awards.php');
		LogData::addLog(Auth::$userinfo->pilotid, "Updated an auto award setting.");
	}
	public function delete_autoaward($id) {
		AwardData::delete_autoaward($id);
		$this->set('message', 'Auto Award Setting Deleted');
		$this->show('core_success.php');
		$this->set('hours', AwardData::settings(1));
		$this->set('flights', AwardData::settings(2));
		$this->set('landings', AwardData::settings(3));
		$this->set('days', AwardData::settings(4));
		$this->set('nauticalmiles', AwardData::settings(5));
		$this->set('awards', AwardData::getallawards());
		$this->show('award/auto_awards.php');
		LogData::addLog(Auth::$userinfo->pilotid, "Removed an auto award setting.");
	}
	public function autoaward_add() {
		if($this->post->achieve == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error.php');
			return;
		}	
		$ret = AwardData::autoaward_add($this->post->achieve, $this->post->awardid, $this->post->type, $this->post->auto);
		$this->set('message', 'Auto Award Setting Added Successfully');
		$this->show('core_success.php');
		$this->set('hours', AwardData::settings(1));
		$this->set('flights', AwardData::settings(2));
		$this->set('landings', AwardData::settings(3));
		$this->set('days', AwardData::settings(4));
		$this->set('nauticalmiles', AwardData::settings(5));
		$this->set('awards', AwardData::getallawards());
		$this->show('award/auto_awards.php');
		LogData::addLog(Auth::$userinfo->pilotid, "Added a new Auto Award Setting.");
	}
	public function run_setting($setid) {
		$setting = AwardData::setting_info($setid);
		$type = $setting->type;
		$awardid = $setting->awardid;
		$comment = $setting->comment;
		$limit = $setting->achieve;
		$category = AwardData::get_award_tittle_by_id($awardid)->category;
		$pilotdata = AwardData::pilot_search();
		$dateissued = date('d/m/y');
		echo "<h3>Issuing awards to Pilots</h3>";
		if($type == '1') {
			$comment = "Auto awarded by the SYSTEM for the achieving of $limit hours.";
			foreach($pilotdata as $data) {
				if($data->totalhours >= $limit) {
					$check = AwardData::check_if_issued($awardid, $data->pilotid);
					if($check == '0') {
					AwardData::award_issue($awardid, $data->pilotid, $comment, $category, $dateissued);
					$subject = "Auto Awarded by the SYSTEM";
					$message = Template::Get('awards/emails/awarded.php', true, true, true);
					Util::SendEmail($data->email, $subject, $message);
					echo "Issued Award to $data->firstname $data->lastname<br />";
					}
					else { 
				 	} 
			}
			}
		}
		elseif($type == '2') {
			$comment = "Auto awarded by the SYSTEM for the achieving of $limit flights.";
			foreach($pilotdata as $data) {
				if($data->totalflights >= $limit) {
					$check = AwardData::check_if_issued($awardid, $data->pilotid);
					if($check == '0') {
					AwardData::award_issue($awardid, $data->pilotid, $comment, $category, $dateissued);
					$subject = "Auto Awarded by the SYSTEM";
					$message = Template::Get('awards/emails/awarded.php', true, true, true);
					Util::SendEmail($data->email, $subject, $message);
					echo "Issued Award to $data->firstname $data->lastname<br />";
					}
					else { 
				 	} 
			}
			}
		}
		elseif($type == '3') {
			$comment = "Auto Awarded by the SYSTEM for landing lower that $limit fpm.";
			foreach($pilotdata as $data) {
				$pireps = AwardData::pilot_pireps($data->pilotid);
				$i = 0;
				if(!$pireps) {
					continue;
				} else {
				foreach($pireps as $pirep) {
					if($pirep->landingrate >= $limit) {
						$i = $i + 1;
					}
				  }
				}
				if($i > '0') {
					$check = AwardData::check_if_issued($awardid, $data->pilotid);
					if($check == '0') {
						AwardData::award_issue($awardid, $data->pilotid, $comment, $category, $dateissued);
						$subject = "Auto Awarded by the SYSTEM";
						$message = Template::Get('awards/emails/awarded.php', true, true, true);
						Util::SendEmail($data->email, $subject, $message);
						echo "Issued Award to $data->firstname $data->lastname<br />";
					} 
				}
			}
		}
		elseif($type == '4') {
			$comment = "Auto Awarded by the SYSTEM for being a member for $limit days.";
			foreach($pilotdata as $data) {
				$registered = $data->joindate;
				$now = date("Y/m/d H:i:s");
				$start = strtotime("$registered");
				$end = strtotime("$now");
				$diff = $end - $start;
				$days = intval($diff/86400);
				if($days >= $limit) {
					$check = AwardData::check_if_issued($awardid, $data->pilotid);
					if($check == '0') {
						AwardData::award_issue($awardid, $data->pilotid, $comment, $category, $dateissued);
						$subject = "Auto Awarded by the SYSTEM";
						$message = Template::Get('awards/emails/awarded.php', true, true, true);
						Util::SendEmail($data->email, $subject, $message);
						echo "Issued Award to $data->firstname $data->lastname<br />"; 
					}
				}
			}
		}
		elseif($type == '5') {
			$comment = "Auto Awarded by the SYSTEM for achieving $limit nautical miles.";
			foreach($pilotdata as $data) {
				$pireps = AwardData::pilot_pireps($data->pilotid);
					$nm = 0;
					if(!$pireps) {
					continue;
					} else {
						foreach($pireps as $prp) {
							if($prp->accepted == 1) {
							$nm = $nm + $prp->distance;
							}
						}
						if($nm >= $limit) {
							$check = AwardData::check_if_issued($awardid, $data->pilotid);
							if($check == '0') {
								AwardData::award_issue($awardid, $data->pilotid, $comment, $category, $dateissued);
								$subject = "Auto Awarded by the SYSTEM";
								$message = Template::Get('awards/emails/awarded.php', true, true, true);
								Util::SendEmail($data->email, $subject, $message);
								echo "Issued Award to $data->firstname $data->lastname<br />";
							}
						}
					}
			}
		}
		$this->show('award/auto_award_issue.php');
	}
//Pilot Data
	public function pilot_data() {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$this->set('pilotdata', AwardData::pilot_search());
		$this->show('award/pilot_data.php');
	}
	public function get_pilot_data() {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$pid = $this->post->pilot;
		$this->set('pilotdata', AwardData::pilot_search());
		$this->set('info', AwardData::pilot_info($pid));
		$this->set('categories', AwardData::awardcategories());
		$this->set('assign', AwardData::getallawards());
		$this->show('award/pilot_data.php');
		$this->show('award/pilot_info.php');
	}
	public function award_info($awardid, $pilotid) {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		$this->set('awardname', AwardData::awardinfo($awardid));
		$this->set('awardinfo', AwardData::awardinfo_a($awardid, $pilotid));
		$this->set('info', AwardData::pilot_info($pilotid));
		$this->show('award/assigned_awards.php');
	}
	public function remove_assigned_award($id, $pid) {
		if(!PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) {
			$this->set('message', 'You do not have the required permissions to access this page!');
			$this->show('core_error.php');
			return;
		}
		AwardData::removeaward($id);
		$this->set('message', 'Award Removed');
	    $this->show('core_success.php');
		$this->set('pilotdata', AwardData::pilot_search());
		$this->set('info', AwardData::pilot_info($pid));
		$this->set('categories', AwardData::awardcategories());
		$this->set('assign', AwardData::getallawards());
		$this->show('award/pilot_data.php');
		$this->show('award/pilot_info.php');
	    LogData::addLog(Auth::$userinfo->pilotid, "Removed an award from a pilot");
	}
	public function award_issue_db() {
		if($this->post->comment == '' or $this->post->dateissued == '')
		{
			$this->set('message', 'Some fields are missing! Fill them all please.');
			$this->show('core_error.php');
			return;
		}	
		if($this->post->awardid == '0')
		{
			$this->set('message', 'You have to select an award.');
			$this->show('core_error.php');
			return;
		}
		$awarddata = AwardData::get_award_tittle_by_id($this->post->awardid);
		$category = $awarddata->category;
		$ret = AwardData::award_issue($this->post->awardid, $this->post->pilotid, $this->post->comment, $category, $this->post->dateissued);
		$this->set('message', 'Award Issued Successfully!');
		$this->show('core_success.php');
		$this->set('pilotdata', AwardData::pilot_search());
		$this->set('info', AwardData::pilot_info($this->post->pilotid));
		$this->set('categories', AwardData::awardcategories());
		$this->set('assign', AwardData::getallawards());
		$this->show('award/pilot_data.php');
		$this->show('award/pilot_info.php');
		$subject = "An Award has been assigned to you";
		$message = Template::Get('awards/emails/awarded.php', true, true, true);
		$data = AwardData::pilot_data($this->post->pilotid);
		Util::SendEmail($data->email, $subject, $message);
		LogData::addLog(Auth::$userinfo->pilotid, 'Issued an award to '.PilotData::getPilotCode($pilot->code, $pilot->pilotid).' - ' .$pilot->firstname.' ' .$pilot->lastname);
		}
}