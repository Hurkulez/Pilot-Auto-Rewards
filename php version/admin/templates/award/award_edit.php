<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Edit Award</h3>
<center><form id="form" action="<?php echo adminaction('/awards/award_edit_db/');?>" method="post">
<table width="70%" border="0">
<tr>
<td width="10%">Award Title:</td>    
    <td width="60%">
    <input name="name" id="name" value="<?php echo $form->name; ?>" />
    <input name="awardid" id="awardid" value="<?php echo $form->awardid; ?>" type="hidden" /></td>
</tr>
<tr>
<td>Description:</td>
<td><textarea cols="40" id="descrip" name="descrip" rows="5"><?php echo $form->descrip; ?></textarea>
</td>
</tr>
<tr>
<td>Image:</td>
<td><input name="image" id="image" value="<?php echo $form->image; ?>" /></td>
</tr>
<tr>
    <td>Category:</td>
    <td><select name="category">
    <?php
foreach($categories as $cate)
{ ?>
    <option value="<?php echo $cate->id; ?>"  <?php if ($form->category == $cate->id) echo 'selected="selected"' ; ?>><?php echo $cate->name; ?></option>  <?php } ?>
</select></td>
  </tr>
<tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Edit Award" /></center></td>
  </tr>
</table>
</form>
</center>