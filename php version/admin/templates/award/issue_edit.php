<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Issue Edit</h3>
<center><form id="form" action="<?php echo adminaction('/awards/issue_edit_db/');?>" method="post">
<table width="70%" border="0">
<tr>
<td width="30%">Award:</td>    
    <td width="70%"><?php 
$id = $form->awardid; ?>
<?php
$awardid = AwardData::get_award_tittle_by_id($id);  ?>
<?php
echo $awardid->name; 
?>
    <input name="id" id="id" value="<?php echo $form->id; ?>" type="hidden" /><br /></td>
</tr>
<tr>
    <td>Comment:</td>
    <td><textarea cols="40" rows="5" id="comment" name="comment"><?php echo $form->comment; ?></textarea></td>
  </tr>
<tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Edit Award Issue" /></center></td>
  </tr>
</table>
</form>
</center>