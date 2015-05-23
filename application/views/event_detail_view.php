					<section class="slice" id="contactSlice">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<h1 class="noSubtitle">Event Details</h1>
								</div>								
								<?php
								echo '<h4>Naam: </h4>';
								echo '<h6>';
								echo $ja['user'];
								echo '</h6>';
								echo '<h4>Locatie: </h4>';
								echo '<h6>';
								echo ($data['locatie']);
								echo '</h6>';
								echo '<h4>Adres: </h4>';
								echo '<h6>';
								echo ($data['adres']);
								echo '</h6>';
								echo '<h4>Tijdstip: </h4>';
								echo '<h6>';
								echo ($data['tijd']);
								echo '</h6>';
								echo '<h4>Datum: </h4>';
								echo '<h6>';
								echo ($data['datum']);
								echo '</h6>';
								echo '<h4>Info: </h4>';
								echo '<h6>';
								echo ($data['info']);
								echo '</h6>';								
								?>									
							</div>
						</div>
					</section>