<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3><?php $id = $awardname->awardid;
		  $awardid = AwardData::get_award_tittle_by_id($id);  
			echo $awardid->name; ?> Award</h3>
<center><table id="tabledlist" class="tablesorter">
<thead>
<tr><th colspan="4" align="center"><b><?php echo $awardid->name; ?> Award History of <?php echo $info->firstname; ?> <?php echo $info->lastname; ?></b></th></tr>
<tr>
<th width="20%" align="center"><b>N/I</b></th>
<th width="50%" align="center"><b>Comment</b></th>
<th width="10%" align="center"><b>Date</b></th>
<th width="20%" align="center"></th>
</tr>
</thead>
<tbody>
<?php
if(!$awardinfo)
            {echo '<tr><td colspan="4" align="center"><center>There are no any awards issued!</center></td></tr>';}
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
<td align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/Awards/issue_edit/<?php echo $info->id; ?>" class="button">Edit Award</a> <a href="<?php echo SITE_URL; ?>/admin/index.php/Awards/remove_assigned_award/<?php echo $info->id; ?>/<?php echo $info->pilotid; ?>" class="button" onclick="return confirm('Are you sure you want to remove this assigned award?');">Remove Award</a></td>
</tr>
<?php } } ?>
</tbody>
</table></center><br />