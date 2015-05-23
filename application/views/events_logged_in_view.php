				<div style="background-position: 50% -1486.18px;" id="paralaxSlice2" data-stellar-background-ratio="0.7">
					<div class="maskParent">
						<div class="paralaxMask"></div>
						<div class="paralaxText container">
				
							<blockquote class="bigTitle">You know you had fun when you can't tell your parents what you did.</blockquote>
						</div>
					</div>
				</div>
				<section class="slice" id="team">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h1>Upcoming Events</h1>
								<h2 class="subTitle">Join us for a legendary night of ultimate pleasure</h2>
							</div>
							
							<div class="col-sm-6 col-md-3">
								<article>
									<form action="" method="POST">
								<tr>
									<td>Event aanmaken :</td><br/>
									<td>-----------------</td><br/>
									<td>Naam:</td>
									<td>
										<span class="input-group">
											<input type="text" id='naam' placeholder="Naam" class="form-control" name="naam"/><br/>
										</span>
									</td>
									<td>Locatie:</td>
									<td>
										<span class="input-group">
											<input type="text" id='locatie' placeholder="Locatie" class="form-control" name="locatie"/><br/>
										</span>
									</td>
									<td>Adres:</td>
									<td>
										<span class="input-group">
											<input type="text" id='adres' placeholder="Adres" class="form-control" name="adres"/><br/>
										</span>
									</td>
									<td>Tijd:</td>
									<td>
										<span class="input-group">
											<input type="text" id='tijd' placeholder="Tijd" class="form-control" name="tijd"/><br/>
										</span>
									</td>
									<td>Datum:</td>
									<td>
										<span class="input-group">
											<input type="date" id='datum' placeholder="DD/MM/JJJJ" class="form-control" name="datum"/><br/>
										</span>
									</td>
									<td>Maand:</td>
									<td>
										<span class="input-group">
											<input type="text" id='maand' placeholder="Maand" class="form-control" name="maand"/><br/>
										</span>
									</td>
									<td>Info:</td>
									<td>
										<span class="input-group">
											<input type="text" id='info' placeholder="Info" class="form-control" name="info"/><br/>
										</span>
									</td>
									<tr>
										<td>
											<input type="submit" name="submit" id="submit" value="Maak Event" />
										</td>
									</tr>		 
								</tr>
							</form>
								</article>
							</div>
							
							<div> 
								<article>
									<form action="event_detail" method="POST">
										<tr>
											<td>Event detail opvragen :</td><br/>
											<td>-----------------------</td><br/>
											<td>Datum:</td>
											<td>
												<span class="input-group">
													<input type="date" id='datum' placeholder="DD/MM/JJJJ" class="form-control" name="datum"/><br/>
												</span>
											</td>
											<tr>
												<td>
													<input type="submit" name="submit" id="submit" value="Ga naar Event Detail" />
												</td>
											</tr>
										</tr>
									</form>		
								</article>
							</div>	
							<br/><br/><br/>
							<div> 
								<article>
									<form action="event_detail" method="POST">
										<tr>
											<td>Event verwijderen :</td><br/>
											<td>------------------</td><br/>
											<td>Datum:</td>
											<td>
												<span class="input-group">
													<input type="date" id='datum' placeholder="DD/MM/JJJJ" class="form-control" name="datum"/><br/>
												</span>
											</td>
											<tr>
												<td>
													<input type="submit" name="submit" id="submit" value="Event Verwijderen" />
												</td>
											</tr>
										</tr>
									</form>	
								</article>
							</div>
						</div>			
								<?php echo $calendar; ?>
					</div>
				</section>