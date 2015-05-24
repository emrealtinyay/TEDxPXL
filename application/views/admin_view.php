<div class="container">
<div class="col-lg-12">
<?php 
echo form_open(current_url());
?>
naam : <input type="text" id='naam' placeholder="Naam" class="form-control" name="naam"/><br/>
locatie : <input type="text" id='locatie' placeholder="Locatie" class="form-control" name="locatie"/><br/>
adres : <input type="text" id='adres' placeholder="Adres" class="form-control" name="adres"/><br/>
tijd : <input type="text" id='tijd' placeholder="Tijd" class="form-control" name="tijd"/><br/>
datum : <input type="date" id='datum' placeholder="Datum" class="form-control" name="datum"/><br/>
maand (in het engels! en eerste letter een hoofdletter!) : <input type="text" id='maand' placeholder="Maand" class="form-control" name="maand"/><br/>
info : <input type="text" id='info' placeholder="Info" class="form-control" name="info"/><br/>
<input type="submit" name="submit" id="submit" value="Maak Event" />
<?php echo form_close();
echo form_open_multipart('upload/upload_event');?>
	Upload hier een foto! voor een event ! zorg dat de foto naam dezelfde is als die van het event.
	<input type="file" name="userfile" />
	<br /><br />
	<input type="submit" value="upload"/>
<?php echo form_close();
echo form_open(current_url());?>
geef de user ID in om een gebruiker te deleten.
naam : <input type="text" id='ID' placeholder="ID" class="form-control" name="ID"/><br/>
<input type="submit" name="submit1" id="submit1" value="Delete User" />
<?php echo form_close();
echo form_open(current_url());?>
geef de user ID in om een een veld in de contact te deleten.
naam : <input type="text" id='ID1' placeholder="ID" class="form-control" name="ID"/><br/>
<input type="submit" name="submit2" id="submit2" value="Delete Contact" />

<?php

echo (form_close());
$i = 0;
?> 
<br/>
<br/>
<table class="table">
<tr>
<th>id</th>
<th>naam</th>
<th>email</th>
<th>gsm</th>
<th>comment</th>
</tr><?php 
foreach($contact as $k){
?><tr>	
	<td><?php echo($contact[$i]['id']);?></td>
	<td><?php echo($contact[$i]['name']);?></td>
	<td><?php echo($contact[$i]['email']);?></td>
	<td><?php echo($contact[$i]['phone']);?></td>
	<td><?php echo($contact[$i]['comments']);?></td>
	</tr>
<?php 
$i = $i +1;
}?></table>
</div>
</div>
<?php 
?>