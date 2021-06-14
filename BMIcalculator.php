<!DOCTYPE html>

<head>
    <title>BMI Calculator</title>

    <link rel="stylesheet" href="cover.css">


</head>
<body>

    <div id="container">
        <div id="calculator">
            <h2>BMI Calculator</h2>
            <input type="text" name="bmi" id="weight" placeholder="Weight In KG">
            <input type="text" name="bmi" id="height" placeholder="Height In CM">
            <input type="submit" value="Calculate" id="calculate">
            <div id="result">Your BMI Is : <span>00</span></div>
        </div>
        <div id="scale">
            <h2>Scale</h2>
            <ul>
                <li>Under Weight - Less Than 18.5 </li>
                <li>Normal Weight - 18.5 To 24.9 </li>
                <li>Over Weight - 25 To 29.9 </li>
                <li>Obesity - 30 + </li>
                <a  href = "searchmeal.php">
                <input type="submit" value="Continue" id="calculate" onclick="makevisible()">
                </a>
            </ul>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>
