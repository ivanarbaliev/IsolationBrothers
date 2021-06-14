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



$height=0;

$weight=0;

$bscore=0;



if (isset($_GET["height"])) {

  $height=$_GET["height"];

}

if (isset($_GET["weight"])) {

  $weight=$_GET["weight"];

}



if (isset($_GET["bscore"])) {

  $bscore=$_GET["bscore"];

}



//echo $height.' '.$weight.' '.$bscore;



$sql = "INSERT INTO bmiscore (height, weight, bscore, dTime)

VALUES ('$height',$weight,'$bscore', now())";

echo $sql;


if ($conn->query($sql) === TRUE) {

  //echo "New record created successfully";

} else {

//  echo "Error: " . $sql . "<br>" . $conn->error;

}



$conn->close();



echo "OK";

?>

