<?php

	$conn = mysqli_connect("localhost", "root", "", "hisab");

	if (!$conn) {

		die("connection failed: ".mysqli_connect_error());
		# code...
	}

  ?>