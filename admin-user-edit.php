<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Management</title>
<!-- Подключение Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* style.css */
table {
    width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
}

th, td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
}

.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    margin-left: 5px;
}

</style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">User Management</h1>
    <?php
    // Подключение к базе данных
    include './app/database/connectDB.php';

    // Запрос к таблице data_registration
    $sql = "SELECT id_user, name, surname FROM data_registration";
    $stmt = $connection->query($sql);

    // Проверка наличия данных
    if ($stmt->rowCount() > 0) {
        echo '<table class="table">';
        echo '<thead><tr><th>Name</th><th>Surname</th><th>Action</th></tr></thead>';
        echo '<tbody>';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['surname'] . '</td>';
            echo '<td>';
            echo '<button class="btn btn-danger delete-btn" data-id="' . $row['id'] . '">Delete</button>';
            echo '<a href="admin-user-update.php" ><button class="btn btn-primary edit-btn" data-id="' . $row['id'] . '">Edit</button></a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>No users found</p>';
    }
    ?>
</div>

<!-- Подключение Bootstrap JS (необходимо для работы некоторых компонентов Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
