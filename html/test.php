<?php

$lines = file('data.txt');

foreach ($lines as $line_num => $line) {
	echo "Line #{$line_num}: " . htmlspecialchars($line) . "\n";
}

/*
$integers = array();
for($i = 0; $i < 10; $i++) {
	$integers[$i] = floatval($lines[$i]);
	echo $integers[$i] . "\n";
}
*/
?>
