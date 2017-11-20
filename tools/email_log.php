<?php
// Send an email containing the past x hours worth of logs equaling the specified level or higher

$th = Loader::helper('text');
$db= Loader::db();

$level = $th->sanitize($_REQUEST['level']);
$hours = $th->sanitize($_REQUEST['hours']);

$lastXhours = time() - ($hours * 60 * 60);
$sql = "select logID, channel, time, message, uID, level from Logs where level >= " . $level . " and time >= " . $lastXhours . " order by time DESC";
//echo $sql;
$res = $db->GetAll($sql); #returns all rows as two-dimensional array

$body = "";
foreach($res as $record) {
	$body .= "logID:" . $record['logID'] . "\n";
	$body .= "channel:" . $record['channel'] . "\n";
	$body .= "time:" . date('Y-m-d h:i:s A', $record['time']) . "\n";
	$body .= "message:" . $record['message'] . "\n";
	$body .= "uID:" . $record['uID'] . "\n";
	$body .= "level:" . $record['level'] . "\n";
	$body .= "\n";
}
//echo $body;
if (!empty($res)) {
	mail("webblazers@yahoo.com", "VW Concrete5 errors", $body);
}
?>