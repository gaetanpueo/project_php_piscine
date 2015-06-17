#!/usr/bin/php
<?php
function ft_strtoupper($matches)
{
	print("\t$matches[0]"."\n");
	$a = strtoupper($matches[0]);
	print("\t$a"."\n");
	return ($a);
}
function ft_start_link($value, $i)
{
	if ($value[$i] == '<' && $value[$i + 1] == 'a' && $value[$i + 2] == ' ')
		return (true);
	return (false);
}
function ft_end_link($value, $i)
{
	if ($value[$i] == '/' && $value[$i + 1] == 'a' && $value[$i + 2] == '>')
		return (false);
	return (true);
}
function ft_start_comma($value, $i)
{
	if ($value[$i] == '=' && $value[$i + 1] == '"')
		return (true);
	return (false);
}
function ft_end_comma($value, $i)
{
	if ($value[$i] != '=' && $value[$i + 1] == '"')
		return (false);
	return (true);
}
function ft_start_link_b($value, $i)
{
	if ($value[$i] == '>')
		return (true);
	return (false);
}
function ft_start_pause($value, $i)
{
	if ($value[$i] == '<')
		return (true);
	return (false);
}
function ft_end_pause($value, $i)
{
	if ($value[$i] == '>')
		return (false);
	return (true);
}
if ($argc > 1)
{
	$tab = file($argv[1]);
	if (!$tab)
		print("file Error\n");
	else
	{
		$link = false;
		$comma = false;
		foreach ($tab as $key => $value)
		{
			$len = strlen($value);
			$i = 0;
			while ($i < $len - 2)
			{
				if (!$link)
					$link = ft_start_link($value, $i);
				else
				{
					if (!$comma)
						$comma = ft_start_comma($value, $i);
					else
					{
						$upper = strtoupper($tab[$key][$i]);
						$tab[$key][$i] = $upper[0];
						$comma = ft_end_comma($value, $i);
					}
					$link = ft_end_link($value, $i);
				}
				$i++;
			}
		}
		$link_a = false;
		$link_b = false;
		$pause = false;
		foreach ($tab as $key => $value)
		{
			$len = strlen($value);
			$i = 0;
			while ($i < $len - 1)
			{
				if (!$link_a)
					$link_a = ft_start_link($value, $i);
				else
				{
					if (!$link_b)
						$link_b = ft_start_link_b($value, $i);
					else
					{
						if (!$pause)
						{
							$upper = strtoupper($tab[$key][$i]);
							$tab[$key][$i] = $upper[0];
							$pause = ft_start_pause($value, $i);
						}
						else
							$pause = ft_end_pause($value, $i);
						$link_a = ft_end_link($value, $i);
						$link_b = ft_end_link($value, $i);
					}
				}
				if (!$link_a)
				{
					$link_b = false;
					$pause = false;
				}
				$i++;
			}
		}
		foreach ($tab as $value)
			print($value);
	}
}
?>