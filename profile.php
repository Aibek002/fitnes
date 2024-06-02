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
            <button type="button" class="back-btn" onclick="goBack()">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 15L11 7M3 15L11 23M3 15H28" stroke="white" stroke-width="2" />
                    </svg>
            </button>
    <script src="./assets/js/goBack.js"></script>
              
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
                        <strong><?php echo (int) $_SESSION['Protein'] . ' <span class="g"> g</span>';  ?></strong>
                    </div>
                </div>
                <div class="protein">
                    <div class="first-element"><img src="./assets/images/profileImage/wheat.png" alt=""></div>
                    <div class="second-element">
                        <p>Metabolic</p>
                        <hr class="hr-third-flex">
                        <strong><?php echo (int) $_SESSION['dayKcall'] . ' <span class="g"> g</span>'; ?> </strong>
                    </div>
                </div>
                <div class="protein">
                    <div class="first-element"><img src="./assets/images/profileImage/toasterBread.png" alt=""></div>
                    <div class="second-element">
                        <p>Carbs</p>
                        <hr class="hr-third-flex">
                        <strong><?php echo (int) $_SESSION['Carbohydrates'] .' <span class="g"> g</span>'; ?></strong>
                    </div>
                </div>
                <div class="protein">
                    <div class="first-element"><img src="./assets/images/profileImage/cheese.png" alt=""></div>
                    <div class="second-element">
                        <p>Fat</p>
                        <hr class="hr-third-flex">
                        <strong><?php echo (int) $_SESSION['Fat'];  ?></strong>
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

                <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M6.55397 16.5753C4.7394 15.77 3.279 14.4333 2.40991 12.7823C1.54081 11.1314 1.31406 9.26308 1.76646 7.48083C2.21886 5.69858 3.32386 4.10702 4.90203 2.96458C6.4802 1.82215 8.43885 1.19592 10.46 1.18758C12.4811 1.17925 14.446 1.7893 16.0356 2.91867C17.6252 4.04804 18.7462 5.63042 19.2165 7.40887C19.6869 9.18731 19.479 11.0574 18.6265 12.7154C17.7741 14.3735 16.3272 15.7222 14.5208 16.5425" stroke="#9C99E1" stroke-width="0.833333" stroke-linecap="round" stroke-linejoin="round" />
  <path d="M13.9195 15.2812L13.0488 17.0087L14.9065 17.8122" stroke="#9C99E1" stroke-width="0.833333" stroke-linecap="round" stroke-linejoin="round" />
  <path d="M10.9669 5.74958C11.5009 5.74958 11.9338 5.35793 11.9338 4.87479C11.9338 4.39166 11.5009 4 10.9669 4C10.4329 4 10 4.39166 10 4.87479C10 5.35793 10.4329 5.74958 10.9669 5.74958Z" stroke="#0601B4" stroke-width="0.833333" stroke-linecap="round" stroke-linejoin="round" />
  <path d="M8.62075 11.963L7.34368 13.3702C6.73206 14.0107 7.61494 14.5724 8.26244 14.0182L9.51325 12.5924L9.92362 11.1991L10.5838 11.796L11.0239 13.8571C11.3149 14.4307 12.2612 14.3994 12.2301 13.6616L11.5782 11.4591L10.6433 9.99455L11.167 8.22716L11.7511 8.36886C11.7429 8.42923 11.7546 8.49043 11.7847 8.54479C11.8148 8.59915 11.862 8.64426 11.9204 8.67445C12.1238 8.77261 13.5864 9.17795 13.5864 9.17795C14.5064 9.43366 14.6101 8.59568 13.8664 8.40053L12.6488 8.10484L12.0459 7.1968L11.0664 6.40276L9.56881 6.37109L7.45218 7.52732L6.666 9.42812C6.49231 9.95932 7.33406 10.0975 7.56681 9.68461C7.67968 9.50332 8.24843 8.27861 8.24843 8.27861L9.48394 7.72366L8.87975 10.2309L8.62075 11.963Z" stroke="#0601B4" stroke-width="0.833333" stroke-linecap="round" stroke-linejoin="round" />
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

                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
  <g clip-path="url(#clip0_1434_2277)">
    <path d="M5.625 1.125L5 1.6875V3.40538C5.41543 3.36449 5.83457 3.36449 6.25 3.40538V2.25H17.5V7.875H15.3663L13.75 9.32963V7.875H11.2162C11.2617 8.24889 11.2617 8.62611 11.2162 9H12.5V10.6875L13.5675 11.0858L15.8837 9H18.125L18.75 8.4375V1.6875L18.125 1.125H5.625Z" fill="#0601B4" />
    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.02125 11.7328C8.80948 11.2684 9.41009 10.5874 9.73374 9.79114C10.0574 8.99484 10.0868 8.12578 9.81755 7.31324C9.54832 6.5007 8.99484 5.78808 8.23945 5.28138C7.48406 4.77468 6.56711 4.50098 5.625 4.50098C4.68289 4.50098 3.76594 4.77468 3.01055 5.28138C2.25516 5.78808 1.70168 6.5007 1.43245 7.31324C1.16322 8.12578 1.19261 8.99484 1.51626 9.79114C1.83991 10.5874 2.44052 11.2684 3.22875 11.7328C2.2633 12.142 1.44708 12.7898 0.875373 13.6008C0.303666 14.4117 6.02882e-05 15.3523 0 16.3127L0 16.8752H1.25V16.3127C1.28837 15.2915 1.76611 14.3236 2.58239 13.6134C3.39867 12.9031 4.48963 12.5061 5.625 12.5061C6.76037 12.5061 7.85133 12.9031 8.66761 13.6134C9.48389 14.3236 9.96163 15.2915 10 16.3127V16.8752H11.25V16.3127C11.2499 15.3523 10.9463 14.4117 10.3746 13.6008C9.80292 12.7898 8.9867 12.142 8.02125 11.7328ZM5.625 11.2502C4.7962 11.2502 4.00134 10.9539 3.41529 10.4265C2.82924 9.89901 2.5 9.18364 2.5 8.43772C2.5 7.6918 2.82924 6.97643 3.41529 6.44898C4.00134 5.92154 4.7962 5.62522 5.625 5.62522C6.4538 5.62522 7.24866 5.92154 7.83471 6.44898C8.42076 6.97643 8.75 7.6918 8.75 8.43772C8.75 9.18364 8.42076 9.89901 7.83471 10.4265C7.24866 10.9539 6.4538 11.2502 5.625 11.2502Z" fill="#9C99E1" />
  </g>
  <defs>
    <clipPath id="clip0_1434_2277">
      <rect width="20" height="18" fill="white" />
    </clipPath>
  </defs>
