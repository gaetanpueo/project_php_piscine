#!/usr/bin/php
<?php
function ft_split($var)
{
	$tmp = explode(' ', $var);
	sort($tmp);
	$res = array();
	$i = 0;
	$j = 0;
	while ($i <= count($tmp))
	{
		if($tmp[$i])
		{
			$res[$j] = $tmp[$i];
			$j++;
		}
		$i++;
	}
	return $res;
}
if ($argc > 1)
{
	$tmp = preg_replace("/\t/", " ", $argv[1]);
	$tmp = ft_split($tmp);
	foreach ($tmp as $key => $value)
	{
		if ($key)
			print(" ".$value);
		else
			print($value);
	}
	print("\n");
}
?>