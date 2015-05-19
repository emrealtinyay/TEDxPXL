<h2>Update your Password</h2>
<div id="update_password_form">
	<form action="update_password" method="POST">
		<tr>
			<td>Email:</td>
			<td>
				<span class="input-group">
					<input type="email" name="email" class="form-control" value="<?php echo $email;?>"/>
				</span>
			</td>
			<td>New Password:</td>
			<td>
				<span class="input-group">
					<input type="password" name="password" class="form-control" value=""/>
				</span>
			</td>
			<td>New Password Again:</td>
			<td>
				<span class="input-group">
					<input type="password" name="password_conf" class="form-control" value=""/>
				</span>
			</td>
			<td><?php echo $message;?></td>
			<tr>
				<td>
					<input type="submit" name="submit" value="Update My Password" class="btn-custom-verzend"/>
				</td>
			</tr>		 
		</tr>
	</form>
</div>