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
function ft_is_spec($char)
{
	if ($char <= '/')
		return (true);
	if (':' <= $char && $char <= '@')
		return (true);
	if ('[' <= $char && $char <= '`')
		return (true);
	if ('{' <= $char)
		return (true);
	return (false);
}
function ft_is_num($char)
{
	if ('0' <= $char && $char <= '9')
		return (true);
	return (false);
}
function ft_is_min($char)
{
	if ('a' <= $char && $char <= 'z')
		return (true);
	return (false);
}
function ft_is_maj($char)
{
	if ('A' <= $char && $char <= 'Z')
		return (true);
	return (false);
}
function ft_check_swap($a, $b)
{
	$len_a = strlen($a);
	$len_b = strlen($b);
	$len = min($len_a, $len_b);
	$i = 0;
	while ($i < $len)
	{
		if (ft_is_spec($a[$i]))
		{
			if (!ft_is_spec($b[$i]))
				return (true);
			else if ($b[$i] < $a[$i])
				return (true);
			else if ($b[$i] > $a[$i])
				return (false);
		}
		else if (ft_is_num($a[$i]))
		{
			if (ft_is_spec($b[$i]))
				return (false);
			else if (!ft_is_num($b[$i]))
				return (true);
			else if ($b[$i] < $a[$i])
				return (true);
			else if ($b[$i] > $a[$i])
				return (false);
		}
		else if (ft_is_maj($a[$i]))
		{
			if (ft_is_spec($b[$i]) || ft_is_num($b[$i]))
				return (false);
			else if (ft_is_min($b[$i]))
			{
				$tmp = strtoupper($b[$i]);
				if ($tmp[0] < $a[$i])
					return (true);
				else if ($tmp[0] > $a[$i])
					return (false);
			}
			else if ($b[$i] < $a[$i])
				return (true);
			else if ($b[$i] > $a[$i])
				return (false);
		}
		else
		{
			if (ft_is_spec($b[$i]) || ft_is_num($b[$i]))
				return (false);
			else if (ft_is_maj($b[$i]))
			{
				$tmp = strtolower($b[$i]);
				if ($tmp[0] < $a[$i])
					return (true);
				else if ($tmp[0] > $a[$i])
					return (false);
			}
			else if ($b[$i] < $a[$i])
				return (true);
			else if ($b[$i] > $a[$i])
				return (false);
		}
		$i++;
	}
	if ($len == $len_a)
		return (false);
	return (true);
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
	
	$len = count($split);
	$change = true;
	while ($change)
	{
		$change = false;
		$i = 0;
		while ($i < $len - 1)
		{
			if (ft_check_swap($split[$i], $split[$i + 1]))
			{
				$tmp = $split[$i];
				$split[$i] = $split[$i + 1];
				$split[$i + 1] = $tmp;
				$change = true;
			}
			$i++;
		}
	}
	foreach ($split as $value)
		print($value."\n");
}
?>