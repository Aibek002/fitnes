<? include './app/controllers/user.php' ?>
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
    <?
    include './app/include/header.php'
    ?>
    <div class="containers">
        <!-- <h2 class="user"><? echo $_SESSION['name'] ?></h2> -->

        <? if (isset($_SESSION['name'])) : ?>
            <div class="edit-profile">
                <div class="logo-user">
                    <img src="assets\images\logo-user.png" alt="">

                </div>
                <div class="username">
                    <p class="name"><? echo $_SESSION['name'] . " " .  $_SESSION['surname'] ?> </p>
                    <div class="edit-profiles">Age : <? echo $_SESSION['age']; ?><br>Goal : <? echo $_SESSION['goaltext']; ?></div>
                </div>
                <a class='editSvg' href="edit-profile.php"> <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect width="16" height="16" />
  <path d="M2.12182 13.5988H3.04798L12.0717 5.04041L11.1456 4.16201L2.12182 12.7204V13.5988ZM1.27832 14.3988V12.3828L12.3956 1.82921C12.4822 1.75614 12.5778 1.69961 12.6824 1.65961C12.787 1.61961 12.8958 1.59961 13.0088 1.59961C13.1224 1.59961 13.2321 1.61641 13.3378 1.65001C13.4447 1.68414 13.5431 1.74548 13.633 1.83401L14.5322 2.69161C14.6256 2.77694 14.6891 2.87028 14.7228 2.97161C14.7571 3.07348 14.7743 3.17534 14.7743 3.27721C14.7743 3.38548 14.7549 3.48921 14.7161 3.58841C14.6779 3.68708 14.6166 3.77748 14.5322 3.85961L3.40394 14.3988H1.27832ZM11.6002 4.60841L11.1456 4.16201L12.0717 5.04041L11.6002 4.60841Z" fill="white" />
</svg></a>

            </div>
            <div class="info-users">

                <div class="height">
                    <div class="first-item">
                        <p class="title-info">Age</p>
                        <p class="info"><? echo $_SESSION['age']; ?> <span>yrs</span></p>
                    </div>
                    <div class="second-item"><img src="./assets/images/age.png" alt=""></div>
                </div>
                <div class="weight">
                    <div class="first-item">
                        <p class="title-info">Weight</p>
                        <p class="info"><? echo $_SESSION['weight']; ?><span> kg</span></p>
                    </div>
                    <div class="second-item"><img src="./assets/images/weight.png" alt=""></div>
                </div>
                <div class="gender">
                    <div class="first-item">
                        <p class="title-info">Height</p>
                        <p class="info"><? echo $_SESSION['height']; ?> <span> cm</span></p>
                    </div>
                    <div class="second-item"><img src="./assets/images/height.png" alt=""></div>
                </div>
                <div class="age">
                    <div class="first-item">
                        <p class="title-info">Gender</p>
                        <p class="info-gender"><? echo $_SESSION['gender']; ?></p>
                    </div>
                    <div class="second-item"><img src="./assets/images/gender.png" alt=""></div>
                </div>
                <div class="bodyfat">
                    <div class="first-item">
                        <p class='title-info-long'>Body fat :</p>
                        <p class='info-long'><? echo $_SESSION['bodyfat']; ?></p>
                    </div>
                    <div class="second-items"><img class="long-image-first" src="./assets/images/bodyfat.png" alt=""></div>

                </div>

                <div class="activatyLevel">
                    <div class="first-item">
                        <p class='title-info-long'>Level activity :</p>
                        <p class='info-long'><? echo $_SESSION['acivityLevel']; ?></p>
                    </div>
                    <div class="second-items"><img class="long-image-second" src="./assets/images//GirlRunning.png" alt=""></div>
                </div>

                <div class="information-metobalitic">
                    <div class="firsts-item">
                        <p class="title-info">Carbohydrates </p>
                        <p class="infos"><? echo (int) $_SESSION['Carbohydrates']; ?> <span>g</span></p>
                        
                    </div>
                    
                    <div class="seconds-item">
                        <p class="title-info">Protein : </p>
                        <p class="infos"><? echo (int) $_SESSION['Protein']; ?><span> g</span></p>
                    </div>
                    <div class="thirds-item">
                        <p class="title-info">Metabolic</p>
                        <p class="infoss"><? echo (int) $_SESSION['dayKcall']; ?> <span> kcal/day</span></p>
                    </div>
                    <div class="fourths-item">
                        <p class="title-info">Fat</p>
                        <p class="infos"><? echo (int) $_SESSION['Fat']; ?> <span> g</span></p>
                    </div>

                </div>
          
            
               
            </div>
            <div class="box">
                <div class="first">
                    <div class="f">
                        <div class="icon"> <a href="feedback.php"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9759 14.8724C15.6753 14.8724 17.8493 14.2695 18.0592 11.8498C18.0592 9.43168 16.5435 9.58718 16.5435 6.62028C16.5435 4.3028 14.3469 1.66602 10.9759 1.66602C7.60489 1.66602 5.40828 4.3028 5.40828 6.62028C5.40828 9.58718 3.89258 9.43168 3.89258 11.8498C4.10337 14.2787 6.27739 14.8724 10.9759 14.8724Z" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M12.967 17.3809C11.8302 18.6431 10.0568 18.6581 8.90918 17.3809" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> </div>
                        <p> Feedback</p></a>
                    </div>
                    <div><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.04199 11.6797C2.33398 11.6797 2.56885 11.5781 2.77197 11.375L7.55176 6.71582C7.82471 6.44287 7.94531 6.17627 7.95166 5.83984C7.95166 5.50977 7.82471 5.23047 7.55176 4.96387L2.77832 0.29834C2.56885 0.101562 2.32764 0 2.04199 0C1.45801 0 0.975586 0.469727 0.975586 1.05371C0.975586 1.3457 1.10254 1.6123 1.31836 1.83447L5.46338 5.84619L1.31836 9.84521C1.09619 10.0674 0.975586 10.334 0.975586 10.626C0.975586 11.2036 1.45801 11.6797 2.04199 11.6797Z" fill="#ABABAB" />
                        </svg></div>
                </div>
                <div class="first">
                    <div class="f">
                        <div class="icon"> <a href="about.php"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.36848 9.66527C2.47431 6.8736 3.51931 3.68277 6.45015 2.7386C7.99182 2.2411 9.69348 2.53443 10.9751 3.4986C12.1876 2.5611 13.9518 2.24443 15.4918 2.7386C18.4226 3.68277 19.4743 6.8736 18.581 9.66527C17.1893 14.0903 10.9751 17.4986 10.9751 17.4986C10.9751 17.4986 4.80681 14.1419 3.36848 9.66527Z" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M14.3086 5.58398C15.2003 5.87232 15.8303 6.66815 15.9061 7.60232" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> </div>
                        <p> About App</p></a>
                    </div>
                    <div><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.04199 11.6797C2.33398 11.6797 2.56885 11.5781 2.77197 11.375L7.55176 6.71582C7.82471 6.44287 7.94531 6.17627 7.95166 5.83984C7.95166 5.50977 7.82471 5.23047 7.55176 4.96387L2.77832 0.29834C2.56885 0.101562 2.32764 0 2.04199 0C1.45801 0 0.975586 0.469727 0.975586 1.05371C0.975586 1.3457 1.10254 1.6123 1.31836 1.83447L5.46338 5.84619L1.31836 9.84521C1.09619 10.0674 0.975586 10.334 0.975586 10.626C0.975586 11.2036 1.45801 11.6797 2.04199 11.6797Z" fill="#ABABAB" />
                        </svg></div>
                </div>
                <div class="first">
                    <div class="f">
                        <div class="icon"> <a href="nutrition-calculator.php"><svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M3 16.999H4.098L14.796 6.301L13.698 5.203L3 15.901V16.999ZM2 17.999V15.479L15.18 2.287C15.2827 2.19567 15.396 2.125 15.52 2.075C15.644 2.025 15.773 2 15.907 2C16.0417 2 16.1717 2.021 16.297 2.063C16.4237 2.10567 16.5403 2.18233 16.647 2.293L17.713 3.365C17.8237 3.47167 17.899 3.58833 17.939 3.715C17.9797 3.84233 18 3.96967 18 4.097C18 4.23233 17.977 4.362 17.931 4.486C17.8857 4.60933 17.813 4.72233 17.713 4.825L4.52 17.999H2ZM14.237 5.761L13.698 5.203L14.796 6.301L14.237 5.761Z" fill="#0601B4" />
