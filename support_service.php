<?php
include './app/controllers/source_user.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/feedback.css">
    <title>Support</title>
</head>

<body>
    <?php
    if ($_SESSION['name'] == '') {
        header('Location: /');
        exit;
    }
    ?>
    <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png"></button>
    <script src="./assets/js/goBack.js"></script>
    <main>
        <div class="container">
            <div class="text">
                <h1 class="register-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                        <mask id="mask0_111_120" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="23" height="20">
                            <rect width="25.0799" height="10" transform="matrix(0.91707 0.398726 0 1 0 0)" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_111_120)">
                            <rect width="25.0799" height="10" transform="matrix(0.91707 -0.398726 0 1 0 0)" fill="#1D3EB3" />
                            <rect width="25.0799" height="25.0799" transform="matrix(0.91707 0.398726 -0.91707 0.398726 11.8477 4.54492)" fill="#FAC02B" />
                        </g>
                    </svg>

                    <span style="display: inline-block; vertical-align: middle;">Support Service</span>
                </h1>
                <p for="floatingInput"><?= $errMsgEmpty ?></p>
            </div>
        </div>

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
                <button name='button-feedback-submit' type="submit" class="continue-btn">Submit</button>

            </div>
        </form>

        </div>
    </main>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script src="./assets/js/javascript.js"></script>
    <script src="./assets/js/goBack.js"></script>
    <?php
    include './app/include/footer.php'
    ?>
</body>

</html>