const container = document.querySelector("#container")

const scale = document.querySelector("#scale")

const height = document.querySelector("#height");

const weight = document.querySelector("#weight");

const calculate = document.querySelector("#calculate");

const yourBMI = document.querySelector("#result");



if (calculate){

    calculate.addEventListener("click" , ()=>{



        makevisible();

        if(height.value != "" && weight.value != ""){



            let bmiValue = weight.value / (height.value * height.value) * 10000;

            result.innerHTML = `Your BMI Is : <span> ${bmiValue.toFixed(2)} </span>`

            //remove all cookies if any from before

            document.cookie.split(';').forEach(function(c) {

                document.cookie = c.trim().split('=')[0] + '=;' + 'expires=Thu, 01 Jan 1970 00:00:00 UTC;';

            });

            //set BMI Value to cookie

            document.cookie = bmiValue.toFixed(2);


//set BMI Value to database

fetch(`http://i433124.hera.fhict.nl/bmisavedata.php?height=`+height.value+'&weight='+weight.value+ '&bscore='+ yourBMI.children[0].textContent.trim())

    .then(data => {

        console.log(data);

    });




        }

        else

            {



                result.innerHTML = `Please Enter Correct Value`;

            }



    });

}

function makevisible(){     // makes the "scale" appear in the BMI

  

   document.getElementById('container').setAttribute("style","width:700px");

    document.getElementById('scale').setAttribute("style","visibility:visible") ;





}







function getMealList(){       // for every meal we got back from the api , make squares with the results

    let searchInputTxt = document.getElementById('search-input').value.trim();

    fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${searchInputTxt}`)

    .then(response => response.json())

    .then(data => {

        let html = "";

        if(data.meals){

            data.meals.forEach(meal => {

                html += `

                    <div class = "meal-item" data-id = "${meal.idMeal}">

                        <div class = "meal-img">

                            <img src = "${meal.strMealThumb}" alt = "food">

                        </div>

                        <div class = "meal-name">

                            <h3>${meal.strMeal}</h3>

                            <a href = "#" class = "recipe-btn">Get Recipe</a>

                        </div>

                    </div>

                `;

            });

            mealList.classList.remove('notFound');

        } else{

            html = "Sorry, we didn't find any meal!";

            mealList.classList.add('notFound');

        }



        mealList.innerHTML = html;

    });

}





// gets the recipe for a meal after "get recipe" is clicked

function getMealRecipe(e){

    e.preventDefault();

    if(e.target.classList.contains('recipe-btn')){

        let mealItem = e.target.parentElement.parentElement;

        fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${mealItem.dataset.id}`)

        .then(response => response.json())

        .then(data => mealRecipeModal(data.meals));

    }

}



// creates a modal that displays the recipe on top of existing  html

function mealRecipeModal(meal){

    console.log(meal);

    meal = meal[0];

    let html = `

        <h2 class = "recipe-title">${meal.strMeal}</h2>

        <p class = "recipe-category">${meal.strCategory}</p>

        <div class = "recipe-instruct">

            <h3>Instructions:</h3>

            <p>${meal.strInstructions}</p>

        </div>

        <div class = "recipe-meal-img">

            <img src = "${meal.strMealThumb}" alt = "">

        </div>

        <div class = "recipe-link">

            <a href = "${meal.strYoutube}" target = "_blank">Watch Video</a>

        </div>

    `;

    mealDetailsContent.innerHTML = html;

    mealDetailsContent.parentElement.classList.add('showRecipe');

}





// this function asks the api for one specific random recipe/meal

function getRandomRecipe(){

	fetch(`https://www.themealdb.com/api/json/v1/1/random.php`)

	.then(response => response.json())

	.then(data => {

        let html = "";

        if(data.meals){

            data.meals.forEach(meal => {

                html += `

                    <div class = "meal-item" data-id = "${meal.idMeal}">

					<h2 class = "recipe-title">${meal.strMeal}</h2>

                        <div class = "meal-img">

                            <img src = "${meal.strMealThumb}" alt = "food">

                        </div>



						<p class = "recipe-category">${meal.strCategory}</p>

						<div class = "recipe-instruct">

							<h3>Instructions:</h3>

							<p>${meal.strInstructions}</p>

						</div>

						<div class = "recipe-meal-img">

							<img src = "${meal.strMealThumb}" alt = "">

						</div>

						<div class = "recipe-link">

							<a href = "${meal.strYoutube}" target = "_blank">Watch Video</a>

						</div>



                    </div>

                `;

            });

			recipeContainer.innerHTML = html;

		}

	});

}




