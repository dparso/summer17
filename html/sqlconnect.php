<?php

// Read data from file
$lines = file('data.txt');

/*foreach ($lines as $line_num => $line) {
	echo "Line #{$line_num}: " . htmlspecialchars($line) . "\n";
}
*/
// Store as integers
$integers = array();
for($i = 0; $i < 10; $i++) {
	$integers[$i] = floatval($lines[$i]);
	echo $integers[$i] . "\n";
}
echo "(" . count($integers) . " elements)\n";

$servername = "turing.bowdoin.edu";
//$servername = "localhost";
$username = "energydata";
$password = "zxZbLKC5fdvNPOpw";
$dbname = "energydata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error . "\n");
}

// Insert each value individually
$sql = "";
// no semicolon on last? w3schools.com/php/php_mysql_insert_multiple.asp
foreach ($integers as $integer) {
	$sql .= "INSERT INTO Data (NAME, VALUE)
	VALUES ('Pi_ID', $integer);";
}

echo "sql is \n${sql}";

if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
