<html>
<body>

<?php
$arg1 = htmlspecialchars($_POST["network"]);
$arg2 = htmlspecialchars($_POST["password"]);
?> 

Name: <?php echo $arg1; ?><br>
Password: <?php echo $arg2; ?>

<?php //$path = '/home/pi/Desktop/test.txt';
//$file = fopen("test.txt", "w") or die("Unable to open file!");
//echo fwrite($file, "Hello World. Testing!");
//fclose($file);

$output;
$return_var;

exec("./php_root -n '" . $arg1 . "' -p '" . $arg2 . "'", $output, $return_var);
echo "\nNumber of outputs: " . count($output) . "\n";
foreach( $output as $value ) {
	echo "value $value <br />";
}
echo "return was $return_var";
?>
</body>
</html>
