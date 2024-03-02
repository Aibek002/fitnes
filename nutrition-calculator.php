<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/nutrition-calculator.css" rel="stylesheet">
  <link href="assets/js/nutrition-calculator.js" rel="stylesheet">
  <title>Nutrition Calculator</title>
  <style>
   
  </style>
</head>
<body>
<button type="button" class="back-btn"  onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>
  <div class="calculator">
  <div class="text">
       
        <h1 class="register-logo">
          <span style="display: inline-block; vertical-align: middle; font-size: 23px; font-weight: bold;">Nutrition Calculator</span>
        </h1>
      </div>

    <div class="info">
        <p id="diet-plan"> Current diet type </p>
    </div>

    <div class="info">
        <label for="goal">I want to</label>
        <div class="goal-selector">
        <div class="goal-option-3" onclick="selectGoal(this)">Lose Weight</div>
        <div class="goal-option-3" onclick="selectGoal(this)">Maintain Weight</div>
        <div class="goal-option-3" onclick="selectGoal(this)">Gain Weight</div>
        </div>
    </div>

    <div class="info">
        <label for="goal">I am </label>
        <div class="goal-selector">
            <div class="goal-option-2" onclick="selectGender(this)">Male</div>
            <div class="goal-option-2" onclick="selectGender(this)">Female</div>
        </div>
    </div>

    <div class="info">
        <label for="height">Height</label>
        <div class="input-with-suffix">
        <input type="number" id="height" min="0" step="0.1">
        <span>cm</span>
        </div>
    </div>

    <div class="info">
        <label for="height">Weight</label>
        <div class="input-with-suffix">
        <input type="number" id="weight" min="0" step="0.1">
        <span>kg</span>
        </div>
    </div>


    <div class="info">
        <label for="height">Age</label>
        <div class="input-with-suffix">
        <input type="number" id="year" min="0" step="0.1">
        <span>years</span>
        </div>
    </div>


   
    
    <div class="info">
        <label for="goal">Body fat</label>
        <div class="goal-selector">
            <div class="goal-option-3" onclick="selectBodyFat(this)">Low</div>
            <div class="goal-option-3" onclick="selectBodyFat(this)">Medium</div>
            <div class="goal-option-3" onclick="selectBodyFat(this)">High</div>
        </div>
    </div>

    <div class="info">
        <label for="goal">Activity level</label>
        <div class="goal-selector">
            <select id="goal">
                <option value="Sedentary">Sedentary</option>
                <option value="Lightly Active">Lightly Active</option>
                <option value="Moderately Active">Moderately Active</option>
                <option value="Very Active">Very Active</option>
                <option value="Extremely Active">Extremely Active</option>
            </select>
        </div>
    </div>

    <div class="info">
        <label for="goal">Set a weight goal?</label>
        <div class="goal-selector">
            <div class="goal-option-2" onclick="selectWeightGoal(this)">No, thanks</div>
            <div class="goal-option-2" onclick="selectWeightGoal(this)">Yes, let's do it</div>
        </div>
    </div>
    
    <div class="info">
    <div id="goal-selected">
        <label for="goalWeight">Enter your goal weight</label>
        <div class="input-with-suffix">
        <input type="number" id="goalWeight" min="0" step="0.1">
        <span>kg</span>
        </div>
    </div> 
        <div id="lose"> 
        <label for="rate">Weight change rate</label>
        <p>Lose <input type="number" id="age" min="0" step="1"> kgs per week</p>
        <p style="font-size:13px; font-weight: light;"> You will reach your goal in <span id="date"></P>
     </div>
        <div id="gain">
        <label for="rate">Weight change rate</label>
        <p>Gain <input type="number" id="age" min="0" step="1"> kgs per week</p>
        <p style="font-size:13px; font-weight: light;"> You will reach your goal in <span id="date"></P>
    </div>
        
    </div>
    
    
    

    <button  type="submit" class="continue-btn"><img src="assets\images\calculate.png">Calculate</button>
  </div>
  <div id="lose">kkkkk</div>

  
  <script src="assets/js/nutrition-calculator.js"></script>
  <script src="./assets/js/goBack.js"></script>

</body>
</html>
