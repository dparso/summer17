<html>
<body>

Name: <?php echo $_GET["name"]; ?><br>
Password: <?php echo $_GET["email"]; ?>

<?php

$path = '/home/pi/Desktop/test.txt';
//$file = fopen("test.txt", "w") or die("Unable to open file!");
//echo fwrite($file, "Hello World. Testing!");
//fclose($file);

$output;
$return_var;
exec("./php_root", $output, $return_var);
echo "\nNumber of outputs: " . count($output) . "\n";
foreach( $output as $value ) {
	echo "value $value <br />";
}
echo "return was $return_var";
?>
</body>
</html>
