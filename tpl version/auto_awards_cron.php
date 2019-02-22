<?php 
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

    error_reporting(0);
	
    include './core/codon.config.php';
	
    set_time_limit(0);
    ini_set('memory_limit', '-1');
    define('ADMIN_PANEL', true);
    Auth::$userinfo->pilotid = 0;
	
	AwardData::hours_cron();
	AwardData::flights_cron();
	AwardData::landings_cron();
	AwardData::days_of_membership_cron();
	AwardData::nm_cron();
?>