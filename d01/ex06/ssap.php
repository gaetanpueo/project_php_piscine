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
	$i = 1;
	$k = 0;
	while ($i < $argc)
	{
		$tmp = ft_split($argv[$i]);
		$len_tmp = count($tmp);
		$j = 0;
		while ($j < $len_tmp)
		{
			$split[$k] = $tmp[$j];
			$j++;
			$k++;
		}
		$i++;
	}
	sort($split);
	foreach($split as $value)
		print($value."\n");
}
?>