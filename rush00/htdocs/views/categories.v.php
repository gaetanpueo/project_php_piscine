<div id="Category" class="page">

	<table><?php

			$type = 1;

			foreach ($data as $value)
			{
				echo'
				<tr class="row'.$type.'">

					<form method="GET" action="index.php">
						<td class="icon">
							<input type="image" src="core/webdesigns/ft_minishop/plus.png" border="0" name="submit" alt="Add to cart" />
						</td>

						<td class="name">
							<a href="index.php?nav=records&id='.$value['id'].'" alt="#">
								'.$value['name'].'
							</a>
						</td>

						<td class="production">'.$value['production'].'</td>
						<td class="stock"     >'.$value['stock'		].'</td>

						<td class="quantity">
							<input type="hidden" name="nav" value="cart">
							<input type="hidden" name="add" value="'.$value['id'].'">
							<input type="text" name="num" value="1">
						</td>

						<td class="price">'.$value['price'].' €</td>
					</form>
				</tr></form>';

				$type = !$type;
			}

	?></table>

</div>
