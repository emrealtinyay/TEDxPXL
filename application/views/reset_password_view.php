<h2>Reset Password</h2>
<div id="reset_pasword_form">
	<form action="reset_password" method="POST">
		<tr>
			<td>Email:</td>
			<td>
				<span class="input-group">							  
					<input type="email" name="email" class="form-control" value="<?php echo set_value('email');?>"/>
					<input type="text" name="username" class="form-control" value="<?php echo set_value('username');?>"/>
				</span>
			</td>
			<tr>
				<td>
					<input type="submit" name="submit" value="Reset My Password" class="btn-custom-verzend"/>
				</td>
			</tr>		 
		</tr>
	</form>
</div>