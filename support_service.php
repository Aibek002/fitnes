<?
include './app/controllers/user.php'


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/support_service.css">
    <title>Support service</title>
</head>

<body>
<?
    include './app/include/header.php'
    ?>
<button type="button" class="back-btn"><img src="assets\images\back.png" alt="Back"></button>
  
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

        <form action="feedback.php" method="post">
        <div class="div-input">
        <label  class="label" for="goalWeight">Name</label>

                <!-- <input name='feedback-text' type="text" id="feedback-text" placeholder="feedback" required> -->
                <input name="name" type="text" id="feedback-title" placeholder="Name  " required>
            </div>
        <div class="div-input">
        <label  class="label" for="goalWeight">Email</label>

                <!-- <input name='feedback-text' type="text" id="feedback-text" placeholder="feedback" required> -->
                <input name="email" type="email" id="feedback-title" placeholder="Email address  " required>
            </div>

            <div class="div-input">
            <label class="label" for="goalWeight">Phone Number</label>
                <!-- <input name='feedback-text' type="text" id="feedback-text" placeholder="feedback" required> -->
                <input name="phone" type="text" id="feedback-title" placeholder="(123) 456-7890" required>
            </div>
            <div class="div-input">
            <label  class="label" for="goalWeight">Feedback title</label>

                <input name="feedback-title" type="text" id="feedback-title" placeholder="feedback-title" required>
            </div>

            <div class="div-input">
            <label  class="label" for="goalWeight">Additional feedback</label>

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
<?
include './app/include/footer.php'
?>
</body>

</html>