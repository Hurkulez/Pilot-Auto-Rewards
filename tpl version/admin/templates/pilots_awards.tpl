<?php 
//Last edited by php-mods.eu

?>
<div id="awardslist">
<h3>Pilot Awards</h3>
<?php
if(!$allawards)
              {echo 'This pilot has no awards!';}
        else {
              ?>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
	<th>Award</th>
	<th>Category</th>
    <th>Comment</th>
    <th>Date Issued</th>
    <th>&nbsp;</th>
</tr>
</thead>
<tbody>
<?php 
foreach($allawards as $allawards)
{
?>
<tr>
	<td>
    <?php 
$id = $allawards->awardid; ?>
<?php
$awardid = AwardData::get_award_tittle_by_id($id);  ?>
<?php
echo $awardid->name; 
?></td>
    <td><?php 
$ida = $allawards->category; ?>
<?php
$awardcat = AwardData::get_category_tittle_by_id($ida);  ?>
<?php
echo $awardcat->name; 
?></td>
    <td><?php echo $allawards->comment; ?></td>
    <td><?php echo $allawards->dateissued; ?></td>
	<td>
    <a href="<?php echo SITE_URL; ?>/admin/index.php/Awards/issue_edit/<?php echo $allawards->id; ?>" class="button">Edit Award</a>
    <a href="<?php echo SITE_URL; ?>/admin/index.php/Awards/remove_assigned_award/<?php echo $allawards->id; ?>/<?php echo $pilotid; ?>" class="button" onclick="return confirm('Are you sure you want to remove this assigned award?');">Remove Award</a>
	</td>
</tr>
<?php		
} }
?>
</tbody>
</table>
</div>