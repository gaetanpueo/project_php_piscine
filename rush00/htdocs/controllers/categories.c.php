<?php
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$query = "SELECT * FROM ft_products WHERE category = '".$_GET['id']."'ORDER BY name";

		if ($data = SQLQuery($query))
		{
			for ($i = 0; $i < sizeof($data); $i++)
			{
				$data[$i]['production'] = ft_production($data[$i]['production']);
				$data[$i]['stock'     ] = ft_stock     ($data[$i]['stock'     ]);
			}
			include('views/categories.v.php');
		}
	}
	else
	{
		header('Location: index.php?nav=home');
	}
?>