</svg>
                </div>
                    <span>Feedback</span>

                    <strong><svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.85647 10.7777C2.15088 10.7777 2.38768 10.6873 2.59249 10.5066L7.41179 6.35989C7.68699 6.11697 7.8086 5.87969 7.815 5.58027C7.815 5.2865 7.68699 5.03793 7.41179 4.80065L2.59889 0.648335C2.38768 0.473203 2.14448 0.382812 1.85647 0.382812C1.26766 0.382812 0.78125 0.800869 0.78125 1.32062C0.78125 1.58049 0.909253 1.81776 1.12686 2.01549L5.30614 5.58592L1.12686 9.14505C0.902853 9.34278 0.78125 9.58006 0.78125 9.83993C0.78125 10.354 1.26766 10.7777 1.85647 10.7777Z" fill="#ABABAB" />
                        </svg></strong>
                </a>
                <a href="http://">
                <div class="svg"> 

                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.5 8.02694C7.65056 8.02694 7.77361 7.98665 7.86917 7.90607C7.96528 7.8255 8.01333 7.72173 8.01333 7.59478C8.01333 7.46735 7.96528 7.36335 7.86917 7.28278C7.77361 7.2022 7.65056 7.16191 7.5 7.16191C7.34944 7.16191 7.22639 7.2022 7.13083 7.28278C7.03528 7.36335 6.98722 7.46735 6.98667 7.59478C6.98611 7.7222 7.03417 7.82597 7.13083 7.90607C7.2275 7.98618 7.35056 8.02647 7.5 8.02694ZM7.08333 5.94624H7.91667V1.67594H7.08333V5.94624ZM0 12V1.13556C0 0.811852 0.128611 0.541781 0.385833 0.32535C0.643056 0.108918 0.963055 0.000468466 1.34583 0H13.6542C14.0375 0 14.3575 0.10845 14.6142 0.32535C14.8708 0.54225 14.9994 0.812321 15 1.13556V8.70293C15 9.02618 14.8714 9.29625 14.6142 9.51315C14.3569 9.73005 14.0369 9.83826 13.6542 9.83779H2.56417L0 12ZM2.20833 9.13509H13.6542C13.7819 9.13509 13.8994 9.09012 14.0067 9.00018C14.1139 8.91023 14.1672 8.81115 14.1667 8.70293V1.13486C14.1667 1.02711 14.1133 0.928032 14.0067 0.837618C13.9 0.747204 13.7825 0.702231 13.6542 0.7027H1.34583C1.21806 0.7027 1.10056 0.747672 0.993333 0.837618C0.886111 0.927563 0.832778 1.02664 0.833333 1.13486V10.291L2.20833 9.13509Z" fill="#0601B4" />
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