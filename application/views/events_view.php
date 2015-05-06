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
								<?php echo $calendar; ?>
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
								<script type="text/javascript">
									$(document).ready(function() 
									{
										$('.calendar .day').click(function() /*elke dag krijgt een click*/
										{
											day_num = $(this).find('.day_num').html(); /* dag nummer wordt opgehaald*/
											day_data = prompt('Enter stuff', $(this).find('.content').html()); /* inhoud van de dag word opgehaald*/
											if (day_data != null) 
											{
												$.ajax({
													url:window.location,
													type:'POST',
													data: 
													{
														day: day_num,
														data: day_data
													},
													success: function(msg) 
													{
														location.reload();
													}
												});
											};
										});
									}); 
								</script>
							</nav>
						</div>
					</div>
				</section>