</svg> </div>
                        <p>Change Health Information</p></a>
                    </div>
                    <div><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.04199 11.6797C2.33398 11.6797 2.56885 11.5781 2.77197 11.375L7.55176 6.71582C7.82471 6.44287 7.94531 6.17627 7.95166 5.83984C7.95166 5.50977 7.82471 5.23047 7.55176 4.96387L2.77832 0.29834C2.56885 0.101562 2.32764 0 2.04199 0C1.45801 0 0.975586 0.469727 0.975586 1.05371C0.975586 1.3457 1.10254 1.6123 1.31836 1.83447L5.46338 5.84619L1.31836 9.84521C1.09619 10.0674 0.975586 10.334 0.975586 10.626C0.975586 11.2036 1.45801 11.6797 2.04199 11.6797Z" fill="#ABABAB" />
                        </svg></div>
                </div>
                <div class="first">
                    <div class="f">
                        <div class="icon"> <a href="logout.php"><svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M12.5129 5.55232V4.8512C12.5129 3.32196 11.1379 2.08203 9.44207 2.08203H5.37957C3.68457 2.08203 2.30957 3.32196 2.30957 4.8512V13.215C2.30957 14.7443 3.68457 15.9842 5.37957 15.9842H9.4504C11.1412 15.9842 12.5129 14.748 12.5129 13.2233V12.5147" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M18.1738 9.03394H8.13965" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.7344 6.8418L18.1744 9.03233L15.7344 11.2236" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> </div>
                        <p> Log Out</p></a>
                    </div>
                    <div><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.04199 11.6797C2.33398 11.6797 2.56885 11.5781 2.77197 11.375L7.55176 6.71582C7.82471 6.44287 7.94531 6.17627 7.95166 5.83984C7.95166 5.50977 7.82471 5.23047 7.55176 4.96387L2.77832 0.29834C2.56885 0.101562 2.32764 0 2.04199 0C1.45801 0 0.975586 0.469727 0.975586 1.05371C0.975586 1.3457 1.10254 1.6123 1.31836 1.83447L5.46338 5.84619L1.31836 9.84521C1.09619 10.0674 0.975586 10.334 0.975586 10.626C0.975586 11.2036 1.45801 11.6797 2.04199 11.6797Z" fill="#ABABAB" />
                        </svg></div>
                </div>
            </div>
        <? else : ?>
            <? echo $_SESSION['name'] . " ."; ?>
            <a href="login.php">login</a>
        <? endif ?>
    </div>



    <? include './app/include/footer.php' ?>
</body>

</html>