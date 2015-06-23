<?php
	if (!isset($_SESSION['ft_user']))
	{
		if (isset($_POST['user']) && $_POST['user'] != '') {
		if (isset($_POST['pass']) && $_POST['pass'] != '') {

			$query = "SELECT * FROM ft_users WHERE name = '".$_POST['user']."'";

			if ($data = SQLQuery($query))
			{
				if ($data[0]['password'] == hash('md5', $_POST['pass']))
				{
					$_SESSION['ft_user'] = $_POST['user'];
					header('Location: index.php?nav=home');
				}
			}
		}}
		include('views/signin.v.php');
	}
	else header('Location: index.php?nav=home');
?>
