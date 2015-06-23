<?php
	if (isset($_SESSION['ft_user']))
	{
		if ($data = SQLQuery("SELECT * FROM ft_users WHERE name = '".$_SESSION['ft_user']."'"))
		{
			$id_user = $data[0]['id'];
			$name = $data[0]['name'];
			$mail = $data[0]['mail'];
			$privilege = $data[0]['privilege'];
			$md5mdp = $data[0]['password'];
			
			if (!$data2 = SQLQuery("SELECT * FROM ft_orders WHERE user = '".$id_user."'ORDER BY date"))
			{
				$error2 = TRUE;
			}

			### MODULE ACCOUNT ###
			
			if ($_GET['mod'] === 'account' && $_POST['save'] === 'Save' && isset($_POST['nw_mail']) && $_POST['nw_mail'] != NULL)
			{
				if (SQLQuery_UP("UPDATE ft_users SET mail='".$_POST['nw_mail']."' WHERE id='".$id_user."'") != 0)
				{
					$error_up_user = TRUE;
				}
				
				if (isset($_POST['nw_passwd_1']) && isset($_POST['nw_passwd_2']) && $_POST['nw_passwd_1'] != NULL && $_POST['nw_passwd_2'] != NULL && $_POST['nw_passwd_1'] === $_POST['nw_passwd_2'])
				{
					if (SQLQuery_UP("UPDATE ft_users SET password='".hash("md5", $_POST['nw_passwd_1'])."' WHERE id='".$id_user."'") != 0)
					{
						$error_up_mdp = TRUE;
					}
				}
				header('Location: index.php?nav=account');
			}

			### MODULE PRODUCTS ###

			if (!$data3 = SQLQuery("SELECT * FROM ft_products"))
			{
				$error3 = TRUE;
			}

			if ($_GET['mod'] === 'products' && $_POST['add'] === 'Add' && isset($_POST['nw_name']) && $_POST['nw_name'] != NULL)
			{
				if ($data_products = SQLQuery("SELECT * FROM ft_products"))
				{
					foreach ($data_products as $value_products) 
					{
						if ($_POST['nw_name'] == $value_products)
						{
							$products_exist = TRUE;
						}
					}
					if (!$products_exist)
					{
						SQLQuery_IN("INSERT INTO ft_products (name, stock) VALUES ('".$_POST['nw_name']."', '".$_POST['nw_stock']."')");
						header('Location: index.php?nav=account');
					}
					else
					{
						$error_new_products = TRUE;
					}
				}
			}

			if ($_GET['mod'] === 'products' && $_POST['modify'] === 'Modify' && isset($_POST['nw_name']) && $_POST['nw_name'] != NULL)
			{
				if (SQLQuery_UP("UPDATE ft_products SET name='".$_POST['nw_name']."', stock='".$_POST['nw_stock']."' WHERE id='".$_POST['id_products']."'") != 0)
				{
					$error_up_products = TRUE;
				}
				else
				{
					header('Location: index.php?nav=account');
				}
			}

			if ($_GET['mod'] === 'products' && $_POST['delete'] === 'Delete')
			{
				if (SQLQuery_DEL("DELETE FROM ft_products WHERE id='".$_POST['id_products']."'") != 0)
				{
					$error_up_products = TRUE;
				}
				else
				{
					header('Location: index.php?nav=account');
				}
			}

			### MODULE CATEGORIE ###

			if (!$data4 = SQLQuery("SELECT * FROM ft_categories"))
			{
				$error4 = TRUE;
			}

			if ($_GET['mod'] === 'categories' && $_POST['add'] === 'Add' && isset($_POST['nw_name']) && $_POST['nw_name'] != NULL)
			{
				if ($data_cat = SQLQuery("SELECT * FROM ft_categories"))
				{
					foreach ($data_cat as $value_cat) 
					{
						if ($_POST['nw_name'] == $value_cat)
						{
							$cat_exist = TRUE;
						}
					}
					if (!$cat_exist)
					{
						SQLQuery_IN("INSERT INTO ft_categories (name) VALUES ('".$_POST['nw_name']."')");
						header('Location: index.php?nav=account');
					}
					else
					{
						$error_new_cat = TRUE;
					}
				}
			}

			if ($_GET['mod'] === 'categories' && $_POST['modify'] === 'Modify' && isset($_POST['nw_name']) && $_POST['nw_name'] != NULL)
			{
				if (SQLQuery_UP("UPDATE ft_categories SET name='".$_POST['nw_name']."' WHERE id='".$_POST['id_cat']."'") != 0)
				{
					$error_up_cat = TRUE;
				}
				else
				{
					header('Location: index.php?nav=account');
				}
			}

			if ($_GET['mod'] === 'categories' && $_POST['delete'] === 'Delete')
			{
				if (SQLQuery_DEL("DELETE FROM ft_categories WHERE id='".$_POST['id_cat']."'") != 0)
				{
					$error_up_cat = TRUE;
				}
				else
				{
					header('Location: index.php?nav=account');
				}
			}

			### MODULE USERS ###

			if (!$data5 = SQLQuery("SELECT * FROM ft_users"))
			{
				$error5 = TRUE;
			}

			if ($_GET['mod'] === 'users' && $_POST['add'] === 'Add' && isset($_POST['nw_name']) && $_POST['nw_name'] != NULL)
			{
				if ($data_users = SQLQuery("SELECT * FROM ft_users"))
				{
					foreach ($data_users as $value_users) 
					{
						if ($_POST['nw_name'] == $value_users)
						{
							$users_exist = TRUE;
						}
					}
					if (!$users_exist)
					{
						SQLQuery_IN("INSERT INTO ft_users (name) VALUES ('".$_POST['nw_name']."')");
						header('Location: index.php?nav=account');
					}
					else
					{
						$error_new_users = TRUE;
					}
				}
			}

			if ($_GET['mod'] === 'users' && $_POST['modify'] === 'Modify' && isset($_POST['nw_name']) && $_POST['nw_name'] != NULL)
			{
				if (SQLQuery_UP("UPDATE ft_users SET name='".$_POST['nw_name']."' WHERE id='".$_POST['id_user']."'") != 0)
				{
					$error_up_users = TRUE;
				}
				else
				{
					header('Location: index.php?nav=account');
				}
			}

			if ($_GET['mod'] === 'users' && $_POST['delete'] === 'Delete')
			{
				if (SQLQuery_DEL("DELETE FROM ft_users WHERE id='".$_POST['id_user']."'") != 0)
				{
					$error_up_users = TRUE;
				}
				else
				{
					header('Location: index.php?nav=account');
				}
			}
			
			include('views/account.v.php');
		}
	}
	else
	{
		header('Location: index.php?nav=home');
	}
?>
