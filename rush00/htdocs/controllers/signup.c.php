<?php
	if (isset($_POST['user'  ]) && $_POST['user'  ] != '') {
	if (isset($_POST['pass_a']) && $_POST['pass_a'] != '') {
	if (isset($_POST['pass_b']) && $_POST['pass_b'] != '') {
	if (isset($_POST['mail'  ]) && $_POST['mail'  ] != '') {

		if ($_POST['pass_a'] == $_POST['pass_b'])
		{
			SQLQuery_IN("INSERT INTO ft_users (name, mail, password, privilege) VALUES ('".$_POST['user']."', '".$_POST['mail']."', '".hash('md5', $_POST['pass_a'])."', '1')");
			header('Location: index.php?nav=signin');
		}
	}}}}
	include('views/signup.v.php');
?>
