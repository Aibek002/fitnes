<? include './app/controllers/user.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/planer.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Planer</title>
</head>

<body>
    <?
    include './app/include/header.php'
    ?>
    <p class="date">
        Feb 2024
    </p>
    <div class="container text-center">
        <div class="row">
            <div class="col">Mon <strong>01</strong></div>
            <div class="col">Tue <strong>02</strong></div>
            <div class="col">Wed <strong>03</strong></div>
            <div class="col">Thu <strong>04</strong></div>
            <div class="col">Fri <strong>05</strong></div>
            <div class="col">Sun <strong>06</strong></div>
            <div class="col">Sat <strong>07</strong></div>
        </div>
        <div class="flex-plan">
            <div class="first-flex">
                <p class="date-plan"><svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="4" cy="4" r="4" fill="#1F64FF" />
                    </svg>
                    Thursday, 07 Feb, 2024
                </p>
            </div>
            <div class="second-flex">
                <div class="first-box">
                    <div class="date-box"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.0332 3.73112L8.49987 0.533203L15.9665 3.73112M1.0332 3.73112L8.49987 6.92904M1.0332 3.73112V3.7332M15.9665 3.73112L8.49987 6.92904M15.9665 3.73112V12.2665L8.49987 15.4665M15.9665 3.73112L8.49987 6.9332V15.4665M8.49987 6.92904V15.4665M8.49987 6.92904L1.0332 3.7332M8.49987 15.4665L1.0332 12.2665V3.7332" stroke="#26BFBF" stroke-linejoin="round" />
                        </svg>
                        <p>11:30 AM - 12:30 PM</p>
                    </div>
                    <p class="title">Chorizo & mozzarella gnocchi bake</p>
                    <p class="subtitle">This dish allowing you to fully enjoy the Italian experience without the extra calories.</p>
                </div>
                <div class="second-box">
                    <div class="date-box"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M1.0332 3.73112L8.49987 0.533203L15.9665 3.73112M1.0332 3.73112L8.49987 6.92904M1.0332 3.73112V3.7332M15.9665 3.73112L8.49987 6.92904M15.9665 3.73112V12.2665L8.49987 15.4665M15.9665 3.73112L8.49987 6.9332V15.4665M8.49987 6.92904V15.4665M8.49987 6.92904L1.0332 3.7332M8.49987 15.4665L1.0332 12.2665V3.7332" stroke="#89AFFF" stroke-linejoin="round" />
</svg>
                        <p>11:30 AM - 12:30 PM</p>
                    </div>
                    <p class="title">Chorizo & mozzarella gnocchi bake</p>
                    <p class="subtitle">This dish allowing you to fully enjoy the Italian experience without the extra calories.</p>
                </div>
                <div class="third-box">
                    <div class="date-box"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M1.0332 3.73112L8.49987 0.533203L15.9665 3.73112M1.0332 3.73112L8.49987 6.92904M1.0332 3.73112V3.7332M15.9665 3.73112L8.49987 6.92904M15.9665 3.73112V12.2665L8.49987 15.4665M15.9665 3.73112L8.49987 6.9332V15.4665M8.49987 6.92904V15.4665M8.49987 6.92904L1.0332 3.7332M8.49987 15.4665L1.0332 12.2665V3.7332" stroke="#FFB017" stroke-linejoin="round" />
</svg>
                        <p>11:30 AM - 12:30 PM</p>
                    </div>
                    <p class="title">Chorizo & mozzarella gnocchi bake</p>
                    <p class="subtitle">This dish allowing you to fully enjoy the Italian experience without the extra calories.</p>
                </div>

            </div>
        </div>
        <? include './app/include/footer.php' ?>
</body>

</html>