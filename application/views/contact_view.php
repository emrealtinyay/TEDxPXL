					<div style="background-position: 50% 186.533px;" id="paralaxSlice4" data-stellar-background-ratio="0.2">
						<div class="maskParent">
							<div class="paralaxMask"></div>

							<div class="paralaxText">
								<blockquote>Keep in touch with us.</blockquote>
							</div>
						</div>
					</div>
					<section class="slice" id="contactSlice">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<h1 class="noSubtitle">Contact us</h1>
								</div>
																			
								<div class="col-sm-4" style="float: left;">
									<h4>Address:</h4>
									<address>
										TEDxPXL<br>
										Elfde-Liniestraat 24<br>
										3500 Hasselt<br>
										tel. +32 11 77 55 55<br>
										tedxpxl@pxl.be<br>
									</address>
								</div>
								
								<div class="maps" style="float: right;">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10057.051795943707!2d5.3486440000000055!3d50.937349999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c12177528ced33%3A0x27d80a1d25c8505!2sHogeschool+PXL!5e0!3m2!1snl!2s!4v1432057323845" width="600" height="450" frameborder="0" style="border:0"></iframe>                                   
								</div>							
								
								<div class="col-sm-4">
									<?php
									echo form_open('fullpage'); ?>
									<div class="form-group">
											<label for="name">Name<span class="required">*</span></label>
											<?php echo form_error('name'); ?>
											<br/>
											<input class="form-control" id="name" type="text" name="name" maxlength="50" placeholder="Name" value="<?php echo set_value('name'); ?>"  />
									</div>
									<div class="form-group">
											<label for="email">Email<span class="required">*</span></label>
											<?php echo form_error('email'); ?>
											<br/><input class="form-control" id="email" type="text" name="email" maxlength="50" placeholder="Email" value="<?php echo set_value('email'); ?>"  />
									</div>

									<div class="form-group">
											<label for="phone">Phone<span class="required">*</span></label>
											<?php echo form_error('phone'); ?>
											<br/><input class="form-control" id="phone" type="text" name="phone" maxlength="50" placeholder="Phone" value="<?php echo set_value('phone'); ?>"  />
									</div>

									<div class="form-group">
											<label for="comments">Comments<span class="required">*</span></label>
										<?php echo form_error('comments'); ?>
				                        <textarea class="form-control" name="comments" id="comments" cols="3" rows="5" placeholder="Enter your message">
                                            <?php echo set_value('comments'); ?>
                                        </textarea>
										
										
									</div>
									
									<div class="form-group">
										<input type="submit" class="btn btn-lg" name="submit" id="submit" value="Submit" />
									</div>
									
								
								
									<?php echo form_close(); ?>
								</div>

										
								</div>
								

								<!--
								<form novalidate="novalidate" method="post" action="js-plugin/neko-contact-ajax-plugin/php/form-handler.php" id="contactfrm" role="form" >
									<div class="col-sm-4"> 
										<div class="form-group">
											<label for="name">Name</label>
											<input class="form-control" name="name_contact" id="name" placeholder="Enter name" title="Please enter your name (at least 2 characters)" type="text">
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input class="form-control" name="email_contact" id="email" placeholder="Enter email" title="Please enter a valid email address" type="email">
										</div>
										<div class="form-group">
											<label for="phone">Phone</label>
											<input class="form-control required digits" name="phone_contact" id="phone" size="30" placeholder="Enter email phone" title="Please enter a valid phone number (at least 10 characters)" type="tel">
										</div>
										<div class="form-group">
											<label for="comments">Comments</label>
											<textarea class="form-control" name="comments_contact" id="comments" cols="3" rows="5" placeholder="Enter your message" title="Please enter your message (at least 10 characters)"></textarea>
										</div>
										<fieldset class="clearfix securityCheck">
											<legend>Security</legend>
											<div class="form-group">
												<img src="http://project.pjgrondelaers.com/images/testfoto22.png" alt="Image verification" id="verifyImg">
												<input class="required form-control" id="verify" name="verify" type="text">
											</div>
										</fieldset>
										<button name="submit" type="submit" class="btn btn-lg" id="submit"> Submit</button>
									</div>                        
									
								</form>
								 -->
							
						</div>
					</section>