<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Edit Auto Award Setting</h3>
<form id="form" action="<?php echo adminaction('/awards/autoaward_edit/');?>" method="post">
<table width="40%" border="0">
<tr>
<td>Type:</td>
<td><select name="type">
<option value="1" <?php if($set->type == '1') {echo 'selected="selected"';} ?>>Hours</option>
<option value="2" <?php if($set->type == '2') {echo 'selected="selected"';} ?>>Flights</option>
<option value="3" <?php if($set->type == '3') {echo 'selected="selected"';} ?>>Landing Rate</option>
<option value="4" <?php if($set->type == '4') {echo 'selected="selected"';} ?>>Days of Membership</option>
<option value="5" <?php if($set->type == '5') {echo 'selected="selected"';} ?>>Nautical Miles</option>
</select>
<tr>
<td width="10%">Achievement:</td>    
    <td width="60%">
    <input type="text" name="achieve" value="<?php echo $set->achieve; ?>" /></td>
</tr>
<tr>
<td>Award to Issue:</td>
<td><select name="awardid">
    <?php
foreach($awards as $award)
{ ?>
    <option value="<?php echo $award->awardid; ?>"  <?php if ($set->awardid == $award->awardid) echo 'selected="selected"' ; ?>><?php echo $award->name; ?></option>  <?php } ?>
</select></td>
</tr>
<tr>
<td>Auto Update:</td>
<td><input type="checkbox" name="auto" value="1" <?php if($set->auto == '1') {echo 'checked="yes"';} ?>></td>
</tr>
<tr>
    <td align="center"><input type="hidden" name="id" value="<?php echo $set->id; ?>" /><br /><input type="submit" name="submit" value="Edit Auto Award" /></td>
  </tr>
</table>
</form>