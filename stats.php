<!DOCTYPE html>

<head>

   <meta charset="utf-8">

   <title>Recipes</title>

   <link rel="stylesheet" href="style.css">

   <script src="app.js"></script>

   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

  <nav>

    <ul>

      <li class="logo">CookIt</li>
      
      <li class="items bmiItem">Your BMI is <p id="personalBMI">--</p></li>

      <li class="items"><a href="homepage/homepage.html">Home</a></li>

      <li class="items"><a href="searchmeal.php">Recipes</a></li>

      <li class="items"><a href="stats.php">Stats</a></li>

      <li class="items"><a href="weekly meal planner/planner.html">Planner</a></li>

      <li class="items"><a href="randomRecipe.php">Random Recipe</a></li>

      <li class="btn"><a href="#"><i class="fas fa-bars"></i></a></li>

    </ul>

 </nav>

 

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



$sql = 'SELECT * FROM stats order by id desc limit 15 ';

$sqlcount = 'SELECT count(*) AS c FROM stats';


$sqlbmi = 'SELECT * FROM bmiscore  order by id desc limit 15 ';







$result = $conn->query($sql);

$result2 = $conn->query($sqlcount);

$row2 = $result2->fetch_assoc();



if ($result->num_rows > 0) {

  echo "Database statistics";

  echo "<br>";

  // output data of each row

  while($row = $result->fetch_assoc()) {

    echo "id: " . $row["id"]. " - Client IP " . $row["clientip"] . " Visited Date : " . $row["vdate"] . " Visited Time : " . $row["vtime"] . "<br>";

  }

} else {

  echo "0 results";

}

echo "Total Visited Count:  " . $row2["c"]."<p>";

$resultbmi = $conn->query($sqlbmi);


if ($resultbmi->num_rows > 0) {

  echo "Bmi Scores";

  echo "<br>";

  // output data of each row

  while($row = $resultbmi->fetch_assoc()) {

    echo "id: " . $row["id"]. " - Height: " . $row["height"] . " Weight: " . $row["weight"] . " BMI Score: " . $row["bscore"] . "<br>";

  }
}

$conn->close();

?>

