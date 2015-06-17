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
if ($argc == 4)
{
	$argv[1] = trim($argv[1]);
	$argv[2] = trim($argv[2]);
	$argv[3] = trim($argv[3]);
	if (!strcmp("+", $argv[2]))
		print(ft_add($argv[1], $argv[3]));
	if (!strcmp("-", $argv[2]))
		print(ft_minus($argv[1], $argv[3]));
	if (!strcmp("*", $argv[2]))
		print(ft_mult($argv[1], $argv[3]));
	if (!strcmp("/", $argv[2]))
		print(ft_div($argv[1], $argv[3]));
	if (!strcmp("%", $argv[2]))
		print(ft_modulo($argv[1], $argv[3]));
}
else
	echo "Incorrect Parameters";
echo "\n";
?>