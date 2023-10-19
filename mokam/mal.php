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
	
	
<form id="myForm" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin"  action="addingGh.php" method="POST">
	
	<h2 class="w3-center" >Mal er hisab</h2>
	
 
<select id="select-state" placeholder="Party name/location" name="pid" required>
<option value="">Party Name</option>
	<?php

	
	$sql="SELECT * FROM party";

	$result = $conn->query($sql);
	
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

 							<?php
 							if(isset($_POST['order']))
						   	$orderBy=$_POST['orderBy'];
						   else
						   	$orderBy="location.id";
						   ?>

<form id="myForm" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin"  action="mal.php" method="POST">

Order By: <select class="browser-default custom-select" name="orderBy">
						  	<option disabled selected value> -- <?php echo $orderBy; ?> -- </option>
						  	<option value="ghor.id">Ghor</option>
						    <option value="location.id">Location</option>
						   </select>
						   <button name="order" class="w3-button w3-block w3-section w3-green w3-ripple w3-padding" >go</button> 

						   </form>


						   <?php

$sql2="SELECT mal.id as mid, party.id as pid,party.name as pname,mal.total_mal,party.location,location.name as lname,ghor.name as gname
	FROM `mal`
	Join `party` ON  mal.party_id=party.id
	Join `location` ON party.location=location.id 
	Join `ghor` ON party.ghor_id=ghor.id  
	ORDER BY $orderBy";

$result2 = $conn->query($sql2);

						   ?>

<span id="res">
<div class="w3-container">
	<div class="w3-container w3-red w3-center">
  <h1 >Mal</h1>
</div>
 
  <table class="w3-table w3-striped">
    <tr>
      <th>Party Name</th>
      <th>Mal</th>
      <th>Location</th>
      <th>Ghor name</th>
      <th>Delete</th>
    </tr>
<?php 
if($result2)
while ($row2 = $result2->fetch_assoc())
                {
 	 	 	
 	 				$party=$row2['pname'];
?>
    <tr>
      <td><?php echo $party;?></td>
      <td><?php echo $row2['total_mal'];?></td>  
      <td><?php echo $row2['lname'];?></td> 
      <td><?php echo $row2['gname'];?></td> 	

<td>
<form action="deleteGH.php" method="GET">
	<?php $delid=$row2['mid'];
			$mal=$row2['total_mal'];
	 ?>
	<input name="del_id" value="<?php echo $delid ?>" hidden>
	<input name="party" value="<?php echo $party ?>" hidden>
	<input name="mal" value="<?php echo $mal ?>" hidden>


	<button class="w3-button w3-xlarge w3-circle w3-red w3-card-4">X</button>
</form>
</td>
</tr>
<?php

 	 	}?> 
 	 	  </table>
 	 	  </div>
 </span>
<br><br><br>

<div class="w3-container">
<form action="mal.php" method="POST">
<?php
if(isset($_POST['lbg'])){
	$ghorname=$_POST['ghorname'];
	$sql4="SELECT  location.name as lname,SUM(total_mal) as ltmal,ghor.name
	FROM `mal`
	Join `party` ON  mal.party_id=party.id
	Join `location` ON party.location=location.id
	Join `ghor` ON party.ghor_id=ghor.id 
	Where ghor.name='$ghorname'
    GROUP BY location.id
    
	";
	$result4 = $conn->query($sql4);
?>
<div class="w3-container w3-red w3-center">
  <h3 ><?php echo $ghorname ?> arot by location based mal </h3>
</div>
<table class="w3-table w3-striped">
    <tr>
      <th>Location</th>
      <th>Total mal</th>
    </tr>
<?php

if($result4)
while ($row4 = $result4->fetch_assoc())
{
?>

<tr> 
      <td><?php echo $row4['lname'];?></td> 
      <td><?php echo $row4['ltmal'];?></td>
       </tr>

<?php
}
?>
</table>

<?php
}

?>
<select class="browser-default custom-select" name="ghorname" required>
						  	<option disabled selected value> -- Select a Ghor -- </option>

						  	<?php

	
	$sql5="SELECT * FROM ghor";

	$result5 = $conn->query($sql5);
	
	if ($result5) 
 while ($row5 = $result5->fetch_assoc())
                {
                   
	?>
  <option value="<?php echo $row5['name'] ?>"><?php echo $row5['name'] ?></option>
  <?php } ?>
						    
						   </select>

<button name="lbg" class="w3-button w3-block w3-section w3-yellow w3-ripple w3-padding">Location based by ghor</button>
</form>

</div>

<br><br><br><br><br><br><br><br><br>

<div class="w3-container">
<form action="mal.php" method="POST">
<?php
if(isset($_POST['lb'])){
	$sql3="SELECT  location.name as lname,SUM(total_mal) as ltmal
	FROM `mal`
	Join `party` ON  mal.party_id=party.id
	Join `location` ON party.location=location.id
    GROUP BY location.id
	";
	$result3 = $conn->query($sql3);
?>
<div class="w3-container w3-red w3-center">
  <h3 >location based mal</h3>
</div>
<table class="w3-table w3-striped">
    <tr>
      <th>Location</th>
      <th>Total mal</th>
    </tr>
<?php

if($result3)
while ($row3 = $result3->fetch_assoc())
{
?>

<tr> 
      <td><?php echo $row3['lname'];?></td> 
      <td><?php echo $row3['ltmal'];?></td>
       </tr>

<?php
}
?>
</table>

<?php
}

?>

<button name="lb" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Location based in total</button>
</form>

</div>

<a class="w3-button w3-block w3-section w3-green w3-ripple w3-padding" href="index.php">back to the home page</a>

<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script> -->
<script src="my_script.js" type="text/javascript"></script>
<!-- <script src="delete.js" type="text/javascript"></script> -->
</body>
</html>
