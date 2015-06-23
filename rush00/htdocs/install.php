<?php
	$filename       = 'database/ft_minishop.sql';
	$mysql_host     = 'localhost';
	$mysql_username = 'root';
	$mysql_password = 'born2code';
	$mysql_database = 'ft_minishop';

	$link = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
	mysqli_query($link, "CREATE DATABASE ft_minishop");
	mysqli_select_db($link, $mysql_database);

	$templine = '';
	$lines = file($filename);

	foreach ($lines as $line)
	{
		if (substr($line, 0, 2) == '--' || $line == '')
		{
		    continue;
		}
		$templine .= $line;

		if (substr(trim($line), -1, 1) == ';')
		{
		    mysqli_query($link, $templine);
		    $templine = '';
		}
	}
?>
