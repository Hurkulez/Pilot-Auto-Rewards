<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<?php 
$url = 'http://php-mods.eu/modules/versions/pilotawards';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$data = curl_exec($curl);
curl_close($curl);
$cur_version = $data;
$ins_version = '1.5'; 
?>
<?php if($cur_version == $ins_version) {echo '<div id="success"><b>Your Pilot Awards Module is Up To Date.</b></div>';} 
elseif($cur_version <> $ins_version) {echo '<div id="error"><b>A newer version is available for your Pilot Awards Module.</b></div>';} else {echo '<div id="error"><b>There is a problem with the server connection. Please contact us.</b></div>';} ?>
