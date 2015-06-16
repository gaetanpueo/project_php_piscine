#!/usr/bin/php
<?php
if ($argc === 2)
{
	$start = 0;
	for ($i = 0; $i < strlen($argv[1]); $i++)
	{
		if ($argv[1][$i] != " ")
		{
			if ($argv[1][$i - 1] === " " && $start === 1)
				echo " ";
			$start = 1;
			echo $argv[1][$i];
		}
	}
	echo "\n";
}
?>