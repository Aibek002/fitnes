<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Feedback</title>
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
<h2>User Feedback</h2>
<table>
    <tr>
        <th>Email</th>
        <th>Feedback Title</th>
        <th>Feedback</th>
    </tr>
    <?php
    // Подключение к базе данных
    include 'app/database/connectDB.php';

    // SQL-запрос для получения фидбэков
    $sql = "SELECT email, feedbackTitle, feedback FROM feedback_users";
    $stmt = $connection->query($sql);

    // Проверка наличия фидбэков
    if ($stmt->rowCount() > 0) {
        // Вывод каждого фидбэка в виде строки таблицы
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['feedbackTitle'] . '</td>';
            echo '<td>' . $row['feedback'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="3">No feedback found</td></tr>';
    }
    ?>
</table>
</body>
</html>
