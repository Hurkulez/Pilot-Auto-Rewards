<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

class AwardData extends CodonData {
		
	static function awardcategories() {
        $sql = "SELECT * FROM " . TABLE_PREFIX . "awards_cat WHERE ai='1' ORDER BY id";
        return DB::get_results($sql);
	}
	static function awardinall($id) {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "awards WHERE category = '".$id."' ORDER BY name";
		return DB::get_results($sql);
	}
	static function awardincat($id, $pilotid) {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "awardsgranted WHERE category = '".$id."' AND pilotid= '".$pilotid."' GROUP BY awardid ORDER BY dateissued ASC";
		return DB::get_results($sql);
	}
	static function awardincatoth($id, $pilotid) {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "awardsgranted WHERE category = '".$id."' AND pilotid= '".$pilotid."' GROUP BY awardid ORDER BY dateissued ASC";
		return DB::get_results($sql);
	}
	static function getAwardCategories() {
        $sql = 'SELECT * FROM ' . TABLE_PREFIX . 'awards_cat';
        return DB::get_results($sql);
	}
	static function getAwardCategoryDet($id) {
	    $sql = "SELECT * FROM " . TABLE_PREFIX . "awards_cat WHERE id=". $id. "";
		 return DB::get_row($sql);
	}
	static function getAwardCatin($id)  {
		 $sql = 'SELECT * FROM ' . TABLE_PREFIX . 'awards WHERE category='. $id. '';
		return DB::get_results($sql);
	}
	static function getallawards()   {
		  $sql = 'SELECT * FROM ' . TABLE_PREFIX . 'awards ORDER BY category';
		  return DB::get_results($sql);
	}
	static function deleteaward($awardid)  {
		$sql = "DELETE FROM " . TABLE_PREFIX . "awards WHERE awardid='$awardid'";
		return DB::get_results($sql);
	}
	static function edit_award($name, $descrip, $image, $category, $awardid) {
         $query = "UPDATE " . TABLE_PREFIX . "awards SET
		 name='$name',
         descrip='$descrip',
         image='$image',
         category='$category'
         WHERE awardid='$awardid'";
        DB::query($query);
    }
	static function edit_award_issue_award($category, $awardid) {
         $query = "UPDATE " . TABLE_PREFIX . "awardsgranted SET
		 category='$category'
         WHERE awardid='$awardid'";
        DB::query($query);
    }
	static function award_edit_form($awardid)  {
	    $sql = 'SELECT * FROM ' . TABLE_PREFIX . 'awards WHERE awardid='. $awardid. '';
		return DB::get_row($sql);
		}
		static function award_add($name, $descrip, $image, $category) {
		$name = DB::escape($name);
        $descrip = DB::escape($descrip);
        $image = DB::escape($image);
		$category = DB::escape($category);
        $sql = "INSERT INTO " . TABLE_PREFIX . "awards (awardid, name, descrip, image, category)  VALUES	 ('', '$name','$descrip','$image','$category')";
        DB::query($sql);
	 }
	 static function pilot_search() {
		 $sql = 'SELECT * FROM ' . TABLE_PREFIX . 'pilots';
		 return DB::get_results($sql);
	 }
	 static function pilot_data($pilotid) {
		 $sql = "SELECT * FROM ".TABLE_PREFIX."pilots WHERE pilotid='$pilotid'";
		 return DB::get_row($sql);
	 }
	 static function award_issue($awardid, $pilotid, $comment, $category, $dateissued) {
		$awardid = DB::escape($awardid);
        $pilotid = DB::escape($pilotid);
        $comment = DB::escape($comment);
		$category = DB::escape($category);
		$dateissued = DB::escape($dateissued);
        $sql = "INSERT INTO " . TABLE_PREFIX . "awardsgranted (id, awardid, pilotid, comment, category, dateissued)  VALUES	 ('', '$awardid', '$pilotid', '$comment', '$category', '$dateissued')";
        DB::query($sql);
		$data = AwardData::pilot_data($pilotid);
	 }
	static function get_award_tittle_by_id($id) {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "awards WHERE awardid = '$id'";
        return DB::get_row($sql);
	}
	static function get_category_tittle_by_id($ida) {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "awards_cat WHERE id = '$ida'";
        return DB::get_row($sql);
	}
	static function awardinfo($awardid) {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "awardsgranted WHERE awardid = '$awardid'";
		return DB::get_row($sql);
	}
	static function awardinfo_a($awardid, $pilotid) {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "awardsgranted WHERE awardid = '$awardid' AND pilotid='$pilotid'";
		return DB::get_results($sql);
	}
	static function deletecategory($id)  {
		$sql = "DELETE FROM " . TABLE_PREFIX . "awards_cat WHERE id='$id'";
		return DB::get_results($sql);
	}
	static function deleteawarda($id)  {
		$sql = "DELETE FROM " . TABLE_PREFIX . "awards WHERE category='$id'";
		return DB::get_results($sql);
	}
	static function deleteawardissues($id)  {
		$sql = "DELETE FROM " . TABLE_PREFIX . "awardsgranted WHERE category='$id'";
		return DB::get_results($sql);
	}
	static function edit_category($name, $ai, $id) {
         $query = "UPDATE " . TABLE_PREFIX . "awards_cat SET
		 name='$name',
         ai='$ai'
         WHERE id='$id'";
        DB::query($query);
    }
	static function category_edit_form($id)  {
	    $sql = 'SELECT * FROM ' . TABLE_PREFIX . 'awards_cat WHERE id='. $id. '';
		return DB::get_row($sql);
	}
	static function deleteawardissuesawa($awardid)  {
		$sql = "DELETE FROM " . TABLE_PREFIX . "awardsgranted WHERE awardid='$awardid'";
		return DB::get_results($sql);
	}
	static function adminpilawards($pilotid)
	{
		$sql = "SELECT * FROM " . TABLE_PREFIX . "awardsgranted WHERE pilotid='".$pilotid."' ORDER BY id";
		return DB::get_results($sql);
	}
	static function removeaward($id) {
		$sql = "DELETE FROM " . TABLE_PREFIX . "awardsgranted WHERE id='$id'";
		return DB::get_results($sql);
	}
	static function insert_category($name, $ai) {
		$name = DB::escape($name);
        $ai = DB::escape($ai);
        $sql = "INSERT INTO " . TABLE_PREFIX . "awards_cat (id, name, ai)  VALUES	 ('', '$name','$ai')";
        DB::query($sql);
	 }
	static function issue_edit($id) {
		 $sql = "SELECT * FROM " . TABLE_PREFIX . "awardsgranted WHERE id='$id'";
		 return DB::get_row($sql);
	}
	static function edit_award_issue($comment, $id) {
         $query = "UPDATE " . TABLE_PREFIX . "awardsgranted SET
         comment='$comment'
         WHERE id='$id'";
        DB::query($query);
    }
//Auto Awards
    static function settings($set) {
        $query = "SELECT * FROM " . TABLE_PREFIX . "awards_auto WHERE type='$set'";
		return DB::get_results($query);
    }
	static function check_if_issued($awardid, $pilotid) {
		$query = "SELECT COUNT(id) AS total FROM ".TABLE_PREFIX."awardsgranted WHERE awardid = '$awardid' AND pilotid = '$pilotid'";
		$check =  DB::get_row($query);
        return $check->total; 
	}
	static function setting_info($id) {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "awards_auto WHERE id='$id'";
		return DB::get_row($sql);
	}
	static function edit_autoaward($achieve, $awardid, $type, $auto, $id) {
         $query = "UPDATE " . TABLE_PREFIX . "awards_auto SET
		 achieve='$achieve',
         awardid='$awardid',
         type='$type',
         auto='$auto'
         WHERE id='$id'";
        DB::query($query);
    }
	static function delete_autoaward($id) {
		$sql = "DELETE FROM " . TABLE_PREFIX . "awards_auto WHERE id='$id'";
		return DB::get_results($sql);
	}
	static function autoaward_add($achieve, $awardid, $type, $auto) {
		$achieve = DB::escape($achieve);
        $awardid = DB::escape($awardid);
		$type = DB::escape($type);
        $auto = DB::escape($auto);
        $sql = "INSERT INTO " . TABLE_PREFIX . "awards_auto (id, achieve, awardid, type, auto)  VALUES	 ('', '$achieve', '$awardid', '$type', '$auto')";
        DB::query($sql);
	}
	static function get_key() {
		$sql = "SELECT * FROM ".TABLE_PREFIX."awards_settings WHERE id='1'";
		return DB::get_row($sql);
	}
	static function pilot_pireps($pid) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."pireps WHERE pilotid='$pid' AND landingrate<'0'";
		return DB::get_results($sql);
	}
