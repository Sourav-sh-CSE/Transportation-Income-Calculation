
<!DOCTYPE HTML>
<html>
<head>
	<title>Mokam</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<?php
include 'dbh.php';

if (isset($_POST['dladt'])) {
$sql = "DELETE FROM chalan";
$sql2="DELETE FROM truck" ;
$sql3="DELETE FROM mal" ;
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
	}


// $tnum="asd556";

// $sql="SELECT * FROM truck where t_num='$tnum'";

// $result = $conn->query($sql);

//  if($row = $result->fetch_assoc())
//  	echo "True";
//  else
//  echo "false";
                

?>
<body>
	

<div class="w3-display-middle">

	<h1>All Data has been successfully deleted</h1>
<a href="index.php" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Lets start a new Week</a> 
</div>
</body>
</html>