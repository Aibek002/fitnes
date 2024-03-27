<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-container {
            text-align: center;
        }

        .btn-container button {
            padding: 10px 20px;
            margin: 10px;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Edit User</h2>
        <form action="admin-user-update-information.php?id=<?php echo $_GET['id_user']; ?>" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $userData['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname" value="<?php echo $userData['surname']; ?>" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="view_users.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>

        <?php
        if (isset($successMessage)) {
            echo '<div class="alert alert-success">' . $successMessage . '</div>';
        }

        // Подключение к базе данных
     
        ?>

    </div>

</body>

</html>