//Pilot Data
	static function pilot_info($pid) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."pilots WHERE pilotid='$pid'";
		return DB::get_row($sql);
	}
	static function pilot_total_nm($pilotid) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."pireps WHERE pilotid='$pilotid' AND accepted='1'";
		$flights = DB::get_results($sql);
		$total = 0;
		if($flights) {
			foreach($flights as $flt) {
				$total = $total + $flt->distance;
			}
		}
		return $total;
	}
//Cronjob Functions
	static function allsettings() {
		$sql = "SELECT * FROM " . TABLE_PREFIX . "awards_auto WHERE auto='1'";
		return DB::get_results($sql);
	}
	static function auto_awards_types($type) {
		$sql = "SELECT * FROM " . TABLE_PREFIX."awards_auto WHERE type='$type' AND auto='1'";
		return DB::get_results($sql);
	}
	static function hours_cron() {
		$settings = AwardData::auto_awards_types('1');
		$dateissued = date('d/m/y');
		$pilotdata = AwardData::pilot_search();
		if(!$settings) { } else {
			foreach($settings as $set) {
				$limit = $set->achieve;
				$awardid = $set->awardid;
				$category = AwardData::get_award_tittle_by_id($awardid)->category;
				$comment = "Auto awarded by the SYSTEM for achieving $limit hours.";
				foreach($pilotdata as $data) {
					if($data->totalhours >= $limit) {
					$check = AwardData::check_if_issued($awardid, $data->pilotid);
					if($check == '0') {
						AwardData::award_issue($awardid, $data->pilotid, $comment, $category, $dateissued);
					$subject = "Auto Awarded by the SYSTEM";
					$message = Template::Get('awards/emails/awarded.tpl', true, true, true);
					Util::SendEmail($data->email, $subject, $message);
					}
					}
				}
			}
		}
	}
	static function flights_cron() {
		$settings = AwardData::auto_awards_types('2');
		$dateissued = date('d/m/y');
		$pilotdata = AwardData::pilot_search();
		if(!$settings) { } else {
		foreach($settings as $set) {
			$limit = $set->achieve;
			$awardid = $set->awardid;
			$category = AwardData::get_award_tittle_by_id($awardid)->category;
			$comment = "Auto awarded by the SYSTEM for achieving $limit flights.";
			foreach($pilotdata as $data) {
				if($data->totalflights >= $limit) {
				$check = AwardData::check_if_issued($awardid, $data->pilotid);
					if($check == '0') {
					AwardData::award_issue($awardid, $data->pilotid, $comment, $category, $dateissued);
					$subject = "Auto Awarded by the SYSTEM";
					$message = Template::Get('awards/emails/awarded.tpl', true, true, true);
					Util::SendEmail($data->email, $subject, $message);
					}
				}
			}
		}
		}
	}
	static function landings_cron() {
		$settings = AwardData::auto_awards_types('3');
		$dateissued = date('d/m/y');
		$pilotdata = AwardData::pilot_search();
		if(!$settings) { } else {
		foreach($settings as $set) {
			$limit = $set->achieve;
			$awardid = $set->awardid;
			$category = AwardData::get_award_tittle_by_id($awardid)->category;
			$comment = "Auto awarded by the SYSTEM for landing better than $limit fpm.";
			foreach($pilotdata as $data) {
				$pireps = AwardData::pilot_pireps($data->pilotid);
				$i = 0;
				if(!$pireps) { } else {
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
					$message = Template::Get('awards/emails/awarded.tpl', true, true, true);
					Util::SendEmail($data->email, $subject, $message);
					}
				}
			}
		}
		}
	}
	static function days_of_membership_cron() {
		$settings = AwardData::auto_awards_types('4');
		$dateissued = date('d/m/y');
		$pilotdata = AwardData::pilot_search();
		if(!$settings) { } else {
		foreach($settings as $set) {
			$limit = $set->achieve;
			$awardid = $set->awardid;
			$category = AwardData::get_award_tittle_by_id($awardid)->category;
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
						$message = Template::Get('awards/emails/awarded.tpl', true, true, true);
						Util::SendEmail($data->email, $subject, $message);
					}
				}
			}
		}
		}
	}
	static function nm_cron() {
		$settings = AwardData::auto_awards_types('5');
		$dateissued = date('d/m/y');
		$pilotdata = AwardData::pilot_search();
		if(!$settings) {} else {
			foreach($settings as $set) {
				$limit = $set->achieve;
				$awardid = $set->awardid;
				$category = AwardData::get_award_tittle_by_id($awardid)->category;
				$comment = "Auto Awarded by the SYSTEM for achieving $limit nautical miles.";
				foreach($pilotdata as $data) {
					$pireps = AwardData::pilot_pireps($data->pilotid);
					$nm = 0;
					if(!$pireps) { } else {
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
								$message = Template::Get('awards/emails/awarded.tpl', true, true, true);
								Util::SendEmail($data->email, $subject, $message);
							}
						}
					}
				}
			}
		}
	}
//Statistics
	static function last_issues($limit) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."awardsgranted ORDER BY id DESC LIMIT $limit";
		return DB::get_results($sql);
	}
} 