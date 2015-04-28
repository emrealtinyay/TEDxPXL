				<section class="slice" id="news">
					<div class="container imgHover">
						<div class="row">
							<div class="col-lg-12">
								<h1>New members</h1>
								<h2 class="subTitle">Here, there and everywhere... what we've been doing</h2>
							</div>
							<?php
								$k = 0;
								foreach( $leden['leden'] as $row){
                             
								?>
							<article class="col-sm-4">
								<section class="imgWrapper">
                                    <img src= "<?php echo base_url();?>uploads/UserPics/<?php if($data['lid'.$k][0]['foto'] !== ''){ echo($data['lid'.$k][0]['foto']);}else{echo('default_pic1.jpg');}?>" class="img-news" alt="Profiel foto lid">
                                   </section>
								<div class="mediaHover" style="height: 286px;">
									<div class="mask" style="height: 286px; width: 360px; margin-top: 286px; display: block;"></div>
									<div class="iconLinks" style="margin-top: 69px; display: block;">
                                        <a href="<?php echo base_url();?>uploads/UserPics/<?php if($data['lid'.$k][0]['foto'] !== ''){ echo($data['lid'.$k][0]['foto']);}else{echo('default_pic1.jpg');}?>" class="image-link animated flipOutX" title="Zoom">
                                        <i class="icon-search-large iconRounded iconBig"></i> 
											<br/>
											<span>zoom</span>
										</a> 
									</div>
								</div>
								<section class="newsText color4">
									<h3>Nieuw LID</h3>
									<h4 class="date"><?php echo($leden['leden'][$k]['uacc_date_added'])?></h4>
									<p> 
										<?php echo($leden['leden'][$k]['uacc_username'])?> <br/>
								        <?php echo($leden['leden'][$k]['uacc_email'])?> <br/>
								    </p>
								</section>
							</article>

							<?php 
								$k++;
								}?>
                        

						</div>
					</div>
				</section>