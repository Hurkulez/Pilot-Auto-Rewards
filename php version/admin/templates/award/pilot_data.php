<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Awards Pilot Data</h3>
<form action="<?php echo adminurl('Awards/get_pilot_data'); ?>" method="post">
<b>Select Pilot:</b> 
<select name="pilot" onchange="this.form.submit()">
<option value=""></option>
<?php foreach($pilotdata as $pilot) { ?>
<option value="<?php echo $pilot->pilotid; ?>" <?php if($info->pilotid == $pilot->pilotid) {echo 'selected="selected"';} ?>><?php echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid); ?> - <?php echo $pilot->firstname; ?> <?php echo $pilot->lastname; ?></option>
<?php } ?>
</select>
</form><br /><hr />