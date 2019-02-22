<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

error_reporting(0);
    include_once '../core/codon.config.php';
    if(Auth::LoggedIn())
            {
	$email = 'info@php-mods.eu';
	$subject = 'Pilot Awards v1.5 Installed';
	$message = ''.SITE_NAME.' Installed Pilot Awards v1.5 Module URL '.SITE_URL.'';

	Util::SendEmail($email, $subject, $message);
                    if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN))
                    {
                        echo '<h4>Pilot Awards v1.5 Installer for '.SITE_NAME.'</h4>';
                    }
					
             else
                    {
                        header('Location: http://www.google.com/');
                    }
            }
            else
            {
                        header('Location: http://www.google.com/');
	}
	$sqldrop = "DROP TABLE IF EXISTS `" . TABLE_PREFIX . "awards_auto`,
	`" . TABLE_PREFIX . "awards_cat`";
	DB::query($sqldrop);

	$sql = "ALTER TABLE `" . TABLE_PREFIX . "awards` ADD (category int(50) NOT NULL)";
   DB::query($sql);
   
  $sql1 = "ALTER TABLE `" . TABLE_PREFIX . "awardsgranted` ADD (comment text NOT NULL)";
   DB::query($sql1);
   
   $sql2 = "ALTER TABLE `" . TABLE_PREFIX . "awardsgranted` ADD (category int(50) NOT NULL)";
   DB::query($sql2);
   
  $sql3 = "CREATE TABLE IF NOT EXISTS `" . TABLE_PREFIX . "awards_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ai` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
   DB::query($sql3);
   
   $sql4 = "UPDATE `" . TABLE_PREFIX . "awards` SET category = '1' where category='';";
DB::query($sql4);

   $sql5 = "UPDATE `" . TABLE_PREFIX . "awardsgranted` SET category = '1' where category='';";
DB::query($sql5);

   $sql6 = "INSERT INTO `" . TABLE_PREFIX . "awards_cat` (`id`, `name`, `ai`) VALUES
(1, 'General Awards', 1);";
DB::query($sql6);

  $sql7 = "ALTER TABLE `" . TABLE_PREFIX . "awardsgranted` MODIFY dateissued varchar(10) NOT NULL";
   DB::query($sql7);
   
   $sql8 = "CREATE TABLE `" . TABLE_PREFIX . "awards_auto` (
  `id` int(11) NOT NULL auto_increment,
  `achieve` varchar(50) NOT NULL,
  `awardid` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `auto` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
	DB::query($sql8);
   
            if(DB::errno() != 0)
                {echo '<br /><h4>Errors Appeared:</h4>';print_r(DB::error());}
            else 
                {
                    echo '<h4>Pilot Awards tables created!</h4>You may start using the module.<br /><br /><font color="red"><b>After completing this installation, please delete PilotAwardsInstallSql folder.</b></font>';
                }