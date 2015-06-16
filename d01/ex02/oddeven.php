#!/usr/bin/php
<?php
function get_nbr()
{
	echo "Entrez un nombre: ";
	$f = fopen('php://stdin', 'r');
	if (($line = fgets($f)) == NULL)
	{
		echo "\n";
		exit();
	}
	$var = trim($line, "\n");
	if (ctype_digit($var) == FALSE)
		echo "'$var' n'est pas un chiffre\n";
	elseif ($var % 2 == 0)
		echo "Le chiffre $var est Pair\n";
	elseif ($var % 2 != 0)
		echo "Le chiffre $var est Impair\n";
	fclose($f);
}
while (1)
	get_nbr();
?>