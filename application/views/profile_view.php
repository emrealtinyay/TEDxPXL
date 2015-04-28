
				<section class="slice" >
					<div class="container">
						<div class="col-lg-12">
							<h1>Profiel</h1>
							<h2 class="subTitle"></h2>
						</div>
						<div class="profile">
						<!-- Profile Image --> 
								<img class="img-profile" src="<?php echo base_url();?>uploads/UserPics/<?php if($profileInfo[0]['foto'] !== ''){echo($profileInfo[0]['foto']);}else{echo('default_pic1.jpg');}?>" alt="profiel foto" />
						</div>
						<div class="profile_info">
							<!-- Progress bar -->
							<?php 
							$i = 0;
							if($profileInfo[0]['naam'] !== ''){
								$i = $i +1;
							}
							if($profileInfo[0]['voornaam'] !== ''){
								$i = $i +1;
							}
							if($profileInfo[0]['woonplaats'] !== ''){
								$i = $i +1;
							}
							if($profileInfo[0]['geboortedatum'] !== ''){
								$i = $i +1;
							}
							$procent = $i/4*100;
								?>
							<div class="progress progress-striped">
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo($procent)?>%">
									<?php echo($procent)?>%
								</div>
							</div>
							je profiel is voor <?php echo($procent);?>% ingevuld, <?php if($procent <= 25){echo('dat kan beter !');}elseif($procent <= 50){echo('Je bent op weg !');}else{echo('Goedzo !');}?>
							<!-- Profile_info -->
							<table >
								<tr>
								  <td>Naam:</td>
								  <td><?php if($profileInfo[0]['naam'] == ''){echo('Je hebt nog geen naam ingestelt');}else{echo($profileInfo[0]['naam']);}?></td>
								</tr>
								<tr>
								  <td>Voornaam:</td>
								  <td><?php if($profileInfo[0]['voornaam'] == ''){echo('Je hebt nog geen voornaam ingestelt');}else{echo($profileInfo[0]['voornaam']);}?></td>
								</tr>
								<tr>
								  <td>Woonplaats:</td>
								  <td><?php if($profileInfo[0]['woonplaats'] == ''){echo('Je hebt nog geen woonplaats ingestelt');}else{echo($profileInfo[0]['woonplaats']);}?></td>
								</tr>
								<tr>
								  <td>Geboortedatum:</td>
								  <td><?php if($profileInfo[0]['geboortedatum'] == ''){echo('Je hebt nog geen geboortedatum ingestelt');}else{echo($profileInfo[0]['geboortedatum']);}?></td>
								</tr>
							</table>
							<a href="<?php echo base_url();?>index.php/profile_edit" style="width: 48px;"><img src="<?php echo base_url();?>images/profile_edit.png" alt="profile_edit" style="position: relative; left: 700px; top: -350px;"/>
							</a>						
						</div>
					</div>
				</section>
					