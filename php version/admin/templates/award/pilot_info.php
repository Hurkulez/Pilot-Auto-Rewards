<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3><?php echo PilotData::GetPilotCode($info->code, $info->pilotid); ?> - <?php echo $info->firstname; ?> <?php echo $info->lastname; ?></h3>
<b>Total Hours:</b> <?php echo $info->totalhours; ?><br />
<b>Total Flights:</b> <?php echo $info->totalflights; ?><br />
<b>Total Nautical Miles:</b> <?php echo AwardData::pilot_total_nm($info->pilotid); ?><br />
<hr />
<?php if(!$categories) {echo '<p align="center">There are not any Awards Categories.</p>';} else {
foreach($categories as $category) { ?>
<h3><?php echo $category->name; ?></h3>
<?php $awardsgranted = AwardData::awardincat($category->id, $info->pilotid); ?>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
<th align="center" width="34%"><b>Award Image</b></th>
<th align="center" width="33%"><b>Award Title</b></th>
<th align="center" width="33%"><b>Info</b></th>
</tr>
</thead>
<tbody>
<?php
if(!$awardsgranted) {?> <tr><td align="center" colspan="3">You have not assigned any <?php echo $category->name; ?> to this pilot.</td></tr>  <?php } else { 
foreach($awardsgranted as $award) { 
$id = $award->awardid;
$awardid = AwardData::get_award_tittle_by_id($id); ?>
<tr>
<td align="center"><img src="<?php echo $awardid->image; ?>" alt="" /></td>
<td align="center"><?php echo $awardid->name; ?></td>
<td align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/Awards/award_info/<?php echo $awardid->awardid; ?>/<?php echo $info->pilotid; ?>" class="button">Info</a></td>
</tr>
<?php } } ?>
</tbody>
</table><br />
<hr />
<?php } } ?>
<h3>Issue an Award</h3>
<center><form id="form" action="<?php echo adminaction('/awards/award_issue_db/');?>" method="post">
<table width="70%" border="0">
<tr>
<td width="10%">Award:</td>    
<td width="60%"><select name="awardid">
<option value="0">Select the award...</option>
    <?php
foreach($assign as $awa)
{ ?>
    <option value="<?php echo $awa->awardid; ?>"><?php echo $awa->name; ?></option>  <?php } ?>
</select></td>
</tr>
<tr>
<td>Comment:</td>
<td><textarea cols="50" id="comment" name="comment" rows="5"></textarea>
<input type="hidden" name="dateissued" id="dateissued" value="<?php echo date('d/m/y'); ?>" /> <input type="hidden" name="pilotid" value="<?php echo $info->pilotid; ?>" /></td>
</tr>
<tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Issue This Award" /></center></td>
  </tr>
</table>
</form>
</center><br />