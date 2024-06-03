<?php
include './app/controllers/source_user.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/support_service.css">
    <title>Support</title>
</head>
<style>
    /* Медиазапрос для настольных устройств */
    @media (min-width: 768px) {
        .mobile-only {
            display: none;
        }

        .desktop-message {
            display: block;
        }


        main {
            display: none;
        }
        body{
            background: #fff;
        }
    }

    /* Медиазапрос для мобильных устройств */
    @media (max-width: 767px) {
        .mobile-only {
            display: block;
        }

        .desktop-message {
            display: none;
        }

        main {
            display: block;
        }
    
    }
</style>

<body>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script src="./assets/js/javascript.js"></script>
    <script src="./assets/js/goBack.js"></script>

    <script>
        // JavaScript для дополнительной проверки при загрузке страницы
        function checkDevice() {
            if (window.innerWidth >= 768) {
                document.querySelector('.mobile-only').style.display = 'none';
                document.querySelector('.desktop-message').style.display = 'block';
            } else {
                document.querySelector('.mobile-only').style.display = 'block';
                document.querySelector('.desktop-message').style.display = 'none';

            }
        }

        window.onload = checkDevice;
        window.onresize = checkDevice;
    </script>

    <?php
    if ($_SESSION['name'] == '') {
        header('Location: /');
        exit;
    }
    ?>

    <div class="mobile-only">
        <!-- Контент для мобильных устройств -->
    </div>
    <div class="desktop-message">
        <!-- Сообщение для настольных устройств -->
        <h1>Этот сайт доступен только на мобильных устройствах</h1>
    </div>
    <main>
        <button type="button" class="back-btn" onclick="goBack()"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 15L11 7M3 15L11 23M3 15H28" stroke="white" stroke-width="2" />
            </svg></button>
        <script src="./assets/js/goBack.js"></script>

        <div class="container">
            <div class="text">
                <h1 class="register-logo">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 29C18.9944 29.0002 18.0256 28.6216 17.2865 27.9397C16.5475 27.2577 16.0924 26.3224 16.012 25.32C13.3444 24.3758 11.0961 22.5194 9.66405 20.0787C8.23199 17.638 7.70824 14.7699 8.18525 11.9805C8.66226 9.19121 10.1093 6.66009 12.2711 4.83396C14.4328 3.00783 17.1702 2.00412 20 2C23.0098 1.99956 25.9098 3.13017 28.1251 5.16765C30.3404 7.20513 31.7092 10.0007 31.96 13C31.9684 13.1301 31.9496 13.2605 31.9048 13.383C31.8601 13.5054 31.7903 13.6172 31.7 13.7112C31.6098 13.8053 31.5009 13.8795 31.3804 13.9292C31.2599 13.9789 31.1303 14.003 31 14C30.7321 13.9933 30.4763 13.8872 30.2822 13.7024C30.0882 13.5176 29.9698 13.2672 29.95 13C29.7719 11.2317 29.1257 9.54276 28.078 8.10714C27.0302 6.67153 25.6188 5.54108 23.9891 4.83217C22.3593 4.12327 20.57 3.86153 18.8055 4.07389C17.0409 4.28625 15.3649 4.96505 13.9498 6.0404C12.5348 7.11575 11.4319 8.54879 10.7547 10.192C10.0775 11.8352 9.8505 13.6292 10.097 15.3893C10.3435 17.1494 11.0547 18.812 12.1573 20.2059C13.2598 21.5999 14.714 22.6748 16.37 23.32C16.6713 22.6689 17.1422 22.1108 17.7333 21.7043C18.3245 21.2977 19.0141 21.0576 19.7299 21.0091C20.4457 20.9607 21.1613 21.1056 21.8019 21.4288C22.4424 21.7519 22.9842 22.2414 23.3706 22.846C23.7569 23.4505 23.9736 24.1478 23.9978 24.8649C24.0221 25.5819 23.853 26.2922 23.5084 26.9215C23.1637 27.5507 22.6562 28.0757 22.0389 28.4414C21.4217 28.8071 20.7174 29 20 29ZM10.018 24H10.2C10.98 24.762 11.846 25.434 12.784 26H10.018C8.896 26 8 26.894 8 28C8 30.618 9.244 32.568 11.346 33.906C13.486 35.272 16.53 36 20 36C23.47 36 26.514 35.272 28.654 33.906C30.754 32.566 32 30.62 32 28C32 27.4696 31.7893 26.9609 31.4142 26.5858C31.0391 26.2107 30.5304 26 30 26H25.918C26.0299 25.338 26.0299 24.662 25.918 24H30C31.0609 24 32.0783 24.4214 32.8284 25.1716C33.5786 25.9217 34 26.9391 34 28C34 31.382 32.334 33.932 29.73 35.594C27.166 37.228 23.71 38 20 38C16.29 38 12.834 37.228 10.27 35.594C7.666 33.934 6 31.38 6 28C6 25.774 7.806 24 10.018 24ZM28 14C28.0004 15.3533 27.6576 16.6845 27.0035 17.8693C26.3494 19.054 25.4055 20.0534 24.26 20.774C23.7261 20.2356 23.0949 19.8033 22.4 19.5C23.6634 18.9486 24.6983 17.9791 25.3309 16.7543C25.9635 15.5296 26.1551 14.1244 25.8734 12.7751C25.5918 11.4257 24.8542 10.2144 23.7845 9.34499C22.7148 8.47554 21.3784 8.00091 20 8.00091C18.6216 8.00091 17.2852 8.47554 16.2155 9.34499C15.1459 10.2144 14.4082 11.4257 14.1266 12.7751C13.8449 14.1244 14.0365 15.5296 14.6691 16.7543C15.3017 17.9791 16.3366 18.9486 17.6 19.5C16.9 19.806 16.27 20.24 15.74 20.774C14.2208 19.8186 13.067 18.3802 12.464 16.69C12.1564 15.8265 11.9994 14.9166 12 14C12 11.8783 12.8429 9.84344 14.3431 8.34315C15.8434 6.84285 17.8783 6 20 6C22.1217 6 24.1566 6.84285 25.6569 8.34315C27.1571 9.84344 28 11.8783 28 14Z" fill="white" />
                    </svg>
                    <span style="display: inline-block; vertical-align: middle;">Support </span>
                </h1>
                <p for="floatingInput"><?= $errMsgEmpty ?></p>
            </div>
        </div>

        <div class="form">
            <svg class='drop-up' width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5 5.99894L3.50165 12L0 9.00053L10.5 0L21 9.00053L17.4984 12L10.5 5.99894Z" fill="#8F98CE" />
            </svg>
            <form action="support_service.php" method="post">
                <p class="title">How was your overall experience?</p>
                <p class="subtitle"></p>





                <div class="selected">
                    <input type="radio" class="btn-check" id="btn-check-1" name="selected-emojis[]" value="1" autocomplete="off">
                    <label class="btn" for="btn-check-1">
                        <img class="first" src="https://www.emojiworld.ru/img/emojis/pensive-face_1f614.png" alt="">
                    </label>

                    <input type="radio" class="btn-check" id="btn-check-2" name="selected-emojis[]" value="2" autocomplete="off">
                    <label class="btn" for="btn-check-2">
                        <img class="second" src="https://www.emojiworld.ru/img/emojis/confused-face_1f615.png" alt="">
                    </label>

                    <input type="radio" class="btn-check" id="btn-check-3" name="selected-emojis[]" value="3" autocomplete="off">
                    <label class="btn" for="btn-check-3">
                        <img class="thrid" src="https://www.emojiworld.ru/img/emojis/face-with-one-eyebrow-raised_1f928.png" alt="">
                    </label>

                    <input type="radio" class="btn-check" id="btn-check-4" name="selected-emojis[]" value="4" autocomplete="off">
                    <label class="btn" for="btn-check-4">
                        <img class="fourth" src="https://www.emojiworld.ru/img/emojis/grinning-face_1f600.png" alt="">
                    </label>

                    <input type="radio" class="btn-check" id="btn-check-5" name="selected-emojis[]" value="5" autocomplete="off">
                    <label class="btn" for="btn-check-5">
                        <img class="fifth" src="https://www.emojiworld.ru/img/emojis/grinning-face-with-star-eyes_1f929.png" alt="">
                    </label>
                </div>


                <p class="subtitle">What is wrong?</p>

                <div class="select-reason">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-0" name="selected-reasons[]" value="Application bugs" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btn-check-outlined-0">Application bugs</label>

                    <input type="checkbox" class="btn-check" id="btn-check-outlined-1" name="selected-reasons[]" value="Customer service" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btn-check-outlined-1">Customer service</label>

                    <input type="checkbox" class="btn-check" id="btn-check-outlined-2" name="selected-reasons[]" value="Slow loading" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btn-check-outlined-2">Slow loading</label>

                    <input type="checkbox" class="btn-check" id="btn-check-outlined-3" name="selected-reasons[]" value="Incorrect Data" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btn-check-outlined-3">Incorrect Data</label>

                    <input type="checkbox" class="btn-check" id="btn-check-outlined-4" name="selected-reasons[]" value="Weak functionality" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btn-check-outlined-4">Weak functionality</label>

                    <input type="checkbox" class="btn-check" id="btn-check-outlined-5" name="selected-reasons[]" value="Bad navigation" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btn-check-outlined-5">Bad navigation</label>

                    <input type="checkbox" class="btn-check" id="btn-check-outlined-6" name="selected-reasons[]" value="Other problems" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btn-check-outlined-6">Other problems</label>

                </div>
                <button name='button-feedback-submit' type="submit" class="continue-btn">Submit</button>

            </form>

        </div>
    </main>
    <?php
    include './app/include/footer.php'
    ?>
</body>

</html>