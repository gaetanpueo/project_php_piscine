<div id="Cart" class="page">

	<form method="POST" action="index.php?nav=home&amp;order=true">

		<table><?php

			$type = 1;

			foreach ($data as $value)
			{
				echo'
				<tr class="row'.$type.'">

					<td class="icon">
						<a href="index.php?nav=cart&remove='.$value['id'].'" alt="Remove from cart">
							<img src="core/webdesigns/ft_minishop/cross.png" alt="Remove from cart" title="Remove from cart" />
						</a>
					</td>

					<td class="name">
						<a href="index.php?nav=records&id='.$value['id'].'" alt="#">
							'.$value['name'].'
						</a>
					</td>

					<td class="quantity">'.$value['stock'].'  </td>
					<td class="price"   >'.$value['price'].' €</td>
				</tr>';

				$type = !$type;
			}
			echo '
			<tr class="row'.$type.'">
				<td class="total" colspan="4">
					Total : '.$total.' €
				</td>
			</tr>';

		?></table>

		<?php
			if (isset($_SESSION['ft_user']))
			{
				echo '
				<div class="submit">
					<input type="submit" value="Proceed to payment" />
				</div>';
			}
			else
			{
				echo '
				<div class="warning">
					You must be registered to proceed your cart
				</div>';
			}
		?>

	</form>

</div>
