<!DOCTYPE html>
<html>
<body>

<?php

$servername = "turing.bowdoin.edu";
$username = "energydata";
$password = "zxZbLKC5fdvNPOpw";
$dbname = "energydata";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error . "\n");
}

$sql = "SELECT ID, NAME, VALUE FROM Data";
$result = $conn->query($sql);

$jsonArray = array();

if($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$jsonArrayItem = array();
		$jsonArrayItem['label'] = $row["NAME"];
		$jsonArrayItem['value'] = $row["VALUE"];
		array_push($jsonArray, $jsonArrayItem);
		echo "ID: " . $row["ID"] . " - Name: " . $row["NAME"] . " = " . $row["VALUE"] . "<br>\n";
	}
} else {
	echo "0 results.\n";
}


$conn->close();
?>

</body>
</html>
