<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Auto Awards Settings</h3>
<p align="center">This part of Pilot Award Syetm has to do with the auto award assign build in system. Via this page, you can create, edit or remove the auto award actions. If you select the auto update function, you have to be able to create cron jobs. </p>
<p align="center">If you want to set up a cron job in order to auto award your pilots based on the following settings, you will have to use this command:<br />
<b>php -f <?php echo SITE_ROOT?>auto_awards_cron.php<br /><br />
<font color="green"><b>Please note that only the settings, whose auto update has been set to active, will run.  You can alternatively run each one setting via pressing the Run button.</b></font></p>
<h3>Hours Settings</h3>
<center><table id="tabledlist" class="tablesorter">
<thead>
<tr>
<th align="center" width="20%">Achived Hours</th>
<th align="center" width="20%">Award to Issue</th>
<th align="center" width="20%">Auto Update</th>
<th align="center" width="20%">Function</th>
<th align="center" width="20%"></th>
</tr>
</thead>
<tbody>
<?php if(!$hours) {echo '<tr><td align="center" colspan="5">There are not any hour settings.</td></tr>';}
else { foreach($hours as $hour) { ?>
<tr>
<td align="center"><?php echo $hour->achieve; ?></td>
<td align="center"><?php $awarddata = AwardData::get_award_tittle_by_id($hour->awardid); ?>
 <img src="<?php echo $awarddata->image; ?>" alt="<?php echo $awarddata->name; ?>" /></td>
<td align="center"><?php if($hour->auto == '1') {echo '<b><font color="green">Active</font></b>';} else {echo '<b><font color="red">Inactive</font></b>';} ?></td>
<td align="center"><a href="<?php echo SITE_URL ?>/admin/index.php/awards/run_setting/<?php echo $hour->id; ?>" class="button">Run</a></td>
<td align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/awards/auto_award_edit/<?php echo $hour->id; ?>" class="button">Edit</a> <a href="<?php echo SITE_URL; ?>/admin/index.php/awards/delete_autoaward/<?php echo $hour->id; ?>" class="button" onclick="return confirm('Are you sure you want to remove this setting?');">Remove</a></td>
</tr>
<?php } } ?>
</tbody>
</table></center>
<h3>Flights Settings</h3>
<center><table id="tabledlist" class="tablesorter">
<thead>
<tr>
<th align="center" width="20%">Achived Flights</th>
<th align="center" width="20%">Award to Issue</th>
<th align="center" width="20%">Auto Update</th>
<th align="center" width="20%">Function</th>
<th align="center" width="20%"></th>
</tr>
</thead>
<tbody>
<?php if(!$flights) {echo '<tr><td align="center" colspan="5">There are not any flight settings.</td></tr>';}
else { foreach($flights as $flt) { ?>
<tr>
<td align="center"><?php echo $flt->achieve; ?></td>
<td align="center"><?php $awarddata = AwardData::get_award_tittle_by_id($flt->awardid); ?>
 <img src="<?php echo $awarddata->image; ?>" alt="<?php echo $awarddata->name; ?>" /></td>
<td align="center"><?php if($flt->auto == '1') {echo '<b><font color="green">Active</font></b>';} else {echo '<b><font color="red">Inactive</font></b>';} ?></td>
<td align="center"><a href="<?php echo SITE_URL ?>/admin/index.php/awards/run_setting/<?php echo $flt->id; ?>" class="button">Run</a></td>
<td align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/awards/auto_award_edit/<?php echo $flt->id; ?>" class="button">Edit</a> <a href="<?php echo SITE_URL; ?>/admin/index.php/awards/delete_autoaward/<?php echo $flt->id; ?>" class="button" onclick="return confirm('Are you sure you want to remove this setting?');">Remove</a></td>
</tr>
<?php } } ?>
</tbody>
</table></center>
<h3>Landing Rate Settings</h3>
<center><table id="tabledlist" class="tablesorter">
<thead>
<tr>
<th align="center" width="20%">Achived Landing Rate</th>
<th align="center" width="20%">Award to Issue</th>
<th align="center" width="20%">Auto Update</th>
<th align="center" width="20%">Function</th>
<th align="center" width="20%"></th>
</tr>
</thead>
<tbody>
<?php if(!$landings) {echo '<tr><td align="center" colspan="5">There are not any landing rate settings.</td></tr>';}
else { foreach($landings as $land) { ?>
<tr>
<td align="center"><?php echo $land->achieve; ?></td>
<td align="center"><?php $awarddata = AwardData::get_award_tittle_by_id($land->awardid); ?>
 <img src="<?php echo $awarddata->image; ?>" alt="<?php echo $awarddata->name; ?>" /></td>
<td align="center"><?php if($land->auto == '1') {echo '<b><font color="green">Active</font></b>';} else {echo '<b><font color="red">Inactive</font></b>';} ?></td>
<td align="center"><a href="<?php echo SITE_URL ?>/admin/index.php/awards/run_setting/<?php echo $land->id; ?>" class="button">Run</a></td>
<td align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/awards/auto_award_edit/<?php echo $land->id; ?>" class="button">Edit</a> <a href="<?php echo SITE_URL; ?>/admin/index.php/awards/delete_autoaward/<?php echo $land->id; ?>" class="button" onclick="return confirm('Are you sure you want to remove this setting?');">Remove</a></td>
</tr>
<?php } } ?>
</tbody>
</table></center>
<h3>Days Of Membership Settings</h3>
<center><table id="tabledlist" class="tablesorter">
<thead>
<tr>
<th align="center" width="20%">Days Of Membership</th>
<th align="center" width="20%">Award to Issue</th>
<th align="center" width="20%">Auto Update</th>
<th align="center" width="20%">Function</th>
<th align="center" width="20%"></th>
</tr>
</thead>
<tbody>
<?php if(!$days) {echo '<tr><td align="center" colspan="5">There are not any days of membership settings.</td></tr>';}
else { foreach($days as $day) { ?>
<tr>
<td align="center"><?php echo $day->achieve; ?></td>
<td align="center"><?php $awarddata = AwardData::get_award_tittle_by_id($day->awardid); ?>
 <img src="<?php echo $awarddata->image; ?>" alt="<?php echo $awarddata->name; ?>" /></td>
<td align="center"><?php if($day->auto == '1') {echo '<b><font color="green">Active</font></b>';} else {echo '<b><font color="red">Inactive</font></b>';} ?></td>
<td align="center"><a href="<?php echo SITE_URL ?>/admin/index.php/awards/run_setting/<?php echo $day->id; ?>" class="button">Run</a></td>
<td align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/awards/auto_award_edit/<?php echo $day->id; ?>" class="button">Edit</a> <a href="<?php echo SITE_URL; ?>/admin/index.php/awards/delete_autoaward/<?php echo $day->id; ?>" class="button" onclick="return confirm('Are you sure you want to remove this setting?');">Remove</a></td>
</tr>
<?php } } ?>
</tbody>
</table></center>
<h3>Nautical Miles Settings</h3>
<center><table id="tabledlist" class="tablesorter">
<thead>
<tr>
<th align="center" width="20%">Nautical Miles Achieved</th>
<th align="center" width="20%">Award to Issue</th>
<th align="center" width="20%">Auto Update</th>
<th align="center" width="20%">Function</th>
<th align="center" width="20%"></th>
</tr>
</thead>
<tbody>
<?php if(!$nauticalmiles) {echo '<tr><td align="center" colspan="5">There are not any nautical miles settings.</td></tr>';}
else { foreach($nauticalmiles as $nml) { ?>
<tr>
<td align="center"><?php echo $nml->achieve; ?></td>
<td align="center"><?php $awarddata = AwardData::get_award_tittle_by_id($nml->awardid); ?>
 <img src="<?php echo $awarddata->image; ?>" alt="<?php echo $awarddata->name; ?>" /></td>
<td align="center"><?php if($nml->auto == '1') {echo '<b><font color="green">Active</font></b>';} else {echo '<b><font color="red">Inactive</font></b>';} ?></td>
<td align="center"><a href="<?php echo SITE_URL ?>/admin/index.php/awards/run_setting/<?php echo $nml->id; ?>" class="button">Run</a></td>
<td align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/awards/auto_award_edit/<?php echo $nml->id; ?>" class="button">Edit</a> <a href="<?php echo SITE_URL; ?>/admin/index.php/awards/delete_autoaward/<?php echo $nml->id; ?>" class="button" onclick="return confirm('Are you sure you want to remove this setting?');">Remove</a></td>
</tr>
<?php } } ?>
</tbody>
</table>
</center>
<h3>Add an Auto Award Setting</h3>
<form id="form" action="<?php echo adminaction('awards/autoaward_add'); ?>" method="post">
<table width="40%" border="0">
<tr>
<td>Type:</td>
<td><select name="type">
<option value="1">Hours</option>
<option value="2">Flights</option>
<option value="3">Landing Rate</option>
<option value="4">Days of Membership</option>
<option value="5">Nautical Miles</option>
</select>
<tr>
<td width="10%">Achievement:</td>    
    <td width="60%">
    <input type="text" name="achieve" /></td>
</tr>
<tr>
<td>Award to Issue:</td>
<td><select name="awardid">
    <?php
foreach($awards as $award)
{ ?>
    <option value="<?php echo $award->awardid; ?>"><?php echo $award->name; ?></option>  <?php } ?>
</select></td>
</tr>
<tr>
<td>Auto Update:</td>
<td><input type="checkbox" name="auto" value="1"></td>
</tr>
<tr>
    <td align="center"><input type="hidden" name="id" value="<?php echo $set->id; ?>" /><br /><input type="submit" name="submit" value="Add Setting" /></td>
  </tr>
</table>
</form><br />