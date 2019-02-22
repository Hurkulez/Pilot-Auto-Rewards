<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3><?php echo SITE_NAME; ?> Awards</h3>
<center><table width="80%" id="tabledlist" class="tablesorter">
<tbody>
<?php
  if(!$category)
        {echo 'Currently, there are not any award categories';}
            else {
            foreach($category as $cat) { ?>
           <tr><td colspan="3" align="center"><h2><?php echo $cat->name; ?></h2></td></tr>
<?php $allawards = AwardData::awardinall($cat->id); 
if(!$allawards)
            {?> <tr><td colspan="3" align="center">There are not any <?php echo $cat->name; ?>.</td></tr> <?php }
            else {
foreach($allawards as $awa) { ?>
<tr>

<td width="20%" align="center"><?php echo $awa->name; ?></td>
<td width="60%" align="center"><?php echo $awa->descrip; ?></td>
<td width="20%" align="center"><img src="<?php echo $awa->image; ?>" /></td></tr>
<?php } } ?><?php } } ?></tbody></table></center>