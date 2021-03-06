<?php

session_start();

date_default_timezone_set('Europe/Paris');

if (!$_SESSION["logged_as_user"] || $_SESSION["logged_as_user"] === "")
{
	header("Location: index.html");
}
else
{
	if (($msgs = file_get_contents("../private/chat", LOCK_EX)) != FALSE)
	{
		$msgs = unserialize($msgs);
		foreach ($msgs as $msg)
		{
			echo "[".date("G:i", $msg["time"])."] <b>".$msg["login"]."</b>: ".$msg["msg"]."<br />\n";
		}
	}
}

?>