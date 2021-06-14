<?php

$servername = "studmysql01.fhict.local";

$username = "dbi433124";

$password = "Sto400sto!";

$dbname = "dbi433124";


// Create connection

$conn = new mysqli($servername, $username, $password,$dbname );



// Check connection

if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}

//echo "Connected successfully";









$url = "http:/";

$url.= $_SERVER['REQUEST_URI'];



if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

    $ip = $_SERVER['HTTP_CLIENT_IP'];

} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

} else {

    $ip = $_SERVER['REMOTE_ADDR'];

}



$sql = "INSERT INTO stats (clientip, countip, visitedpage, vdate, vtime)

VALUES ('$ip',1,'$url', now(),now())";





if ($conn->query($sql) === TRUE) {

  //echo "New record created successfully";

} else {

//  echo "Error: " . $sql . "<br>" . $conn->error;

}



$conn->close();

?>





<!DOCTYPE html>

  <link rel="stylesheet" href="cover.css">

	<head>

		<title>CookIt</title>

	</head>

	<body>



		<div>

		<form action="BMIcalculator.php">

		<input id="logo" type="image" src="assets/LOGO WHITE.png"/>



		</form>

	</div>

	</body>

</html>

