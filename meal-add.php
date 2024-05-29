<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Style for the form */
        .add-food-form {
            margin: 50px 0 0 5%;
            width: 90%;
            display: flex;
            flex-direction: column;
        }

        input {
            border: 1px solid #000;
            border-radius: 8px;
            width: 100%;
            height: 45px;
        }

        /* Style for the submit button */
        .submit-btn {
            background-color: #3d60f4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 50px 0 0 0;

        }

        label {
            font-family: var(--font3);
            font-weight: 600;
            font-size: 16px;
            line-height: 150%;
            color: #424242;
        }




        /* Style for the radio button group */
        .radio-group {
            margin: 20px 0 20px 0;
            display: flex;
            justify-content: space-around;
        }

        .back-btn {
            position: absolute;
            top: 70px;
            left: 30px;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            overflow: hidden;
            width: 40px;
            height: 40px;
            background-color: #1f64ff;
        }

        .back-btn img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 100%;
            max-height: 100%;
        }

        .food-lable {
            display: flex;
            justify-content: space-around;
        }

        input {
            font-family: var(--font3);
            font-weight: 400;
            font-size: 16px;
            line-height: 150%;
            color: rgba(0, 0, 0, 0.5);
            padding: 0 0 0 20px;
        }

        .back-button {
            border: 0;
            background: white;
            gap: 20px;
            display: flex;
            align-items: center;
            margin: 20px 20px;
        }

        .select {
            margin: 10px 0 0px !important;
            display: flex;
            flex-direction: column;
            gap: 7px;

        }

        .select.flex {
            display: flex;
            gap: 10px;
            flex-direction: row;
            width: 100%;

        }

        .select.flex div {
            width: 50%;
        }

        .form-select {
            height: 45px;
            font-family: var(--font3);
            font-weight: 400;
            font-size: 16px;
            line-height: 150%;
            color: rgba(0, 0, 0, 0.5);
            padding: 0 0 0 20px;
            border: 1px solid #000;
            border-radius: 8px;
            width: 100%;
            height: 45px;
        }
    </style>
</head>

<body>
    <button class="back-button" type="button" onclick="goBack()"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.252721 0.275367C0.414748 0.113778 0.634384 0.023016 0.863382 0.023016C1.09238 0.023016 1.31202 0.113778 1.47404 0.275367L7.48848 6.28098L13.5029 0.275367C13.6085 0.161784 13.7429 0.0787509 13.8918 0.0350156C14.0407 -0.00871975 14.1987 -0.011538 14.3491 0.0268579C14.4995 0.0652538 14.6367 0.143443 14.7463 0.253186C14.8559 0.362929 14.9339 0.500163 14.972 0.65043C15.0105 0.800428 15.0078 0.958014 14.9642 1.10662C14.9206 1.25522 14.8377 1.38935 14.7242 1.4949L8.7098 7.50051L14.7242 13.5061C14.838 13.6116 14.9211 13.7457 14.9649 13.8944C15.0087 14.0431 15.0116 14.2009 14.9731 14.3511C14.9347 14.5012 14.8563 14.6383 14.7464 14.7477C14.6365 14.8572 14.4991 14.935 14.3486 14.973C14.1984 15.0115 14.0406 15.0088 13.8918 14.9653C13.7429 14.9217 13.6086 14.839 13.5029 14.7257L7.48848 8.72004L1.47404 14.7257C1.31013 14.878 1.09346 14.9609 0.869569 14.9571C0.645679 14.9532 0.432006 14.8628 0.273461 14.7049C0.115331 14.5466 0.0248198 14.3333 0.0209522 14.1097C0.0170846 13.8862 0.100161 13.6698 0.252721 13.5061L6.26715 7.50051L0.252721 1.4949C0.0908956 1.33311 0 1.1138 0 0.885132C0 0.65647 0.0908956 0.437156 0.252721 0.275367Z" fill="#868686" />
        </svg>
        <span class="register-logo" style="display: inline-block; vertical-align: middle; font-size: 23px; font-weight: bold;margin-bottom:1px;">Create recipe</span>
    </button>
    <script src="./assets/js/goBack.js"></script>

    <form class="add-food-form" action="meal-add.php" method="POST">

        <div class="select">
            <label for="name"> Name</label>
            <input placeholder="Enter meal name ..." type="text" id="name" name="name" required>
        </div>
        <div class="select">
            <label for="calories">Calories</label>
            <input placeholder="kcal ..." type="number" id="calories" name="calories" required>
        </div>
        <div class="select flex">
            <div> <label for="protein">Gramm (g)</label>
                <input placeholder="gg ..." type="number" id="protein" name="protein" step="0.01">

            </div>
            <div>
                <label for="name">Type </label>
                <select name='type' class="form-select" aria-label="Default select example">
                    <option selected>Choose type </option>
                    <option value="Завтрак">Breakfast</option>
                    <option value="Обед">Lunch</option>
                    <option value="Ужин">Dinner</option>
                </select>

            </div>
        </div>
        <div class='select'>
            <label for="name">Goal </label>
            <select name="food-option" class="form-select" aria-label="Default select example">
                <option selected>Select the goal of adding food ...</option>
                <option value="Food_Lose">Food Lose</option>
                <option value="Food_Replenish">Food Replenish</option>
                <option value="Food_Set_Of_Muscles">Build Muscle</option>
            </select>
        </div>

        <!-- <div class="food-lable"> 
            
        <label for="food-lose">Food Lose</label>
            <label for="food-replenish">Food Replenish</label>

            <label for="build-muscle">Build Muscle</label>
        </div> -->


        <!-- <div class="radio-group">
            <input type="radio" name="food-option" id="food-lose" value="Food_Lose" autocomplete="off">

            <input type="radio" name="food-option" id="food-replenish" value="Food_Replenish" checked autocomplete="off">

            <input type="radio" name="food-option" id="build-muscle" value="Food_Set_Of_Muscles" autocomplete="off">

        </div> -->
        <button type="submit" class="submit-btn">Add Food</button>
    </form>
    <?php
// Include your database connection file
require_once "./app/database/connectDB.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $calories = $_POST['calories'];
    $protein = $_POST['protein'];
    $foodOption = $_POST['food-option'];
    $type = $_POST['type'];

    // Determine the table based on the selected food option
    switch ($foodOption) {
        case "Food_Lose":
            $tableName = "Food_Lose";
            break;
        case "Food_Replenish":
            $tableName = "Food_Replenish";
            break;
        case "Food_Set_Of_Muscles":
            $tableName = "Food_Set_Of_Muscles";
            break;
        default:
            // Handle invalid selection
            die("Invalid food option selected.");
    }

    // Prepare and execute the SQL INSERT query
    $sql = "INSERT INTO $tableName (name, calories, protein, type) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    
    if ($stmt->execute([$name, $calories, $protein, $type])) {
        // Redirect back to the form page or any other page
        header("Location: meal-ideas.php");
    } else {
        // Handle query execution error
        die("Error executing the SQL query");
    }
} else {
    // Redirect if the form is not submitted directly
    header("Location: meal-add.php"); // Change the redirect location as needed
}
?>


</body>

</html>