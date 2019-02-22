<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Award Category Administration</h3>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
<th width="15%" align="center"><b>Title</b></td>
<th width="40%" align="center"><b>Description</b></td>
<th width="10%" align="center"><b>Image</b></td>
<th width="10%" align="center">&nbsp;</td>
</tr>
</thead>
<tbody>
<?php
if(!$awardcat)
            {echo '<tr><td colspan="4"><center>There are no any awards in this category.</center></td></tr>';}
            else
            {
foreach($awardcat as $cat)
{ ?>
<tr>
<td align="center"><?php echo $cat->name; ?></td>
<td align="center"><?php echo $cat->descrip; ?></td>
<td align="center"><img src="<?php echo $cat->image; ?>" /></td>
<td align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/awards/award_edit/<?php echo $cat->awardid; ?>" class="button">Edit Award</a> 
<a href="<?php echo SITE_URL; ?>/admin/index.php/awards/awardelete/<?php echo $cat->awardid; ?>" class="button" onclick="return confirm('Are you sure you want to remove this award?');">Delete Award</a> </td>
</tr>
<?php } } ?>
<tr>
<td colspan="4"><center><a href="<?php echo SITE_URL?>/admin/index.php/awards/award_add/<?php echo $catdeta->id; ?>" class="button">Add a new Award in this category</a></center></td>
</tr>
</tbody>
</table><br />