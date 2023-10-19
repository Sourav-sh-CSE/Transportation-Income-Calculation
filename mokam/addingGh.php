
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
	

 	 if($mal>0 && $pid!=null)
{
	$sql3="SELECT * FROM mal where party_id='$pid'";

$result3 = $conn->query($sql3);

if($row3 = $result3->fetch_assoc())
			$sql="UPDATE mal SET total_mal=total_mal+'$mal' where party_id='$pid'";

else
 	$sql = "INSERT INTO `mal` (`party_id`, `total_mal`) VALUES ('$pid','$mal')";

 $result=mysqli_query($conn,$sql);
 
}
?>
<div class="w3-container">
 
<div class="w3-container w3-red w3-center">
  <h1 >Mal</h1>
</div>
 
  <table class="w3-table w3-striped">
    <tr>
      <th>Party Name</th>
      <th>Mal</th>
      <th>Location</th>
      <th>Ghor Name</th>
      <th>Delete</th>
    </tr>
<?php 

// $orderBy

$sql2="SELECT mal.id as mid, party.id as pid,party.name as pname,mal.total_mal,party.location,location.name as lname,ghor.name as gname
	FROM `mal`
	Join `party` ON  mal.party_id=party.id
	Join `location` ON party.location=location.id 
	Join `ghor` ON party.ghor_id=ghor.id  
	ORDER BY ghor.id";

	$result2 = $conn->query($sql2);
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
<form action="delete.php" method="GET">
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
 	 	






 