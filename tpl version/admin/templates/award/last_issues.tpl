<?php
///////////////////////////////////////////////
///  PilotAwardsSystem v1.5 by php-mods.eu  ///
///            Author php-mods.eu           ///
///            Packed at 22/1/2015          ///
///     Copyright (c) 2015, php-mods.eu     ///
///////////////////////////////////////////////

?>
<h3>Latest Award Issues</h3>
<?php if(!$issues) {echo 'You have not issued any awards yet.';} else { 
foreach($issues as $issue) { 
	$pilot = AwardData::pilot_data($issue->pilotid);
    $award = AwardData::get_award_tittle_by_id($issue->awardid); ?>
    <b><?php echo $pilot->firstname; ?> <?php echo $pilot->lastname; ?></b> got <b><?php echo $award->name; ?></b> on <b><?php echo $issue->dateissued; ?></b>.<br />
<?php } } ?>