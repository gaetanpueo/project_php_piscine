<?php
function ft_split($var)
{
	$tmp = explode(' ', $var);
	$res = array();
	$i = count($tmp);
	$j = 0;
	while ($i >= 0)
	{
		if($tmp[$i])
		{
			$res[$j] = $tmp[$i];
			$j++;
		}
		$i--;
	}
	return $res;
}
?>