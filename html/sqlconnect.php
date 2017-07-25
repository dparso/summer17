<?php

// Read data from file
$lines = file('/home/pi/Desktop/open-zwave/data.txt');

/*foreach ($lines as $line_num => $line) {
	echo "Line #{$line_num}: " . htmlspecialchars($line) . "\n";
}
*/
// Store as integers
$integers = array();

if (count($lines) <= 0) {
	die("No data in file!\n");
}

for($i = 0; $i < count($lines); $i++) {
	$integers[$i] = floatval($lines[$i]);
	echo $integers[$i] . "\n";
}
//echo "(" . count($integers) . " elements)\n";
echo "here";
$servername = "turing.bowdoin.edu";
//$servername = "localhost";
$username = "energydata";
$password = "zxZbLKC5fdvNPOpw";
$dbname = "energydata";
echo "Creating";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error . "\n");
}
echo "inserting";
// Insert each value individually
$sql = "";
// no semicolon on last? w3schools.com/php/php_mysql_insert_multiple.asp
foreach ($integers as $integer) {
	$sql .= "INSERT INTO Data (NAME, VALUE)\nVALUES ('Pi_ID', $integer);";
}

if ($conn->multi_query($sql) === TRUE) {
	echo "New record created successfully\n";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error . "\n";
}
echo "Closing";
$conn->close();

file_put_contents("/home/pi/Desktop/open-zwave/data.txt", "");
?>
