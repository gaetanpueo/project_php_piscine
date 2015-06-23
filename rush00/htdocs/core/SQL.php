<?php
	function SQLQuery($query)
	{
		$pong = array();

		$base = mysqli_connect('127.0.0.1', 'root', 'born2code', 'ft_minishop');
		$data = mysqli_query  ($base, $query);

		while ($buffer = mysqli_fetch_assoc($data))
		{
			$pong[] = $buffer;
		}
		return($pong);
	}
	
	function SQLQuery_UP($query)
	{
		$base = mysqli_connect('127.0.0.1', 'root', 'born2code', 'ft_minishop');
		
		if (mysqli_query($base, $query))
		{
			return (0);
		}
		else
		{
			return (1);
		}
	}

	function SQLQuery_IN($sql)
	{
		$base = mysqli_connect('127.0.0.1', 'root', 'born2code', 'ft_minishop');
		mysqli_query($base, $sql);
		mysqli_close($base);
	}

	function SQLQuery_DEL($sql)
	{
		$base = mysqli_connect('127.0.0.1', 'root', 'born2code', 'ft_minishop');
		mysqli_query($base, $sql);
		mysqli_close($base);
	}
?>
