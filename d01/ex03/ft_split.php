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
?>