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

   <div class = "container">

    <div class = "meal-wrapper">

      <div class = "meal-search">

        <h2 class = "title">Type the name of the meal</h2>





        <div class = "meal-search-box">

          <input type = "text" class = "search-control" placeholder="Enter an ingredient" id = "search-input">

          <button type = "submit" class = "search-btn btn" id = "search-btn">

            <i class = "fas fa-search"></i>

          </button>

        </div>

      </div>



      <div class = "meal-result">

        <h2 class = "title">Tasty meals:</h2>

        <div id= "meal">



        </div>

      </div>





      <div class = "meal-details">

        <!-- this button closes the recipe -->

        <button type = "button" class = "btn recipe-close-btn" id = "recipe-close-btn">

          <i class = "fas fa-times"></i>

        </button>



        <!-- this button shows the meal contents -->

        <div class = "meal-details-content">



        </div>

      </div>

    </div>

  </div>

</body>

</html>



<script>



const searchBtn = document.getElementById('search-btn');

const mealList = document.getElementById('meal');

const mealDetailsContent = document.querySelector('.meal-details-content');

const recipeCloseBtn = document.getElementById('recipe-close-btn');





searchBtn.addEventListener('click', getMealList);

mealList.addEventListener('click', getMealRecipe);

recipeCloseBtn.addEventListener('click', () => {

    mealDetailsContent.parentElement.classList.remove('showRecipe');

});



$(document).ready(function(){

        $('.btn').click(function(){

          $('.items').toggleClass("show");

          $('ul li').toggleClass("hide");

        });

      });



      $("#personalBMI").text(document.cookie);

      console.log(document.cookie);





      if(document.cookie > 30) {

        $("#dialog").text("Consume less processed and sugary foods.");

      }



      else if(document.cookie > 25 && document.cookie < 29.9 ) {

        $("#dialog").text("Cutting calories. The key to weight loss is reducing how many calories you take in.");

      }

      else if(document.cookie > 18.5 && document.cookie < 24.9 ) {

        $("#dialog").text("Eat Fiber-Rich Foods.");

      }

      else{

        $("#dialog").text("Choose nutrient-rich foods.");

      }







      $(".bmiItem").click(function(){

        $("#dialog").show();



      });

      $("#dialog").click(function(){

        $(this).hide();

      });



</script>

