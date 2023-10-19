<?php 
include 'dbh.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Mokam</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
<a class="w3-button w3-block w3-section w3-orange w3-ripple w3-padding" href="mal.php">mal er hisab</a>

<form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" action="chalan.php" method="GET">

<h2 class="w3-center">Input the infos of the Truck</h2>
		<div class="w3-rest">
	 <input type="text" name="number" class="w3-input w3-border" placeholder="Truck Number" required> 
	</div><br>
	<div class="w3-rest">
		<input type="number" class="w3-input w3-border" name="rent" placeholder="Truck fair" required>
</div><br>
<div class="w3-rest">
<input type="number" class="w3-input w3-border" name="adv" placeholder="Advance from this driver (leaving empty means 0)">
</div><br>
	 <div class="w3-rest">
	 <input type="number" class="w3-input w3-border" name="mobile" placeholder="Mobile Number(Optional)">
	</div><br>
	<div class="w3-rest">
	 <input type="number" class="w3-input w3-border" name="orent" placeholder="Original Truck fair (leaving empty means same as Truck fair)">
	</div><br>


	<button id="sub" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Next</button> 
	
</form>
<?php
$sql="SELECT COUNT(*) as cnt
FROM truck";
$result = $conn->query($sql);

if ($result) 
if($row = $result->fetch_assoc())
$cnt=$row['cnt'];
?>
<form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" action="final_Result.php" method="GET">

	<h4 class="w3-center">Optional checking includs (labor+somiti+swapan+rasta) costs</h4>
<div class="w3-rest">
		Total truck in field :<input type="number" class="w3-input w3-border" name="field" value="0">
</div>
<div class="w3-rest">
		Other Cost:<input type="number" class="w3-input w3-border" name="other" value=0 >
</div>
<div class="w3-rest">
		Half mal fair:<input type="number" class="w3-input w3-border" name="h_fair" value=0>
</div>

<input  name="t_truck" value="<?php echo $cnt ?>" hidden>
<input  name="labor" value=on hidden>
<input  name="somiti" value=on hidden>
<input  name="rasta" value=on hidden>
<input  name="baba" value=on hidden>

<button id="sub" class="w3-button w3-block w3-section w3-green w3-ripple w3-padding">Final result of this week</button> 
</form>

<div class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<a href="other.php" class="w3-button w3-block w3-section w3-yellow w3-ripple w3-padding">Other Type of Results of this week</a> 
</div>

<form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" action="deleteAllData.php" method="POST">
	<button name="dladt" class="w3-button w3-block w3-section w3-red w3-ripple w3-padding">Delete all previous Data and start a new week</button> 
</form>

</body>
</html>