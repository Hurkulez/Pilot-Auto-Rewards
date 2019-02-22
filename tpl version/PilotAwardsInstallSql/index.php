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
				if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN))
                    {
                        echo '<h4>Pilot Awards Installer for '.SITE_NAME.'</h4>';
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
	?>
<p align="center">Dear Sir/Madam,</p>
<p align="center">We would like to thank you for purchasing our module. We wish that you would like it. Pilot Awards Module includes many functions which will help you administrate your Pilot's Awards. It is an update on the basic version of phpvms awards system. Using this module, you can:</p>
<ul>
<li>Add or edit your awards which are now based on specific categories (such as General Awards, Tour Awards etc),</li>
<li>Assign awards to your Pilots via setting a specific comment,</li>
<li>The awards can be assigned to your pilots as many times as you want,</li>
<li>Auto awards system which is currently based on Hours, Flights, Landing Rate and Days of Membership</li>
</ul>
<p align="center"><font color="red"><b>After completing this installation, please delete PilotAwardsInstallSql folder.</b></font></p>
<p align="center">If you have any problem, question or request, do not hesitate to contact us via opening a support ticket on our <a href="http://php-mods.eu/billing" target="_blank">billing system</a>.</p>
<p align="center">
<a href="install.php"><b>Install Pilot Awards Module</b></a></p>