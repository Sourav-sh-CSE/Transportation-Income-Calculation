
<!DOCTYPE HTML>
<html>
<head>
	<title>Mokam</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
</head>
<?php 
include 'dbh.php';

 	$pid = $_POST['pid'];
	$mal = $_POST['mal'];
	$tnum= $_POST['tnum'];
	$mobile=$_POST['mobile'];
	$tfair= $_POST['rent'];
	$otfair= $_POST['orent'];
	$adv=$_POST['adv'];

 	 if($mal>0 && $pid!=null)
{
	$sql3="SELECT * FROM chalan where party_id='$pid' && truck_num='$tnum'";

$result3 = $conn->query($sql3);

if($row3 = $result3->fetch_assoc())
			$sql="UPDATE chalan SET mal=mal+'$mal' where party_id='$pid' && truck_num='$tnum'";

else
 	$sql = "INSERT INTO `chalan` (`party_id`, `mal`, `truck_num`) VALUES ('$pid','$mal','$tnum')";

 $result=mysqli_query($conn,$sql);
 
}
?>
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
$sql2="SELECT party.id as pid,chalan.id as cid,party.name as pname,chalan.mal,party.location,location.name as lname,location.price,chalan.truck_num
	FROM `chalan`
	Join `party` ON  chalan.party_id=party.id
	Join `location` ON party.location=location.id 
	 
	ORDER BY location.id";
	$result2 = $conn->query($sql2);
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
 	 	






 