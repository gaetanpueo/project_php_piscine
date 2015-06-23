<!DOCTYPE html>

<?php
	session_start();

	if (!isset($_SESSION['cart']))
	{
		$_SESSION['cart'] = "#";
	}
	$base = mysqli_connect('127.0.0.1', 'root', 'root', 'ft_minishop');
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>The Rats Factory</title>
		<link rel="stylesheet" href="core/webdesigns/ft_minishop.css">
	</head>

	<body>
		<?php include('controllers/navigation.c.php'); ?>

		<div id="Header">
			<div class="content">

			</div>
		</div>

		<div id="Content" class="content">

			<?php
				if (isset($_GET['nav']))
				{
					if		($_GET['nav'] == "home"	   ) {include('controllers/home.c.php'	    );}
					else if ($_GET['nav'] == "records" ) {include('controllers/records.c.php'   );}
					else if ($_GET['nav'] == "category") {include('controllers/categories.c.php');}
					else if ($_GET['nav'] == "cart"	   ) {include('controllers/cart.c.php'	    );}
					else if ($_GET['nav'] == "account" ) {include('controllers/account.c.php'   );}
					else if ($_GET['nav'] == "signup"  ) {include('controllers/signup.c.php'    );}
					else if ($_GET['nav'] == "signin"  ) {include('controllers/signin.c.php'    );}
					else if ($_GET['nav'] == "signout" ) {include('controllers/signout.c.php'   );}
					else								 {include('controllers/home.c.php'	    );}
				}
				else									 {include('controllers/home.c.php'	    );}

				if (isset($_GET['order']) && $_GET['order'] == true)
				{
					$query = "SELECT * FROM ft_users WHERE name = '".$_SESSION['ft_user']."'";

					if ($data = SQLQuery($query))
					{
						SQLQuery_IN("INSERT INTO ft_orders (user, date) VALUES ('".$data[0]['id']."', '".date('Y-m-d')."')");
						unset($_SESSION['cart']);
						echo '
						<div class="message">
							You order has been successfully registered !
						</div>';
					}
				}
			?>

		</div>

		<div id="Footer">
			<div class="content">
				<p>Copyright © 2015 The Rats Factory</p>
			</div>
		</div>
	</body>
</html>
