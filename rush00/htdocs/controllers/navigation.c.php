<?php
	include('core/SQL.php'  );
	include('core/Tools.php');

	$query = "SELECT * FROM ft_categories";

	if (($categories = SQLQuery($query)))
	{
		include('views/navigation.v.php');
	}
?>
