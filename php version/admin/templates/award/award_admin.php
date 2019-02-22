<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Awards Administration</h3>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
<th width="70%" colspan="2"><b><center>Award Category Title</center></b></td>
<th width="30%" colspan="2">&nbsp;</td>
</tr>
</thead>
<tbody>
<?php
if(!$awardadm)
            {echo '<tr><td colspan="4"><center>There are no any award categories</center></td></tr>';}
            else
            {
foreach($awardadm as $adm)
{ ?>
<tr>
<td width="50%" align="center"><?php echo $adm->name; ?></td>
<td width="6%" align="center">
<?php if($adm->ai == '1'){echo '<font color="green"><b>Shown</b></font>';}
      if($adm->ai == '0'){echo '<font color="red"><b>Hidden</b></font>';} ?>
</td>
<td width="22%" align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/awards/category_edit/<?php echo $adm->id; ?>" class="button">Edit Category</a> 
<a href="<?php echo SITE_URL; ?>/admin/index.php/awards/categorydelete/<?php echo $adm->id; ?>" class="button" onclick="return confirm('Are you sure you want to remove this category?');">Delete Category</a></td>
<td width="22%" align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/awards/awardcat/<?php echo $adm->id; ?>" class="button">View Details</a></td>
</tr>
  <?php } } ?>
  <tr><td colspan="4" align="center"><a href="<?php echo SITE_URL; ?>/admin/index.php/awards/category_add" class="button">Add a new Award Category</a></td></tr>
  </tbody>
</table>