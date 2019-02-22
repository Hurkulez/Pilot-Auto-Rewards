<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>
<?php 
$id = $awardname->awardid; ?>
<?php
$awardid = AwardData::get_award_tittle_by_id($id);  ?>
<?php
echo $awardid->name; 
?> Award</h3>
<center><table width="60%" id="tabledlist" class="tablesorter">
<thead>
<tr><th colspan="3" align="center"><b><?php 
$id = $awardname->awardid; ?>
<?php
$awardid = AwardData::get_award_tittle_by_id($id);  ?>
<?php
echo $awardid->name; 
?> Award History</b></th></tr>
<tr>
<th width="5%" align="center"><b>N/I</b></th>
<th width="45%" align="center"><b>Comment</b></th>
<th width="10%" align="center"><b>Date</b></th>
</tr></thead>
<tbody>
<?php
if(!$awardinfo)
            {echo '<tr><td><center>There are no any awards issued!</center></td></tr>';}
            else
            {
           $count = 1;
foreach($awardinfo as $info)
{ ?>
<tr>
<td align="center"><?php echo $count; 
$count++;
?></td>
<td align="center"><?php if($info->comment == ''){echo 'No comment set';} else { ?> <?php echo $info->comment; ?> <?php } ?></td>
<td align="center"><?php echo $info->dateissued; ?></td>
</tr>
<?php } } ?></tbody>
</table></center><br />