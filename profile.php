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
                <a class='editSvg' href="edit-profile.php"> <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 18.0024H3.75L14.81 6.94244L11.06 3.19244L0 14.2524V18.0024ZM2 15.0824L11.06 6.02244L11.98 6.94244L2.92 16.0024H2V15.0824ZM15.37 0.292444C15.2775 0.19974 15.1676 0.126193 15.0466 0.0760114C14.9257 0.02583 14.796 0 14.665 0C14.534 0 14.4043 0.02583 14.2834 0.0760114C14.1624 0.126193 14.0525 0.19974 13.96 0.292444L12.13 2.12244L15.88 5.87244L17.71 4.04244C17.8027 3.94993 17.8762 3.84004 17.9264 3.71907C17.9766 3.59809 18.0024 3.46841 18.0024 3.33744C18.0024 3.20648 17.9766 3.07679 17.9264 2.95582C17.8762 2.83485 17.8027 2.72496 17.71 2.63244L15.37 0.292444Z" fill="black" />
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