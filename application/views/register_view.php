
				<!-- content -->
				<section class="slice" >
					<div class="container">
						<div class="col-lg-12">
							<h1>Maak u account aan:</h1>
							<h2 class="subTitle"></h2>
							
						</div>
						<div class="col-md-6 col-md-offset-3">
							
							<?php echo form_open(current_url()); ?> 						
							<!-- Profile_info -->
							<table>
								<tr>
								  <td>Gebruikersnaam:</td>
								  <td><span class="input-group">							  
								  <input type="text" id="gebruikersnaam" name="register_gebruikersnaam" placeholder="Gebruikersnaam" class="form-control" value="<?php echo set_value('register_gebruikersnaam');?>"/></span></td>		 
								</tr>
								<tr>
								  <td>Emailadres:</td>
								  <td><span class="input-group">
								  <input type="email" id="email" placeholder="Emailadres" class="form-control" name="register_emailadres" value="<?php echo set_value('register_emailadres');?>"/></span>		  
								  </td>
								</tr>
								<tr>
								  <td>Wachtwoord:</td>
								  <td><span class="input-group">
								  <input type="password" id="password" placeholder="Wachtwoord" class="form-control" name="register_wachtwoord" value="<?php echo set_value('register_wachtwoord');?>"/></span> 
								  </td>
								</tr>
								<tr>
								  <td>Wachtwoord bevestigen:</td>
								  <td><span class="input-group">
								  <input type="password" id="wachtwoordbev" placeholder="Wachtwoord bevestigen" class="form-control" name="register_wachtwoordbevestigen" value="<?php echo set_value('register_wachtwoordbevestingen');?>"/></span></td>
								</tr>
								<tr>
								  <td><input type="submit" name="register_user" id="submit" value="Register" class="btn-custom-verzend"/></td>
								</tr>
							</table>
							<?php echo form_close();?>
						</div>
					</div>
				</section>
				
				