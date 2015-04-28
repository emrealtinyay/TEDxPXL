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
									<div class="alert alert-success"><strong>Well done!<strong> Uw formulier is succesvol ingediend!</div>
								</div>															
								<div class="col-sm-4" style="float: left;">
									<h4>Address:</h4>
									<address>
										PXL<br>
										Elfde-Liniestraat 24<br>
										3500 Hasselt<br>
										tel. +32 11 77 55 55<br>
										hexion@pxl.be<br>
									</address>
								</div>								
								<div class="maps" style="float: right;">
									<iframe src="https://mapsengine.google.com/map/embed?mid=zEoA9h5bVPRA.kI1oX3qQO_DE" width="640" height="480"></iframe>                                   
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
										<textarea class="form-control" name="comments" id="comments" cols="3" rows="5" placeholder="Enter your message" value="<?php echo set_value('comments'); ?>"></textarea>														
										<?/*php echo form_textarea( array( 'name' => 'comments', 'rows' => '5', 'cols' => '80', 'value' => set_value('comments') ) )*/?>			
									</div>									
									<div class="form-group">
										<input type="submit" class="btn-custom-verzend" name="submit" id="submit" value="Submit" />
									</div>									
											<?/*php echo form_submit( 'submit', 'Submit'); */?>																									
									<?php echo form_close(); ?>
								</div>
								</div>
							</div>
					</section>					

