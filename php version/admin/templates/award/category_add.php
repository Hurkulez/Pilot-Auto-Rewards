<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Add a new Awards Category</h3>
<center><form id="form" action="<?php echo adminaction('/awards/category_add_db/');?>" method="post">
<table width="70%" border="0">
<tr>
<td width="30%">Category Title:</td>    
    <td width="70%">
    <input type="text" name="name" id="name" /></td>
</tr>
<tr>
    <td>Status:</td>
    <td><select name="ai">
    <option value="1">Shown</option>
    <option value="0">Hidden</option>
</select></td>
  </tr>
<tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Add Award Category" /></center></td>
  </tr>
</table>
</form>
</center>