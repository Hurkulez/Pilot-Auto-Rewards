<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Awards</h3>
<table width="30%" border="0">
<?php
  if(!$category)
        {echo 'Currently, there are not any award categories';}
            else {
            foreach($category as $cat) { ?>
           <tr><th colspan="3" align="center"><h2><?php echo $cat->name; ?></h2></th></tr>
<?php $awards = AwardData::awardincat($cat->id, $userinfo->pilotid); 

  if(!$awards)
            {?> <tr><td colspan="3" align="center">The pilot does not have any <?php echo $cat->name; ?>.</td></tr><?php }
            else {
foreach($awards as $awa) { ?>
<tr>

<td width="50%" align="center"><?php 
$id = $awa->awardid; ?>
<?php
$awardid = AwardData::get_award_tittle_by_id($id);  ?>
<?php
echo $awardid->name; 
?></td>
<td width="50%" align="center"><img src="<?php echo $awardid->image; ?>" alt="" /><a href="<?php echo SITE_URL; ?>/index.php/awards/awardinfo_public/<?php echo $awa->awardid; ?>/<?php echo $userinfo->pilotid; ?>">+</a></td></tr>
<?php } } ?><?php } } ?></table>