					<section class="slice" id="contactSlice">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<h1 class="noSubtitle">Event Details</h1>
								</div>								
								<?php
								echo '<h4>Naam: </h4>';
								echo '<h6>';
								echo ($data[0]['naam']);
								echo '</h6>';
								echo '<h4>Locatie: </h4>';
								echo '<h6>';
								echo ($data[0]['locatie']);
								echo '</h6>';
								echo '<h4>Adres: </h4>';
								echo '<h6>';
								echo ($data[0]['adres']);
								echo '</h6>';
								echo '<h4>Tijdstip: </h4>';
								echo '<h6>';
								echo ($data[0]['tijd']);
								echo '</h6>';
								echo '<h4>Datum: </h4>';
								echo '<h6>';
								echo ($data[0]['datum']);
								echo '</h6>';
								echo '<h4>Info: </h4>';
								echo '<h6>';
								echo ($data[0]['info']);
								echo '</h6>';								
								?>									
							</div>
						</div>
					</section>