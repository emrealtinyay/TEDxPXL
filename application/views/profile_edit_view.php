
				<!-- header -->
				<!-- content -->
				<section class="slice" >
					<div class="container">
						<div class="col-lg-12">
							<h1>Profiel</h1>
							<h2 class="subTitle">I was born intelligent, but education ruined me!</h2>
						</div>
						<div class="profile">
						<!-- Profile Image -->
						<img class="img-profile" src="<?php echo base_url();?>uploads/UserPics/<?php if($profileInfo[0]['foto'] !== ''){echo($profileInfo[0]['foto']);}else{echo('default_pic1.jpg');}?>" alt="Profiel foto" />
						</div>
						<div class="profile_info">
							<!-- Progress bar -->
							
							<!-- Profile_info -->
							<?php echo form_open(current_url())?>
							<table>
								<tr>
								  <td>Naam:</td>
								  <td><span class="input-group">
								  <input type="text" id='naam' placeholder="Naam" class="form-control" name="Naam"/></span></td>
								</tr>
								<tr>
								  <td>Voornaam:</td>
								  <td><span class="input-group">
								  <input type="text" id='voornaam' placeholder="Voornaam" class="form-control" name="Voornaam"/></span></td>
								</tr>
								<tr>
								  <td>Woonplaats:</td>
								  <td><span class="input-group">
								  <input type="text" id='woonplaats' placeholder="Woonplaats" class="form-control" name="Woonplaats"/></span></td>
								</tr>
								<tr>
								  <td>Geboortedatum:</td>
								  <td><span class="input-group">
								  <input type="text" id='geboortedatum' placeholder="Geboortedatum" class="form-control" name="Geboortedatum"/></span></td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<input type="submit" class="btn btn-lg" name="submit" id="submit" value="Update" />
										</div>
									</td>
								</tr>
								
							</table>
							<?php echo form_close()?>
							<!-- Posts -->
							<?php echo form_open_multipart('upload/upload_user');?>
								Upload hier een foto!
								<input type="file" name="userfile" />
									<br /><br />
								<input type="submit" value="upload" class="btn btn-lg"/>

							<?php echo form_close()?>
							<a href="<?php echo base_url();?>index.php/profile" style="width: 48px;"><img src="<?php echo base_url();?>images/profile_edit.png" alt="profile_edit" style="position: relative; left: 700px; top: -350px;"/>
							</a>
						</div>
					</div>
				</section>
					