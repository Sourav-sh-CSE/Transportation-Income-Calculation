<?php 
include 'dbh.php';
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Mokam</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
   <script type="text/javascript">$(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />



</head>
<body>
	<?php
	$tnum= $_GET['number'];
	$tfair= $_GET['rent'];
	$otfair= $_GET['orent'];
	$mobile=$_GET['mobile'];
	$adv = ($_GET['adv']!=null) ? $_GET['adv'] : 0 ;
	
if($otfair!=Null)
	$t_inc=$tfair-$otfair;
else
	$t_inc=0;
	?>
	
<form id="myForm" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin"  action="adding.php" method="POST">
	<input name="party" value="<?php echo $party ?>" hidden>

	<input name="tnum" value="<?php echo $tnum ?>" hidden>
	<input name="rent" value="<?php echo $tfair ?>" hidden>
	<input name="orent" value="<?php echo $otfair ?>" hidden>
	<input name="mobile" value="<?php echo $mobile ?>" hidden>
	<input name="adv" value="<?php echo $adv ?>" hidden>

	<h2 class="w3-center" >Truck no: <?php echo $tnum; ?></h2>
	<h3 class="w3-center" >Mbl no: <?php echo $mobile; ?></h3>
 
<select id="select-state" placeholder="Party name/location" name="pid" required>
<option value="">Party Name</option>
	<?php

	
	$sql="SELECT * FROM party";

	$sql2="SELECT party.id as pid,chalan.id as cid,party.name as pname,chalan.mal,party.location,location.name as lname,location.price,chalan.truck_num
	FROM `chalan`
	Join `party` ON  chalan.party_id=party.id
	Join `location` ON party.location=location.id 
	 
	ORDER BY location.id";
	$result = $conn->query($sql);
	$result2 = $conn->query($sql2);
	if ($result) 
 while ($row = $result->fetch_assoc())
                {
                   
	?>
  <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
  <?php } ?>
 </select>
<br>
<div class="w3-rest">
	<input type="number" class="w3-input w3-border" name="mal" placeholder="Mal" required><br><br>
</div>
</div>

	<button id="sub" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" >Add</button> 
	
</form>


<span id="res">
<div class="w3-container">
	<div class="w3-container w3-red w3-center">
  <h1 >Chalan</h1>
</div>
 
  <table class="w3-table w3-striped">
    <tr>
      <th>Party Name</th>
      <th>Mal</th>
      <th>Location</th>
      <th>Delete</th>
    </tr>
<?php 
if($result2)
while ($row2 = $result2->fetch_assoc())
                {
 	 		
 	 	 
 	 	 	if($row2['truck_num']==$tnum)
 	 	 	{
 	 	 	
 	 				$party=$row2['pname'];
?>
    <tr>
      <td><?php echo $party;?></td>
      <td><?php echo $row2['mal'];?></td>  
      <td><?php echo $row2['lname'];?></td> 	

<td>
<form action="delete.php" method="GET">
	<?php $delid=$row2['cid'];
			$mal=$row2['mal'];
	 ?>
	<input name="del_id" value="<?php echo $delid ?>" hidden>
	<input name="party" value="<?php echo $party ?>" hidden>
	<input name="mal" value="<?php echo $mal ?>" hidden>

	<input name="number" value="<?php echo $tnum ?>" hidden>
	<input name="rent" value="<?php echo $tfair ?>" hidden>
	<input name="orent" value="<?php echo $otfair ?>" hidden>
	<input name="mobile" value="<?php echo $mobile ?>" hidden>
	<input name="adv" value="<?php echo $adv ?>" hidden>

	<button class="w3-button w3-xlarge w3-circle w3-red w3-card-4">X</button>
</form>
</td>
</tr>
<?php

 	 	}}?> 
 	 	  </table>
 	 	  </div>
 </span>
<br><br><br><br><br><br><br><br><br>
<form action="calculation.php" method="GET">

	<input name="tnum" value="<?php echo $tnum ?>" hidden>
	<input name="tfair" value="<?php echo $tfair ?>" hidden>
	<input name="t_inc" value="<?php echo $t_inc ?>" hidden>
	<input name="mobile" value="<?php echo $mobile ?>" hidden>
	<input name="adv" value="<?php echo $adv ?>" hidden>

	<button class="w3-button w3-block w3-section w3-green w3-ripple w3-padding">Calculate for this Truck</button> 
</form>

<br><br><br><br>
<a href="index.php" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Add new Truck</a> 


<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script> -->
<script src="my_script.js" type="text/javascript"></script>
<!-- <script src="delete.js" type="text/javascript"></script> -->
</body>
</html>