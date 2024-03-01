<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../../assets/css/footer.css">
</head>
<body>
  <footer>
  <div class="container-footer">

  
  <div class="left"><p>Hi there 👋
Need a hand? Feel free to drop us a message Knowledge base.</p></div>

    <form action="feedback.php" method="post">


      
      <ul class="nav col-md-2 justify-content-end list-unstyled d-flex">
        <li class="ms-3">
            <input name="name" type="text" id="name" placeholder="name" required>
        </li>
        <li class="ms-3">
            <input name="surname" type="text" id="surname" placeholder="surname" required>
        </li>
        <li class="ms-3">
            <input name="email" type="text" id="email" placeholder="email" required>
        </li>
        <li class="ms-3">
            <input name="phone" type="text" id="tel" placeholder="phone" required>
        </li>
            <textarea name="msg" type="text" id="msg" placeholder="write your message" required></textarea>

      </ul>
      <button name='button-feedback' type="submit" class="send-btn">Send message</button>
      
      <!-- <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3">
          <div class="input-group">
            <input name="feedback-title" type="text" id="feedback-title" placeholder="feedback-title" required>
          </div>
        </li>
        <li class="ms-3">
          <div class="input-group">
            <input name="phone" type="text" id="feedback-title" placeholder="phone number" required>
          </div>
        </li>
      
      </ul> -->
    </form>

    </footer>
</body>
</html>
