<?php 
//Last edited by php-mods.eu

?>
<h3>Give Award</h3>
<?php
$award = AwardData::getallawards();

if(!$award)
              {echo 'You have not added any awards on the database.';}
        else { 
?>
<form id="form" action="<?php echo adminaction('/awards/award_issue_db/');?>" method="post">
<table width="70%" border="0">
<tr>
<td width="10%">Award:</td>    
<td width="60%"><select name="awardid">
<option value="0">Select the award...</option>
    <?php
foreach($award as $awa)
{ ?>
    <option data-cat="<?php echo $awa->category; ?>" value="<?php echo $awa->awardid; ?>"><?php echo $awa->name; ?></option>  <?php } ?>
</select></td>
</tr>
<tr>
<td>Comment:</td>
<td><textarea cols="50" id="comment" name="comment" rows="5"></textarea><input type="hidden" name="dateissued" id="dateissued" value="<?php echo date('d/m/y'); ?>" /><input type="hidden" name="pilotid" id="pilotid" value="<?php echo $pilotid; ?>" /></td>
</tr>
<tr>
    <td colspan="2"><center><input type="submit" name="submit" value="Issue This Award" /></center></td>
  </tr>
</table>
</form>
<?php } ?>