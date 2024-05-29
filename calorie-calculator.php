<?php
include './app/controllers/source_user.php';

if ($_SESSION['name'] == '') {
    header('location: /');
}
$data = selectOne('users_information_for_calculator', ['id_user' => $_SESSION['id_user']]);
$user_info = selectOne('data_registration', ['id_user' => $_SESSION['id_user']]);
if ($data['age']=='') {
    $_SESSION['errmsg']='Please first write your health information!';
    header('location: nutrition-calculator.php');

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta value="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/calorie-calculator.css">
    <title>Calory Calculator</title>
</head>
<style>
    .container.text-center {
        max-width: 100%;
        overflow: hidden;
    }
</style>

<body>

    <p class='title'>Ready to give it a shot ?<br> Let us know your diet</p>

    <form  method="post">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <a name='select-type-food' href="anything.php" class="img-container">
                        <img class="donut" src="./assets/images/calorie-calculator-image/donut.png" alt="">
                    </a>
                    <p>Anything</p>
                </div>
                <div class="col">
                    <a name='select-type-food' href="paleo.php" class="img-container">

                        <img class="paleo" src="./assets/images/calorie-calculator-image/paleo.png" alt="">
                    </a>
                    <p>Paleo</p>
                </div>
                <div class="col">
                    <a name='select-type-food' href="vegan.php" class="img-container">

                        <img class="Broccoli" src="./assets/images/calorie-calculator-image/Broccoli.png" alt="">
                    </a>
                    <p>Vegetarian</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a name='select-type-food' href="vegan.php" class="img-container">

                        <img class="Avocado" src="./assets/images/calorie-calculator-image/Avocado.png" alt="">
                    </a>
                    <p>Vegan</p>
                </div>
                <div class="col">
                    <a name='select-type-food' href="ketogenic.php" class="img-container">

                        <img class="bread" src="./assets/images/calorie-calculator-image/bread.png" alt="">
                    </a>
                    <p>Ketogenic</p>
                </div>
                <div class="col">
                    <a name='select-type-food' href="mediterranean.php" class="img-container">
                        <img class="Beet" src="./assets/images/calorie-calculator-image/Beet.png" alt="">
                    </a>
                    <p>Mediterranean</p>
                </div>
            </div>
        </div>

        <div class=" mb-3">
            <label for="basic-url" class="form-label">Write the amount of food </label>

            <p class='input-group-p'>if you don't know how many calories you need <a href="nutrition-calculator.php"> here</a></p>

            <select name='select-type' class="form-select form-select-sm" aria-label="Small select example">

                <option selected>Select a food group</option>
                <option value="Anything">Anything</option>
                <option value="Paleo">Paleo</option>
                <option value="Vegetarian Vegan">Vegetarian</option>
                <option value="Vegetarian Vegan">Vegan</option>
                <option value="Ketogenic">Ketogenic</option>
                <option value="Mediterranean">Mediterranean</option>
            </select>
            <button name='select-type-food' type="submit" class="btn btn-primary">Select</button>
            <!-- <input type="text" class="form-control" placeholder="1220  gram" aria-label="amountFood">
            <span class="input-group-text"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8944 7.00607C12.3314 6.72454 11.6686 6.72454 11.1056 7.00607L5.23607 9.94082L11.1056 12.8756C11.6686 13.1571 12.3314 13.1571 12.8944 12.8756L18.7639 9.94082L12.8944 7.00607L13.3416 6.11164L12.8944 7.00607ZM10.2111 5.21721C11.3373 4.65416 12.6627 4.65416 13.7889 5.21721L21.4472 9.04639C21.786 9.21579 22 9.56205 22 9.94082C22 10.3196 21.786 10.6659 21.4472 10.8352L13.7889 14.6644C12.6627 15.2275 11.3373 15.2275 10.2111 14.6644L2.55279 10.8352C2.214 10.6659 2 10.3196 2 9.94082C2 9.56205 2.214 9.21579 2.55279 9.04639L10.2111 5.21721ZM4.93665 13.7911C5.03047 13.54 5.02373 13.2522 4.89443 12.9936C4.64744 12.4996 4.04676 12.2994 3.55279 12.5464L2.55279 13.0464C2.214 13.2158 2 13.562 2 13.9408C2 14.3196 2.214 14.6658 2.55279 14.8352L10.6584 18.888C11.5029 19.3103 12.4971 19.3103 13.3416 18.888L21.4472 14.8352C21.786 14.6658 22 14.3196 22 13.9408C22 13.562 21.786 13.2158 21.4472 13.0464L20.4472 12.5464C19.9532 12.2994 19.3526 12.4996 19.1056 12.9936C18.9763 13.2522 18.9695 13.54 19.0634 13.7911L12.4472 17.0992C12.1657 17.2399 11.8343 17.2399 11.5528 17.0992L4.93665 13.7911Z" fill="#1F64FF" />
                </svg> <a  href="nutrition-calculator.php"> Not sure?</a></span> -->
            <!-- <input type="text" class="form-control" placeholder="Server"     aria-label="Server"> -->
        </div>



    </form>
    <?php
    include './app/include/footer.php'
    ?>
</body>

</html>