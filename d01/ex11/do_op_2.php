#!/usr/bin/php
<?php
function ft_add($a, $b)
{
	return ($a + $b);
}
function ft_minus($a, $b)
{
	return ($a - $b);
}
function ft_mult($a, $b)
{
	return ($a * $b);
}
function ft_div($a, $b)
{
	return ($a / $b);
}
function ft_modulo($a, $b)
{
	return ($a % $b);
}
if ($argc == 2)
{
	$ope = explode(";", "+;-;*;/;%");
	$done = false;
	$test = sscanf($argv[1], "%d %c %d %s");
	if ($test[0] && $test[1] && $test[2] && !$test[3])
	{
		if (!strcmp("+", $test[1]))
			print(ft_add($test[0], $test[2]));
		if (!strcmp("-", $test[1]))
			print(ft_minus($test[0], $test[2]));
		if (!strcmp("*", $test[1]))
			print(ft_mult($test[0], $test[2]));
		if (!strcmp("/", $test[1]))
			print(ft_div($test[0], $test[2]));
		if (!strcmp("%", $test[1]))
			print(ft_modulo($test[0], $test[2]));
	}
	else
		echo "Syntax Error";
}
else
	echo "Incorrect Parameters";
echo "\n";
?>