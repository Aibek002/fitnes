<? include './app/controllers/user.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/print.css">                                                                                                   
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Results</title>
</head>

<body>

    <div class="containers">
        <!-- <h2 class="user"><? echo $_SESSION['name'] ?></h2> -->

        <? if (isset($_SESSION['name'])) : ?>
            <div class="edit-profile">
                <div class="logo-user">
                    <img src="assets\images\logo-user.png" alt="">

                </div>
                <div class="username">
                    <p class="name"><? echo $_SESSION['name'] . " " .  $_SESSION['surname'] ?> </p>
                    <div class="edit-profiles">Weight Goal : <? echo $_SESSION['weight']; ?><br>Goal : <? echo $_SESSION['goaltext']; ?></div>
                </div>
                <a class='editSvg' href="edit-profile.php"> <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 18.0024H3.75L14.81 6.94244L11.06 3.19244L0 14.2524V18.0024ZM2 15.0824L11.06 6.02244L11.98 6.94244L2.92 16.0024H2V15.0824ZM15.37 0.292444C15.2775 0.19974 15.1676 0.126193 15.0466 0.0760114C14.9257 0.02583 14.796 0 14.665 0C14.534 0 14.4043 0.02583 14.2834 0.0760114C14.1624 0.126193 14.0525 0.19974 13.96 0.292444L12.13 2.12244L15.88 5.87244L17.71 4.04244C17.8027 3.94993 17.8762 3.84004 17.9264 3.71907C17.9766 3.59809 18.0024 3.46841 18.0024 3.33744C18.0024 3.20648 17.9766 3.07679 17.9264 2.95582C17.8762 2.83485 17.8027 2.72496 17.71 2.63244L15.37 0.292444Z" fill="black" />
                    </svg></a>

            </div>
            <div class="info-users">
    
    <div class="height">
       <div class="first-item"><p class="title-info">Carbohydrates  </p><p class="info"><? echo $_SESSION['Carbohydrates']; ?> <br><span>grams</span></p></div>
       <div class="second-item"><img src="./assets/images/age.png" alt=""></div>
    </div>
    <div class="weight">
    <div class="first-item"><p class="title-info">Protein : </p><p class="info"><? echo $_SESSION['Protein']; ?><span><br> grams</span></p></div>
       <div class="second-item"><img src="./assets/images/weight.png" alt=""></div>
    </div>
    <div class="gender">
    <div class="first-item"><p class="title-info">Metabolic</p><p class="info"><? echo $_SESSION['dayKcall']; ?> <span> kcal/day</span></p></div>
       <div class="second-item"><img src="./assets/images/height.png" alt=""></div>
    </div>
    <div class="age">
    <div class="first-item"><p class="title-info">Fat</p><p class="info"><? echo $_SESSION['Fat']; ?> <span><br> grams</span></p></div>
       <div class="second-item"><img src="./assets/images/gender.png" alt=""></div>
    </div>
    <div class="bodyfat">
        <div class="first-item"><p class='title-info-long'>Total Calories per Week : </p><p class='info-long'>  <? echo $_SESSION['totalCaloriesPerWeek']; ?> <span> kcal/week</span></p></div>
        <div class="second-items"><img class="long-image-first" src="./assets/images/bodyfat.png" alt=""></div>
       
    </div>
    <div class="activatyLevel">
    <div class="first-item"><p class='title-info-long'>Total Calories per Month : </p><p class='info-long'><? echo  $_SESSION['month'] ; ?> <span> kcal/month</span></p></div>
        <div class="second-items"><img class="long-image-second" src="./assets/images//GirlRunning.png" alt=""></div>
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