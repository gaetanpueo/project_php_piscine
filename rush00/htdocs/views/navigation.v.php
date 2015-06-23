<div id="Navigation">
	<div class="content">

		<ul id="menu">
			<li>
				<a class="title" href="index.php?nav=home">HOME</a>
			</li>

			<li>
				<a class="title" href="index.php?nav=category&amp;id=1">RECORDS</a>

				<ul>
				<?php
					foreach ($categories as $value)
					{
						echo '
						<li><a href="index.php?nav=category&amp;id='.$value['id'].'">'.$value['name'].'</a></li>';
					}
				?>
				</ul>
			</li>

			<li>
				<a class="title" href="index.php?nav=cart">CART</a>
			</li>

			<li>
				<?php
					if (isset($_SESSION['ft_user']))
					{
						echo '
						<a class="title" href="index.php?nav=account">ACCOUNT</a>
						<ul>
							<li><a href="index.php?nav=signout">SIGN OUT</a></li>
						</ul>';
					}
					else
					{
						echo'
						<a class="title" href="index.php?nav=signin">ACCOUNT</a>
						<ul>
							<li><a href="index.php?nav=signin">SIGN IN</a></li>
							<li><a href="index.php?nav=signup">SIGN UP</a></li>
						</ul>';
					}
				?>
			</li>
		</ul>

	</div>
</div>
