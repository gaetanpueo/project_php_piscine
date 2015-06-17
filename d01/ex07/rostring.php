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
	$tmp = ft_split($argv[1]);
	$tmp[count($tmp)] = $tmp[0];
	array_shift($tmp);
	foreach ($tmp as $key => $value)
	{
		if ($key == 0)
			echo $value;
		else
			echo " " . $value;
	}
	echo "\n";
}
?>