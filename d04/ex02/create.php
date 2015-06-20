<?php
if (!isset($_POST["login"]) || !isset($_POST["passwd"]) || $_POST["login"] === "" || $_POST["passwd"] === "" || $_POST["submit"] !== "OK")
{
	echo "ERROR\n";
	return false;
}
if (!file_exists("../private"))
	mkdir("../private");
if (file_exists("../private/passwd"))
{
	$id_pw = unserialize(file_get_contents('../private/passwd'));
	foreach ($id_pw as $user)
		if ($user["login"] === $_POST["login"])
		{
			echo "ERROR\n";
			return false;
		}
}
$new["login"] = $_POST["login"];
$new["passwd"] = hash('whirlpool', $_POST["passwd"]);
$id_pw[] = $new;
file_put_contents('../private/passwd', serialize($id_pw));
echo "OK\n";
?>