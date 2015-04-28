					<section class="slice" id="contactSlice">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<h1 class="noSubtitle">Search</h1>
								</div>
								
								<?php
								echo '<h4>Gebruikers:</h4>';
								echo '<h6>Er zijn '.$aantalGebruikers.' gebruikers gevonden</h6>';
								$i=0;
								foreach ($profielen as $row) {
									echo 'Username: ' .$profielen[$i]['uacc_username'].'<br/>';
									echo 'Email: ' . $profielen[$i]['uacc_email']. '<br/><br/><br/>';
									$i = $i + 1;
								}
								
								echo '<h4>Events:</h4>';
								echo '<h6>Er zijn '.$aantalEvents.' events gevonden</h6>';
								$i=0;
								foreach ($events as $row) {
									echo 'Event: '.$events[$i]['naam'].'<br/>'; 
									echo 'Locatie: '.$events[$i]['locatie'].'<br/>'; 
									echo 'Adres: '.$events[$i]['adres'].'<br/>';
									echo 'Tijd: '.$events[$i]['tijd']. '<br/><br/><br/>';
									$i = $i + 1;
								}
								
								echo '<h4>Forum posts:</h4>';
								echo '<h6>Er zijn '.$aantalForumitems.' forumitems gevonden</h6>';
								$i=0;
								foreach ($forumitems as $row) {
									echo 'Categorie: '.$forumitems[$i]['categorie']. '<br/>';
									echo 'Onderwerp: '.$forumitems[$i]['onderwerp'].'<br/>';
									echo 'Naam: '.$forumitems[$i]['naam'].'<br/>';
									echo 'Titel: '.$forumitems[$i]['titel'].'<br/>';
									echo 'Bericht: '.$forumitems[$i]['bericht'].'<br/><br/><br/>';
									$i = $i + 1;
								}
								?>									
							</div>
						</div>
					</section>