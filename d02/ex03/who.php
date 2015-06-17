#!/usr/bin/php
<?php
$file = fopen("/var/run/utmpx", "r");
if ($file == false)
	exit ;
$uuid = get_current_user();
date_default_timezone_set("Europe/Paris");
$tab_results = array();
while ($line = fread($file, 628)) //read all the structs
{
	$tab = unpack("a256login/a4id/a32line/ipid/itype/itime/a256host/I16pad",
		$line);
	echo "[".$tab["login"]."]\n";
	$tab["login"] = substr($tab["login"], 0, strpos($tab["login"], "\0"));
	if ($tab["login"] == $uuid && $tab['type'] == 7)
	{
		$tab["line"] = substr($tab["line"], 0, strpos($tab["line"], "\0"));
		$tab_results[$tab["line"]] = $tab["time"];
	}
}
ksort($tab_results);
foreach($tab_results as $line => $time)
{
	printf("%-8s %-8s %s \n", $uuid, $line, date("M  j H:i", $time));
}
fclose($file);
?>