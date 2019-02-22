<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

class Awards extends CodonModule 
{
	public function index() {
		$this->set('category', AwardData::awardcategories());
		$this->render('awards/award_index.tpl');
	}
	public function myaward() {
		$this->set('category', AwardData::awardcategories());
		$this->set('userinfo', Auth::$userinfo);
		$this->show('awards/pilot_awards.tpl');
	}
	public function myawardinfo($awardid) {
		$pilotid = Auth::$userinfo->pilotid;
		$this->set('awardname', AwardData::awardinfo($awardid));
		$this->set('awardinfo', AwardData::awardinfo_a($awardid, $pilotid));
		$this->set('awardid', AwardData::get_award_tittle_by_id($id));
		$this->render('awards/pilot_award_info.tpl');
	}
	public function pilotaward($pilotid) {
		$userinfo = PilotData::getPilotData($pilotid);
		$this->set('userinfo', $userinfo);
		$this->set('category', AwardData::awardcategories());
		$this->show('awards/pilot_awards_other.tpl');
	}
	public function last_issues($limit) {
		$this->set('issues', AwardData::last_issues($limit));
		$this->show('awards/last_issues.tpl');
	}
	public function awardinfo_public($awardid, $pilotid) {
		$this->set('awardname', AwardData::awardinfo($awardid));
		$this->set('awardinfo', AwardData::awardinfo_a($awardid, $pilotid));
		$this->set('awardid', AwardData::get_award_tittle_by_id($id));
		$this->render('awards/profile_awardinfo_public.tpl');
	}
}