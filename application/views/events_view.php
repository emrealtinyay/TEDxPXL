				<div style="background-position: 50% -1486.18px;" id="paralaxSlice2" data-stellar-background-ratio="0.7">
					<div class="maskParent">
						<div class="paralaxMask"></div>
						<div class="paralaxText container">
				
							<blockquote class="bigTitle">You know you had fun when you can't tell your parents what you did.</blockquote>
						</div>
					</div>
				</div>
				<section class="slice" id="works">
					<div class="container clearfix">
						<div class="row">
							<div class="col-sm-12">
								<h1>Upcoming Events</h1>
								<h2 class="subTitle">Join us for a legendary night of ultimate pleasure</h2>
							</div>
							<nav id="filter" class="col-md-12 text-center">
								<ul>
								<?php 
								$datum = date('F');
								$datum_string = strtotime($datum);
								$datum_plusEen = strtotime("+1 months", $datum_string);
								$datum_plusTwee = strtotime("+2 months", $datum_string);
								$datum_plusEen_string = date("F", $datum_plusEen);
								$datum_plusTwee_string = date("F", $datum_plusTwee);
								?>
									<li><a href="" class="current btn btn-sm" data-filter="*">All</a></li>
									<li><a href="" class="btn btn-sm" data-filter=".sub1"><? echo $datum; ?></a></li>
									<li><a href="" class="btn btn-sm" data-filter=".sub2"><?php echo $datum_plusEen_string?></a></li>
									<li><a href="" class="btn btn-sm" data-filter=".sub3"><?php echo $datum_plusTwee_string?></a></li>
								</ul>
							</nav>

							<div style="position: relative; overflow: hidden; height: 1386px;" class="portfolio-items  isotopeWrapper clearfix imgHover isotope" id="3">
								<?php 
								$i = 0;
								
								foreach($data as $v){
								?>
								<article style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);" class="col-sm-4 isotopeItem <?php if($data[$i]['maand']== $datum){echo 'sub1';}elseif($data[$i]['maand']==$datum_plusEen_string){echo 'sub2';}elseif ($data[$i]['maand']==$datum_plusTwee_string){echo 'sub3';}?> isotope-item">
									<section class="imgWrapper">
										<img alt="foto event" class='img-news' src="<?php echo base_url();?>uploads/Events/<?php if($data[$i]['foto'] !== ''){echo($data[$i]['foto']);}else{echo('default_pic.jpg');}?>" >
									</section>
									<div class="mediaHover">
										<div class="mask"></div>
										<div class="iconLinks"> 
											
											<a href="<?php echo base_url();?>uploads/Events/<?php if($data[$i]['foto'] !== ''){echo($data[$i]['foto']);}else{echo('default_pic.jpg');}?>" class="image-link" title="Full width image">
												<i class="icon-search-large iconRounded iconBig"></i>
												<span>zoom</span>
											</a> 
										</div>
									</div>
									<section class="boxContent">
										<h3><?php echo($data[$i]['naam'])?></h3>
										<p> 
											<?php echo($data[$i]['datum'])?> <br>
											
											<a href="<?php echo base_url();?>index.php/event_detail/event/<?php echo($data[$i]['id'])?>">read more</a>
										</p>
									</section>
								</article>
								<?php 
								$i = $i + 1;
								}?>
								</div>
							</div>
						</div>
					</section>