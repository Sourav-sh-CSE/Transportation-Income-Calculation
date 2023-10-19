
<!DOCTYPE HTML>
<html>
<head>
	<title>Mokam</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
</head>
<body>
	<div class="w3-container w3-red w3-center">
  <h2 >Per Truck Calculation</h2>
</div>
 

<?php 
include 'dbh.php';

	$tnum= $_GET['tnum'];
	$tfair= $_GET['tfair'];
	$t_inc= $_GET['t_inc'];
	$mobile=$_GET['mobile'];
	$adv=$_GET['adv'];

		// echo "Truck number: ".$tnum."<br>Truck fair: ".$tfair."tk<br>";

	$sql="SELECT party.name,chalan.mal,party.location,location.price,chalan.truck_num
	FROM `chalan`
	Join `party` ON  chalan.party_id=party.id
	Join `location` ON party.location=location.id 
	 
	ORDER BY location";

		// $sql ="select * from location";
	// WHERE truck_num LIKE $tnum

$result = $conn->query($sql);

if ($result) 
{

$sum=0;
 while ($row = $result->fetch_assoc())
  {
  	
  	if ($tnum ==$row['truck_num']) 
$sum=$sum+$row['mal']*$row['price'];


}

// echo "Total Value= ".$sum."tk<br>";
}

$sql2="SELECT SUM(mal) as total
FROM chalan WHERE truck_num='$tnum'";

$result2 = $conn->query($sql2);

if ($result2) 
if($row2 = $result2->fetch_assoc())
$tmal=$row2['total'];


	// echo "Total mal= ".$tmal."<br>";
$a7v=$tmal*700;
// echo "avg700 value= ".$a7v."tk<br>";
$motig=$a7v-$tfair;
// echo "Moti pabe= ".$motig."tk<br>";
$income=$sum-$a7v;
// echo "Income= ".$income."tk<br>";


 $sql3="SELECT * FROM truck where t_num='$tnum'";

$result3 = $conn->query($sql3);

 if($row3 = $result3->fetch_assoc())
	$sql4="UPDATE truck SET t_num = '$tnum', mobile = '$mobile', rent = '$tfair', mal = '$tmal',adv = '$adv', totalTk = '$sum', avgMotiTk = '$a7v', motiG = '$motig',  t_inc = '$t_inc',iGet = '$income' where t_num='$tnum'";
else
$sql4 = "INSERT INTO `truck` (`t_num`, `mobile`, `rent`, `mal`,`adv`, `totalTk`, `avgMotiTk`, `motiG`,`t_inc`, `iGet`) VALUES ('$tnum','$mobile','$tfair','$tmal','$adv','$sum','$a7v','$motig','$t_inc','$income')";
 	$result4=mysqli_query($conn,$sql4);
 

$sql5="SELECT COUNT(*) as cnt
FROM truck";
$result5 = $conn->query($sql5);

if ($result5) 
if($row5 = $result5->fetch_assoc())
$cnt=$row5['cnt'];

	$actual=$sum-$adv-$tfair;

?>

<div class="w3-container">

  <table class="w3-table w3-striped">
    <tr>
      <th>Thing</th>
      <th>Result</th>
    </tr>
    <tr>
      <td>Truck Number</td>
      <td><?php echo $tnum; ?></td>
    </tr>
    <tr>
      <td>Truck Fair</td>
      <td><?php echo $tfair; ?></td>  
    </tr>
     <tr>
      <td>Truck Advance</td>
      <td><?php echo $adv; ?></td>
    </tr>
    <tr style="background-color:#f2deae">
      <td>Truck fair with advance</td>
      <td><?php echo $adv+$tfair; ?></td>
    </tr>
    <tr>
      <td>Total Value of mal</td>
      <td><?php echo $sum."tk"; ?></td>
    </tr>
    <tr>
      <td>Without Advance & Truck fair</td>
      <td><?php echo $actual."tk"; ?></td>
    </tr>
    <tr style="background-color:#f2deae">
      <td>Total Mal</td>
      <td><?php echo $tmal; ?></td>
    </tr>
    <tr>
      <td>Total avg 700 Value</td>
      <td><?php echo $a7v."tk"; ?></td>
    </tr>
    <tr>
      <td>Moti Pabe (without calculating weekly cost)</td>
      <td><?php echo $motig."tk"; ?></td> 
    </tr>
    <tr>
      <td>Truck income</td>
      <td><?php echo $t_inc."tk"; ?></td> 
    </tr>
    <tr>
      <td>Income</td>
      <td><?php echo $income."tk"; ?></td> 
    </tr>
  </table>
</div>

<br><br><br><br>
<a href="index.php" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Add new Truck</a> 


<br><br><br><br>


	<form class="w3-container w3-card-4" action="final_Result.php" method="GET" >
	<p><input class="w3-check" name="labor" type="checkbox" checked>
  <label>Labor Cost 1600tk </label></p>

  <p><input class="w3-check" name="somiti" type="checkbox" checked>
<label> Somiti 500tk</label></p>

<p><input class="w3-check" name="rasta" type="checkbox" checked>
<label> Rasta 100tk</label></p>

<p><input class="w3-check" name="baba" type="checkbox" checked>
<label> Swapan 2500tk</label></p>

<p><label> Total Truck</label>
  <input type="number" value="<?php echo $cnt; ?>" name="t_truck">
<label> (Bandhani 150tk + Squad 1800tk = 1950tk/truck )</label></p>

<p><label>Total truck</label>
  <input name="field" value=0 type="number">
<label>field 50tk</label></p>

<p><label>Others Cost</label>
  <input name="other" value=0 type="number">
<label>tk</label></p>


<p><label>Total half mal Fair</label>
  <input name="h_fair" value=0 type="number">
<label>tk</label></p>

<button class="w3-button w3-block w3-section w3-green w3-ripple w3-padding">Total Week Result</button> 

</form>

	</body>
	</html>