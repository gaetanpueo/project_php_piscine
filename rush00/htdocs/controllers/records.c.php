<?php
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$query = "SELECT * FROM ft_products WHERE id='".$_GET['id']."'";

		if ($data = SQLQuery($query))
		{
			$data[0]['production'] = ft_production($data[0]['production']);
			$data[0]['stock'     ] = ft_stock     ($data[0]['stock'     ]);
			$data[0]['label']      = ft_label     ($data[0]['label'     ]);
			$data[0]['category']   = ft_category  ($data[0]['category'  ]);

			$data[0]['artist_a_one'] = ft_artist($data[0]['artist_a_one']);
			$data[0]['artist_a_two'] = ft_artist($data[0]['artist_a_two']);
			$data[0]['artist_b_one'] = ft_artist($data[0]['artist_b_one']);
			$data[0]['artist_b_two'] = ft_artist($data[0]['artist_b_two']);

			include('views/records.v.php');
		}
	}
	else
	{
		header('Location: index.php?nav=home');
	}
?>
