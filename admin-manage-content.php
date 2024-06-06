<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Support Service Estimations</title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
<h2>Support Service Estimations</h2>
<table>
    <tr>
        <th>Estimation ID</th>
        <th>Support Type</th>
        <th>Estimation</th>
    </tr>
    <?php
    // Подключение к базе данных
    include 'app/database/connectDB.php';

    // SQL-запрос для получения оценок службы поддержки
    $sql = "SELECT * FROM support_service";
    $stmt = $connection->query($sql);

    // Проверка наличия оценок
    if ($stmt->rowCount() > 0) {
        // Вывод каждой оценки в виде строки таблицы
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['id_user'] . '</td>';
            echo '<td>' . $row['support'] . '</td>';
            echo '<td>' . $row['estimation'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="3">No estimations found</td></tr>';
    }
    ?>
</table>
</body>
</html>
