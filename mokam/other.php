<?php 
include 'dbh.php';

if(isset($_POST['locationwise']))
{
	$locid=$_POST['id'];
	$advance=$_POST['advance'];
	$other=$_POST['other'];
	$locationwise=0;
	$locationwise2=0;

	

	if ($locid==5) {
		$sql3="SELECT SUM(price*mal) as total,location.name as lname
	FROM chalan
	Join `party` ON  chalan.party_id=party.id
	Join `location` ON party.location=location.id
	WHERE location=14";
	$result3 = $conn->query($sql3);
	if($row3 = $result3->fetch_assoc())
		$locationwise2=$row3['total'];
	}
	else if ($locid==7) {
		$sql4="SELECT SUM(price*mal) as total,location.name as lname
	FROM chalan
	Join `party` ON  chalan.party_id=party.id
	Join `location` ON party.location=location.id
	WHERE location=15";
	$result4 = $conn->query($sql4);
	if($row4 = $result4->fetch_assoc())
		$locationwise2=$row4['total'];
	}

if ($locid==0) {
		$sql5="SELECT SUM(price*mal) as total
	FROM chalan
	Join `party` ON  chalan.party_id=party.id
	Join `location` ON party.location=location.id
	WHERE location!=5 and location!=6 and location!=8 and location!=14 AND location!=15 and location!=18";
	$result5 = $conn->query($sql5);
	if($row5 = $result5->fetch_assoc())
		$locationwise=$row5['total'];
		$locname="Robu";
}
else{
	$sql2="SELECT SUM(price*mal) as total,location.name as lname
	FROM chalan
	Join `party` ON  chalan.party_id=party.id
	Join `location` ON party.location=location.id
	WHERE location='$locid'";
	$result2 = $conn->query($sql2);
	if($row2 = $result2->fetch_assoc())
		$locationwise=$locationwise2+$row2['total'];
		$locname=$row2['lname'];

	}

	if ($advance!=null) 
		$locationwise=$locationwise-$advance;
	if($other!=null)
		$locationwise=$locationwise-$other;
	


}
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
<form action="other.php" method="POST">
	
<select id="select-state" placeholder="Type a location" name="id" required>
	<option value="">Location</option>
	<option value="0">Robu</option>
	<option value="6">Malek(Putia)</option>
	<option value="5">Biplob(Rajshahi)</option>
<?php
$sql="SELECT * FROM location";
$result = $conn->query($sql);

if ($result) 
 while ($row = $result->fetch_assoc())
                {
?>
	<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
  <?php } ?>
</select>
<input class="w3-input w3-border" name="advance" placeholder="Total Truck fair with advance in that location">
<input class="w3-input w3-border" name="other" placeholder="Other Cost">

<button name="locationwise" class="w3-button w3-block w3-section w3-green w3-ripple w3-padding" >Show Result</button> 
</form>

<?php
if(isset($_POST['locationwise']))
	echo "<h3 class='w3-center'>".$locname." ".$locationwise."tk </h3>";


?>

<br><br><br><br>
<a href="index.php" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Add new Truck</a> 
	
	</body>
</html>