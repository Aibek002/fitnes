<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Random Meals</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-top: 150px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid #ccc;
    }

    th,
    td {
      padding: 6px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .back-btn {
      position: absolute;
      top: 70px;
      left: 30px;
      border: none;
      cursor: pointer;
      border-radius: 50%;
      overflow: hidden;
      width: 40px;
      height: 40px;
      background-color: #1f64ff;
    }

    .back-btn img {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 40%;
    }
  </style>
</head>

<body>
  <button type="button" class="back-btn" onclick="goBack()"><img src="assets\images\back.png" alt="Back"></button>

  <script src="./assets/js/goBack.js"></script>
  
</body>

</html>