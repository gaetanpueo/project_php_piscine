#!/usr/bin/php
<?php
if ($argc > 1)
{
	$day_maj = explode(";", "Lundi;Mardi;Mercredi;Jeudi;Vendredi;Samedi;Dimache");
	$day_min = explode(";", "lundi;mardi;mercredi;jeudi;vendredi;samedi;dimache");
	$month_maj = explode(";", "Janvier;Février;Mars;Avril;Mai;Juin;Juillet;Août;Septembre;Octobre;Novembre;Décembre");
	$month_min = explode(";", "janvier;février;mars;avril;mai;juin;juillet;août;septembre;octobre;novembre;décembre");
	$tab = preg_split("/ /", $argv[1]);
	$error = false;
	if (count($tab) != 5)
		$error = true;
	if (!$error)
	{
		$day = array_search("$tab[0]", $day_maj);
		if ($day === false)
			$day = array_search("$tab[0]", $day_min);
		if ($day === false)
			$error = true;
	}
	if (!$error)
	{
		$day_nb = $tab[1];
		if (strlen($day_nb) > 2)
			$error = true;
	}
	if (!$error)
	{
		$month = array_search("$tab[2]", $month_maj);
		if ($month === false)
			$month = array_search("$tab[2]", $month_min);
		if ($month === false)
			$error = true;
	}
	if (!$error)
	{
		$year = $tab[3];
		if (strlen($year) > 4)
			$error = true;
	}
	if (!$error)
	{
		$time = $tab[4];
		if (strlen($time) != 8)
			$error = true;
		if (!$error)
		{
			$time = explode(":", $time);
			$hour = $time[0];
			$min = $time[1];
			$sec = $time[2];
		}
	}
	if ($error)
		print("Wrong Format");
	else
	{
		date_default_timezone_set("Europe/Paris");
		print(mktime($hour, $min, $sec, $month + 1, $day_nb, $year));
	}
	print("\n");
}
?>