<?php
include './app/controllers/source_user.php'


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/feedback.css">
    <title>Feedback </title>
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
<div class="desktop-message">
        <!-- Сообщение для настольных устройств -->
        <h1>Этот сайт доступен только на мобильных устройствах</h1>
    </div>
    <button type="button" class="back-btn" onclick="goBack()"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M3 15L11 7M3 15L11 23M3 15H28" stroke="white" stroke-width="2" />
</svg></button>
    <script src="./assets/js/goBack.js"></script>

    <main>
        <div class="container">
            <div class="text">
                <h1 class="register-logo">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M22.938 17.8625C23.163 17.9625 23.4005 18 23.6255 18C24.138 18 24.638 17.7875 25.0005 17.4L27.9255 14.25H31.7505C33.813 14.25 35.5005 12.5625 35.5005 10.5V4.25C35.5005 2.1875 33.813 0.5 31.7505 0.5H21.7505C19.688 0.5 18.0005 2.1875 18.0005 4.25V10.4875C18.0005 12.55 19.688 14.2375 21.7505 14.2375V16.1125C21.7505 16.9 22.213 17.575 22.938 17.8625ZM20.5005 4.25C20.5005 3.5625 21.063 3 21.7505 3H31.7505C32.438 3 33.0005 3.5625 33.0005 4.25V10.5C33.0005 11.1875 32.438 11.75 31.7505 11.75H26.8255L24.2505 14.525V11.75H21.7505C21.063 11.75 20.5005 11.1875 20.5005 10.5V4.25ZM11.1255 20.5C7.67548 20.5 4.87548 17.7 4.87548 14.25C4.87548 10.8 7.67548 8 11.1255 8C14.5755 8 17.3755 10.8 17.3755 14.25C17.3755 17.7 14.5755 20.5 11.1255 20.5ZM11.1255 10.5C9.06298 10.5 7.37548 12.1875 7.37548 14.25C7.37548 16.3125 9.06298 18 11.1255 18C13.188 18 14.8755 16.3125 14.8755 14.25C14.8755 12.1875 13.188 10.5 11.1255 10.5ZM11.1255 35.4875C7.50048 35.4875 4.72548 34.4875 2.85049 32.5275C0.436735 30.0087 0.492985 26.7963 0.499235 26.48V26.4587C0.500485 24.575 2.07548 23 4.02549 23H18.2255C20.163 23 21.7505 24.5737 21.7505 26.5212V26.5337C21.7555 26.7612 21.8255 29.9963 19.4005 32.54C17.5255 34.5013 14.7505 35.5 11.1255 35.5V35.4875ZM4.02549 25.4975C3.46299 25.4975 3.00048 25.96 3.00048 26.5225V26.53C2.99673 26.7087 2.96548 29.0613 4.67548 30.83C6.05049 32.2663 8.22548 32.99 11.1255 32.99C14.0255 32.99 16.188 32.265 17.5755 30.83C19.3255 29.0187 19.263 26.5963 19.2505 26.5713C19.2505 25.9587 18.788 25.4975 18.2255 25.4975H4.02549Z" fill="white" />
</svg>
                    <span >Feedback</span>
                </h1>
                <p for="floatingInput"><?php echo $errMsgEmpty ?></p>
            </div>
        </div>

        <form action="feedback.php" method="post">
            <div class="div-input">
                <label class="label" for="goalWeight">Name</label>

                <!-- <input name='feedback-text' type="text" id="feedback-text" placeholder="feedback" required> -->
                <input value=<?php echo $_SESSION['name'] ?> name="name" type="text" id="feedback-title" placeholder="Name  " required>
            </div>
            <div class="div-input">
                <label class="label" for="goalWeight">Email</label>

                <!-- <input name='feedback-text' type="text" id="feedback-text" placeholder="feedback" required> -->
                <input value=<?php echo $_SESSION['email'] ?> name='email' type="email" id="feedback-title" placeholder="Email address  " required>
            </div>

            <div class="div-input">
                <label class="label" for="goalWeight">Phone Number</label>
                <!-- <input name='feedback-text' type="text" id="feedback-text" placeholder="feedback" required> -->
                <input name="phone" type="text" id="feedback-title" placeholder="(123) 456-7890" required>
            </div>
            <div class="div-input">
                <label class="label" for="goalWeight">Feedback title</label>

                <input name="feedback-title" type="text" id="feedback-title" placeholder="feedback-title" required>
            </div>

            <div class="div-input">
                <label class="label" for="goalWeight">Additional feedback</label>

                <!-- <input name='feedback-text' type="text" id="feedback-text" placeholder="feedback" required> -->
                <textarea name='msg' class="feedback-text" placeholder="If you have any additional feedback, please type it in here..." rows="3"></textarea>
            </div>

            <button name='button-feedback' type="submit" class="continue-btn">Continue</button>
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