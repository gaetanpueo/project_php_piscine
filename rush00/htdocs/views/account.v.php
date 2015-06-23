<style>
#Account table
{
	width: 100%;
	border-collapse: collapse;
}

#Account td
{
	border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}
#Account td.title
{
	padding: 10px;
	font-size: 15px;
	text-align: center;
}
#Account #box-config
{
	padding: 20px;
	min-height: 100px;
	margin: auto;
}
#Account #box-config div
{
	margin: 10px;
}
#Account #box-config label
{
	display: block;
	width: 150px;
	float: left;
	margin-top: 7px;
}
#Account #box-config input[type=text],
#Account #box-config input[type=password]
{
	height: 25px;
	width: 683px;
	color: rgb(150, 135, 0);
	background: rgba(0, 0, 0, 0.2);
	border-radius: 3px;
	border: 1px solid rgba(255, 255, 255, 0.1);
	box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3);
	text-align: center;
}
#Account #box-config input[type=submit]
{
	height: 40px;
	width: 150px;
	color: rgb(150, 135, 0);
	background: rgba(0, 0, 0, 0.2);
	border-radius: 3px;
	border: 1px solid rgba(255, 255, 255, 0.1);
	box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3);
	text-align: center;
	float: right;
	margin-bottom: 20px;
}
</style>

<div id="Account" class="page">

	<table>
		
		<tr id="Module_Account_Header" class="row1">
			<td class="title">Manage my account</td>
		</tr>
		<tr id="Module_Account" class="row1">
			<td>
				
				<div id="box-config">
					<form method="post" action="index.php?nav=account&mod=account">
						<div>
							<label for="nw_name">Name :</label><input type="text" name="nw_name" value="<?php echo $name; ?>" disabled="true"/>
						</div>
						<div>
							<label>Mail :</label><input type="text" name="nw_mail" value="<?php echo $mail; ?>"/>
						</div>
						<div>
						</div>
						<div>
							<label>New Password :</label><input type="password" name="nw_passwd_1" value=""/>
						</div>
						<div>
							<label>Repeat New Password :</label><input type="password" name="nw_passwd_2" value=""/>
						</div>
						<div>
							<input type="submit" name="save" value="Save"/>
						</div>
					</form>
					<?php
					if (($error_up_user || $error_up_mdp) == TRUE)
					{
						echo 'Error : UPDATE Failed';
					}
					?>
				</div>
				
			</td>
		</tr>
		
		<tr id="Module_Purchases_Header" class="row">
			<td class="title">See my purchases</td>
		</tr>
		<tr id="Module_Purchases" class="row">
			<td>
				<?php
				if (!$error2)
				{
				?>
				<div id="box-config">
					<p>The following commands have been taken into account and are in treatment :</p>
					<ul>
						<?php
						foreach ($data2 as $value2)
						{
							echo '#'.$value2['id'].' on '.$value2['date'].'<br/>';
						}
						?>
					</ul>
				</div>
				<?php
				}
				else
				{
					echo '
					<div class="error" style="background:none;border:0;">
						Your purchase list seems empty
					</div>';
				}
				?>
			</td>
		</tr>
		
		<!-- # Admin only # -->
		<?php
		if ($privilege == 0)
		{
		?>
		
		<tr id="Module_Products_Header" class="row1">
			<td class="title">Manage Products</td>
		</tr>
		<tr id="Module_Products" class="row1">
			<td>
				<div id="box-config">
					<form method="post" action="index.php?nav=account&mod=products">
						<div>
							<label for="nw_name">Add a new product :</label><input type="text" name="nw_name" value=""/>
						</div>
						<div>
							<label for="nw_name">Stock :</label><input type="text" name="nw_stock" value=""/>
						</div>
						<div>
							<input type="submit" name="add" value="Add"/>
						</div>
					</form>
				</div>
				<?php
				if (!$error3)
				{
				?>
				<div id="box-config">
					<?php
					foreach ($data3 as $value3)
					{
					?>
					<form method="post" action="index.php?nav=account&mod=products" style="width:100%;height:150px;">
						<div>
							<label for="nw_name">Modify/Delete :</label><input type="text" name="nw_name" value="<?php echo $value3['name']; ?>"/>
						</div>
						<div>
							<label for="nw_name">Stock :</label><input type="text" name="nw_stock" value="<?php echo $value3['stock']; ?>"/>
						</div>
						<div>
							<input type="hidden" name="id_products" value="<?php echo $value3['id']; ?>"/>
							<input type="submit" name="modify" value="Modify"/><input type="submit" name="delete" value="Delete"/>
						</div>
					</form>
					<?php
					}
					?>
				</div>
				<?php
				}
				else
				{
					echo '
					<div class="error" style="background:none;border:0;">
						Your users list seems empty
					</div>';
				}
				?>
			</td>
		</tr>
		
		<tr id="Module_Categories_Header" class="row">
			<td class="title">Manage Categories</td>
		</tr>
		<tr id="Module_Categories" class="row">
			<td>
				<div id="box-config">
					<form method="post" action="index.php?nav=account&mod=categories">
						<div>
							<label for="nw_name">Add a new categorie :</label><input type="text" name="nw_name" value=""/>
						</div>
						<div>
							<input type="submit" name="add" value="Add"/>
						</div>
					</form>
				</div>
				<?php
				if (!$error4)
				{
				?>
				<div id="box-config">
					<?php
					foreach ($data4 as $value4)
					{
					?>
					<form method="post" action="index.php?nav=account&mod=categories" style="width:100%;height:100px;">
						<div>
							<label for="nw_name">Modify/Delete :</label><input type="text" name="nw_name" value="<?php echo $value4['name']; ?>"/>
						</div>
						<div>
							<input type="hidden" name="id_cat" value="<?php echo $value4['id']; ?>"/>
							<input type="submit" name="modify" value="Modify"/><input type="submit" name="delete" value="Delete"/>
						</div>
					</form>
					<?php
					}
					?>
				</div>
				<?php
				}
				else
				{
					echo '
					<div class="error" style="background:none;border:0;">
						Your categories list seems empty
					</div>';
				}
				?>
			</td>
		</tr>
		
		<tr id="Module_Users_Header" class="row1">
			<td class="title">Manage Users</td>
		</tr>
		<tr id="Module_Users" class="row1">
			<td>
				<div id="box-config">
					<form method="post" action="index.php?nav=account&mod=users">
						<div>
							<label for="nw_name">Add a new user :</label><input type="text" name="nw_name" value=""/>
						</div>
						<div>
							<input type="submit" name="add" value="Add"/>
						</div>
					</form>
				</div>
				<?php
				if (!$error5)
				{
				?>
				<div id="box-config">
					<?php
					foreach ($data5 as $value5)
					{
					?>
					<form method="post" action="index.php?nav=account&mod=users" style="width:100%;height:100px;">
						<div>
							<label for="nw_name">Modify/Delete :</label><input type="text" name="nw_name" value="<?php echo $value5['name']; ?>"/>
						</div>
						<div>
							<input type="hidden" name="id_user" value="<?php echo $value5['id']; ?>"/>
							<input type="submit" name="modify" value="Modify"/><input type="submit" name="delete" value="Delete"/>
						</div>
					</form>
					<?php
					}
					?>
				</div>
				<?php
				}
				else
				{
					echo '
					<div class="error" style="background:none;border:0;">
						Your users list seems empty
					</div>';
				}
				?>
			</td>
		</tr>
		
		<?php
		}
		?>
		
	</table>

</div>