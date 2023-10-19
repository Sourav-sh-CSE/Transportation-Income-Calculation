<!DOCTYPE HTML>
<html>
<head>
	<title>Mokam</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<?php
include 'dbh.php';
if (isset($_GET['labor']))
	$labor=1600;
else
	$labor=0;
if (isset($_GET['somiti']))
	$somiti=500;
else
	$somiti=0;
if (isset($_GET['baba']))
	$baba=2500;
else
	$baba=0;
if (isset($_GET['rasta']))
	$rasta=100;
else
	$rasta=0;
$t_truck=$_GET['t_truck'];
$field=$_GET['field']*50;
$bandhani=$t_truck*150;
$squad=$t_truck*1800;
$h_fair=$_GET['h_fair'];
$other=$_GET['other'];

$sql="SELECT SUM(motiG) as motig
FROM truck";
$sql1="SELECT SUM(iGet) as income
FROM truck";
$sql2="SELECT SUM(mal) as tmal
FROM truck";

$sql3="SELECT SUM(rent) as tfair
FROM truck";

$sql4="SELECT SUM(totaltk) as t_tk
FROM truck";

$sql5="SELECT SUM(avgMotiTk) as avg700
FROM truck";

$sql6="SELECT SUM(t_inc) as tr_inc
FROM truck";

$sql7="SELECT SUM(adv) as tadv
FROM truck";

$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql5);
$result6 = $conn->query($sql6);
$result7 = $conn->query($sql7);

if ($result) 
if($row = $result->fetch_assoc())
$motig=$row['motig'];

if ($result1) 
if($row1 = $result1->fetch_assoc())
$income=$row1['income'];

if ($result2) 
if($row2 = $result2->fetch_assoc())
$tmal=$row2['tmal'];


if ($result3) 
if($row3 = $result3->fetch_assoc())
$tfair=$row3['tfair'];

if ($result4) 
if($row4 = $result4->fetch_assoc())
$t_tk=$row4['t_tk'];

if ($result5) 
if($row5 = $result5->fetch_assoc())
$avg700=$row5['avg700'];

if ($result7) 
if($row7 = $result7->fetch_assoc())
$tadv=$row7['tadv'];

if ($result6) 
if($row6 = $result6->fetch_assoc())
$tr_inc=$row6['tr_inc'];
$finc=$tr_inc+$income+2500+$h_fair;


$other_cost=$labor+$somiti+$rasta+$baba+$bandhani+$squad+200+$field+$other;

$motigf=$motig-$other_cost;

?>
<body>

<div class="w3-container w3-red w3-center">
  <h1 >Final Result</h1>
</div>
 
<div class="w3-container">

  <table class="w3-table w3-striped">
    <tr>
      <th>Thing</th>
      <th>Result</th>
    </tr>
    <tr>
      <td>Total Truck</td>
      <td><?php echo $_GET['t_truck']; ?></td>
    </tr>
    <tr>
      <td>Total Truck Fair</td>
      <td><?php echo $tfair; ?></td>  
    </tr>
    <tr>
      <td>Total Truck Advance</td>
      <td><?php echo $tadv; ?></td>  
    </tr>
     <tr style="background-color:#f2deae">
      <td>Total Truck fair with total Advance</td>
      <td><?php echo $tadv+$tfair; ?></td>  
    </tr>
    <tr>
      <td>Total Value of mal</td>
      <td><?php echo $t_tk."tk"; ?></td>
    </tr>
    <tr>
      <td>Total Mal</td>
      <td><?php echo $tmal; ?></td>
    </tr>
     <tr style="background-color:#f2deae">
      <td>Weekly Cost</td>
      <td><?php echo $other_cost."tk"; ?></td>
    </tr>
    <tr>
      <td>Total avg 700 Value</td>
      <td><?php echo $avg700."tk"; ?></td>
    </tr>
    <tr style="background-color:#a9e5eb">
      <td>Moti Pabe</td>
      <td><?php echo $motigf."tk"; ?></td> 
    </tr>
    <tr>
      <td>Total Income</td>
      <td><?php echo $income."tk"; ?></td> 
    </tr>
    <tr>
      <td style="background-color:#f2deae">Final Income</td>
      <td><?php echo $finc."tk"; ?></td> 
    </tr>
  </table>
</div>


<br><br><br><br><br><br><br><br><br>
<a href="index.php" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Add new Truck</a> 

<a href="other.php" class="w3-button w3-block w3-section w3-green w3-ripple w3-padding">Other Type of Results of this week</a> 

</body>
</html>