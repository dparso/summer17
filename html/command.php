<?php

$command = file('https://turing.bowdoin.edu/~dparsons/software/command.txt');
echo "Read " . count($command) . " commands.\n";
for($i = 0; $i < count($command); $i++) {
	exec($command[$i]);
}

#exec("touch /home/pi/Desktop/hithere.txt");
#exec("touch /var/www/html/hithere.txt");



?>
