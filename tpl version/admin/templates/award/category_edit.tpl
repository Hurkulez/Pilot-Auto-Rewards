<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Award Category Edit</h3>
<center><form id="form" action="<?php echo adminaction('/awards/category_edit_db/');?>" method="post">
<table width="70%" border="0">
<tr>
<td width="30%">Category Title:</td>    
    <td width="70%">
    <input name="name" id="name" value="<?php echo $form->name; ?>" />
    <input name="id" id="id" value="<?php echo $form->id; ?>" type="hidden" /></td>
</tr>
<tr>
    <td>Status:</td>
    <td><select name="ai">
    <option value="1" <?php if ($form->ai == '1') echo 'selected="selected"' ; ?>>Shown</option>
    <option value="0" <?php if ($form->ai == '0') echo 'selected="selected"' ; ?>>Hidden</option>
</select></td>
  </tr>
<tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Edit Award Category" /></center></td>
  </tr>
</table>
</form>
</center>