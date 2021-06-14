<!DOCTYPE html>

<head>

   <meta charset="utf-8">

   <script src="app.js"></script>

   <title>Recipes</title>

   <link rel="stylesheet" href="style.css">

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

 <div id="recipeContainer"></div>

  </body>

</html>



<script>





  $(document).ready(function(){

    const recipeContainer = document.getElementById('recipeContainer');

    getRandomRecipe();

        });

  </script>

