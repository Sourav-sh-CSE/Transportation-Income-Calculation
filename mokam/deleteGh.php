<!DOCTYPE HTML>
<html>
<head>
	<title>Mokam</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
</head>

<div class="w3-display-middle">
<?php
include 'dbh.php';
$del = $_GET['del_id'];
$party = $_GET['party'];
$mal=$_GET['mal'];

$qry = "DELETE FROM mal WHERE id ='$del'";
$result = $conn->query($qry);
echo "<h1>".$party." ".$mal." has been successfully Deleted<h1>";
?>


<a class="w3-button w3-block w3-section w3-green w3-ripple w3-padding" href="mal.php">Okay</a>
</div>