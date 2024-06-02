<?php
session_start();
require 'app/controllers/source_user.php';



if ($_SESSION['name'] == '') {
    header('location: login.php');
}

$data = selectOne('users_information_for_calculator', ['id_user' => $_SESSION['id_user']]);
$user_info = selectOne('data_registration', ['id_user' => $_SESSION['id_user']]);


if (trim($_SESSION['email']) == 'admin@gmail.com') {
    header('location: admin_profile.php');
} else {
    if ($data['age'] == '') {
        $_SESSION['errmsg'] = 'Please first write your health information!';
        header('location: nutrition-calculator.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Profile</title>
</head>

<body>


    <?php if (isset($_SESSION['name'])) : ?>
        <div class="first-flex">
            <div class="flex-first-item">
                <a href="" class="back">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 15L11 7M3 15L11 23M3 15H28" stroke="white" stroke-width="2" />
                    </svg>
                </a>
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 15C24 15.5523 24.4477 16 25 16C25.5523 16 26 15.5523 26 15C26 14.4477 25.5523 14 25 14C24.4477 14 24 14.4477 24 15Z" stroke="white" stroke-width="2" />
                    <path d="M14 15C14 15.5523 14.4477 16 15 16C15.5523 16 16 15.5523 16 15C16 14.4477 15.5523 14 15 14C14.4477 14 14 14.4477 14 15Z" stroke="white" stroke-width="2" />
                    <path d="M4 15C4 15.5523 4.44771 16 5 16C5.55228 16 6 15.5523 6 15C6 14.4477 5.55228 14 5 14C4.44771 14 4 14.4477 4 15Z" stroke="white" stroke-width="2" />
                </svg>
            </div>


            <div class="flex-second-item">
                <img class='spot' src="./assets/images/profileImage/bgSpot.png" alt="">
                <div class="logo_user">
                    <img src="./assets/images/profileImage/logo_user.png" alt="logo_user">
                </div>
                <div class="name">
                    <p><?php echo $_SESSION['name']; ?></p>
                </div>
                <div class="location">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99922 6.79622C6.88242 6.79622 7.59922 6.07987 7.59922 5.19724C7.59922 4.31462 6.88242 3.59829 5.99922 3.59829C5.11602 3.59829 4.39922 4.31462 4.39922 5.19724C4.39922 6.07987 5.11602 6.79622 5.99922 6.79622Z" stroke="white" stroke-width="0.8" stroke-linecap="square" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7992 5.19724C10.7992 9.19463 6.79922 11.5931 5.99922 11.5931C5.19922 11.5931 1.19922 9.19463 1.19922 5.19724C1.19922 2.54857 3.34882 0.400391 5.99922 0.400391C8.64962 0.400391 10.7992 2.54857 10.7992 5.19724Z" stroke="white" stroke-width="0.8" stroke-linecap="square" />
                    </svg>
                    <p>Kazakhstan Repablic</p>
                </div>
            </div>
            <div class="flex-healty-information">
                <div class="first-item">
                    <img src="./assets/images/profileImage/height_logo.png" alt="">
                    <p>
                        <?php
                        echo $_SESSION['height'] . " cm";

                        ?><br>
                        <strong>Height</strong>
                    </p>
                </div>
                <div class="first-item">
                    <img src="./assets/images/profileImage/weight_logo.png" alt="">
                    <p>
                        <?php
                        echo $_SESSION['weight'] . " kg";

                        ?><br>
                        <strong>Weight</strong>
                    </p>
                </div>
                <div class="first-item">
                    <img src="./assets/images/profileImage/year_logo.png" alt="">
                    <p>
                        <?php
                        echo $_SESSION['age'] . " Year";

                        ?><br>
                        <strong>Age</strong>
                    </p>
                </div>



            </div>
            <div class="flex-third-item">

                <div class="protein">
                    <div class="first-element"><img src="./assets/images/profileImage/fish.png" alt=""></div>
                    <div class="second-element">
                        <p>Protein</p>
                        <hr class="hr-third-flex">
                        <strong>94 g</strong>
                    </div>
                </div>
                <div class="protein">
                    <div class="first-element"><img src="./assets/images/profileImage/wheat.png" alt=""></div>
                    <div class="second-element">
                        <p>Metabolic</p>
                        <hr class="hr-third-flex">
                        <strong>94 </strong>
                    </div>
                </div>
                <div class="protein">
                    <div class="first-element"><img src="./assets/images/profileImage/toasterBread.png" alt=""></div>
                    <div class="second-element">
                        <p>Carbs</p>
                        <hr class="hr-third-flex">
                        <strong>94 g</strong>
                    </div>
                </div>
                <div class="protein">
                    <div class="first-element"><img src="./assets/images/profileImage/cheese.png" alt=""></div>
                    <div class="second-element">
                        <p>Fat</p>
                        <hr class="hr-third-flex">
                        <strong>94 g</strong>
                    </div>
                </div>
            </div>
            <div class="flex-four-item">
                <p>Body Fat <br> <strong>Medium</strong></p>
                <p>Level <br> <strong>Moderately Active</strong></p>
            </div>
            <div class="flex-five-item">
                <a href="http://">
                <div class="svg"> 

                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M2.51514 7.68825C1.57539 5.46748 2.67366 2.92917 5.7539 2.17809C7.37416 1.78233 9.16257 2.01567 10.5096 2.78267C11.7839 2.03689 13.638 1.78498 15.2565 2.17809C18.3367 2.92917 19.442 5.46748 18.5031 7.68825C17.0405 11.2083 10.5096 13.9197 10.5096 13.9197C10.5096 13.9197 4.02679 11.2494 2.51514 7.68825Z" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
  <path opacity="0.4" d="M14.0137 4.44141C14.9508 4.67078 15.6129 5.30386 15.6926 6.04699" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
</svg>
                </div>
                    <span>Health Information</span>
                    <strong>
                        <svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.85647 10.7777C2.15088 10.7777 2.38768 10.6873 2.59249 10.5066L7.41179 6.35989C7.68699 6.11697 7.8086 5.87969 7.815 5.58027C7.815 5.2865 7.68699 5.03793 7.41179 4.80065L2.59889 0.648335C2.38768 0.473203 2.14448 0.382812 1.85647 0.382812C1.26766 0.382812 0.78125 0.800869 0.78125 1.32062C0.78125 1.58049 0.909253 1.81776 1.12686 2.01549L5.30614 5.58592L1.12686 9.14505C0.902853 9.34278 0.78125 9.58006 0.78125 9.83993C0.78125 10.354 1.26766 10.7777 1.85647 10.7777Z" fill="#ABABAB" />
                        </svg></strong>
                </a>
                <a href="http://">
                <div class="svg"> 

                    <svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.71805 14.2064C12.1751 14.2064 14.237 13.6035 14.4361 11.1838C14.4361 8.76566 12.9986 8.92116 12.9986 5.95426C12.9986 3.63678 10.9152 1 7.71805 1C4.52087 1 2.43754 3.63678 2.43754 5.95426C2.43754 8.92116 1 8.76566 1 11.1838C1.19992 13.6127 3.26183 14.2064 7.71805 14.2064Z" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                        <path opacity="0.4" d="M9.60634 16.7139C8.52818 17.9761 6.84628 17.9911 5.75781 16.7139" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                    <span>Feedback</span>

                    <strong><svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.85647 10.7777C2.15088 10.7777 2.38768 10.6873 2.59249 10.5066L7.41179 6.35989C7.68699 6.11697 7.8086 5.87969 7.815 5.58027C7.815 5.2865 7.68699 5.03793 7.41179 4.80065L2.59889 0.648335C2.38768 0.473203 2.14448 0.382812 1.85647 0.382812C1.26766 0.382812 0.78125 0.800869 0.78125 1.32062C0.78125 1.58049 0.909253 1.81776 1.12686 2.01549L5.30614 5.58592L1.12686 9.14505C0.902853 9.34278 0.78125 9.58006 0.78125 9.83993C0.78125 10.354 1.26766 10.7777 1.85647 10.7777Z" fill="#ABABAB" />
                        </svg></strong>
                </a>
                <a href="http://">
                <div class="svg"> 

                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3042 11.3818C6.97863 11.3818 4.13867 11.8155 4.13867 13.5524C4.13867 15.2894 6.96061 15.7386 10.3042 15.7386C13.6298 15.7386 16.4689 15.3042 16.4689 13.568C16.4689 11.8318 13.6478 11.3818 10.3042 11.3818Z" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                        <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M10.3036 8.90487C12.486 8.90487 14.2548 7.37845 14.2548 5.49603C14.2548 3.61361 12.486 2.08789 10.3036 2.08789C8.12124 2.08789 6.35159 3.61361 6.35159 5.49603C6.34422 7.37209 8.10158 8.89851 10.2758 8.90487H10.3036Z" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                    <span>Support Service</span>

                    <strong><svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.85647 10.7777C2.15088 10.7777 2.38768 10.6873 2.59249 10.5066L7.41179 6.35989C7.68699 6.11697 7.8086 5.87969 7.815 5.58027C7.815 5.2865 7.68699 5.03793 7.41179 4.80065L2.59889 0.648335C2.38768 0.473203 2.14448 0.382812 1.85647 0.382812C1.26766 0.382812 0.78125 0.800869 0.78125 1.32062C0.78125 1.58049 0.909253 1.81776 1.12686 2.01549L5.30614 5.58592L1.12686 9.14505C0.902853 9.34278 0.78125 9.58006 0.78125 9.83993C0.78125 10.354 1.26766 10.7777 1.85647 10.7777Z" fill="#ABABAB" />
                        </svg></strong>
                </a>
                <a href="http://">

                    <div class="svg"> 
                        <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M12.1393 4.5426V3.84285C12.1393 2.3166 10.6955 1.0791 8.91491 1.0791H4.64928C2.86953 1.0791 1.42578 2.3166 1.42578 3.84285V12.1904C1.42578 13.7166 2.86953 14.9541 4.64928 14.9541H8.92366C10.699 14.9541 12.1393 13.7204 12.1393 12.1986V11.4914" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.0828 8.0166H7.54688" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.5215 5.83008L18.0835 8.01633L15.5215 10.2033" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span>Log out</span>

                    <strong><svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.85647 10.7777C2.15088 10.7777 2.38768 10.6873 2.59249 10.5066L7.41179 6.35989C7.68699 6.11697 7.8086 5.87969 7.815 5.58027C7.815 5.2865 7.68699 5.03793 7.41179 4.80065L2.59889 0.648335C2.38768 0.473203 2.14448 0.382812 1.85647 0.382812C1.26766 0.382812 0.78125 0.800869 0.78125 1.32062C0.78125 1.58049 0.909253 1.81776 1.12686 2.01549L5.30614 5.58592L1.12686 9.14505C0.902853 9.34278 0.78125 9.58006 0.78125 9.83993C0.78125 10.354 1.26766 10.7777 1.85647 10.7777Z" fill="#ABABAB" />
                        </svg></strong>
                </a>
            </div>
            <?php include './app/include/footer.php' ?>

        </div>
    <?php else : ?>
        <?php echo $_SESSION['name'] . " ."; ?>
        <a href="login.php">login</a>
    <?php endif ?>



</body>

</html>