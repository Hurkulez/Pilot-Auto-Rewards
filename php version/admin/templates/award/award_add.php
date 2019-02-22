<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Add a new Award</h3>
<center><form id="form" action="<?php echo adminaction('/awards/award_add_db/');?>" method="post">
<table width="70%" border="0">
<tr>
<td width="10%">Award Title:</td>    
<td width="60%"><input type="text" name="name" id="name" /><input name="category" id="category" value="<?php echo $catdet->id; ?>" type="hidden" /></td>
</tr>
<tr>
<td>Description:</td>
<td><textarea cols="40" id="descrip" name="descrip" rows="5"></textarea>
</td>
</tr>
<tr>
<td>Image:</td>
<td><input type="text" name="image" id="image" /></td>
</tr>
<tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Add Award" /></center></td>
  </tr>
</table>
</form>
</center>