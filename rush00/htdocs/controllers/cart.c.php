<?php
	if (isset($_GET['add']) && is_numeric($_GET['add']) && 
		isset($_GET['num']) && (is_numeric($_GET['num']) > 0))
	{
		$brownie = array();

		if ($_SESSION['cart'] == '#')
		{
			$_SESSION['cart'] = $_GET['add'].":".$_GET['num'].";";
		}
		else
		{
			if ($data = explode(';', $_SESSION['cart']))
			{
				$n = 0;

				foreach ($data as $value)
				{
					if ($value)
					{
						if ($data_b = explode(':', $value))
						{
							if ($data_b[0] == $_GET['add'])
							{
								$n = 1;
								$brownie[] = $data_b[0].":".($data_b[1] + $_GET['num']).";";
							}
							else
							{
								$brownie[] = $data_b[0].":".$data_b[1].";";
							}
						}
					}
				}
				if ($n)
				{
					$_SESSION['cart'] = implode($brownie);
				}
				else
				{
					$_SESSION['cart'] = implode($brownie).$_GET['add'].":".$_GET['num'].";";;
				}
			}
		}
	}
	else if (isset($_GET['remove']) && is_numeric($_GET['remove']))
	{
		$cookie = array();

		if ($cookie_x = explode(';', $_SESSION['cart']))
		{
			foreach ($cookie_x as $value)
			{
				if ($value)
				{
					if ($cookie_y = explode(':', $value))
					{
						if ($cookie_y[0] == $_GET['remove'] && $cookie_y[1] > 1)
						{
							$cookie[] = $cookie_y[0].":".($cookie_y[1] - 1).";";
						}
						else if ($cookie_y[0] != $_GET['remove'])
						{
							$cookie[] = $cookie_y[0].":".$cookie_y[1].";";
						}
					}
				}
			}
			if (sizeof($cookie) <= 0)
			{
				$_SESSION['cart'] = '#';
				header('Location: index.php?nav=cart');
			}
			else
			{
				$_SESSION['cart'] = implode($cookie);
				header('Location: index.php?nav=cart');
			}
		}
	}
	if (isset($_SESSION['cart']) && $_SESSION['cart'] != '#')
	{
		$data = array();

		if ($cookie_a = explode(';', $_SESSION['cart']))
		{
			$total = 0;

			foreach ($cookie_a as $value)
			{
				if ($value)
				{
					if ($cookie_b = explode(':', $value))
					{
						$query = "SELECT * FROM ft_products WHERE id = '".$cookie_b[0]."'";

						if ($buffer = SQLQuery($query))
						{
							$buffer[0]['stock'] = $cookie_b[1];
							$buffer[0]['price'] = ft_price($buffer[0]['price'], $cookie_b[1]);

							$total += $buffer[0]['price'];
							$data[] = $buffer[0];
						}
					}
				}
			}
			include('views/cart.v.php');
		}
	}
	else
	{
		echo '
		<div class="error">
			Your cart seems empty
		</div>';
	}
?>
