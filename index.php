<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calendar</title>
<!-- Подключение Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        padding: 20px;
    }

    .row {
        margin-bottom: 10px;
    }

    .col {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    .today {
        background-color: #007bff;
        color: #fff;
    }
</style>
</head>
<body>

<div class="container">
    <div class="row">
        <?php
        // Определение текущего дня недели и формирование массива дней
        $currentDayOfWeek = date('N') - 1; // 1 - понедельник, ..., 7 - воскресенье
        $daysOfWeek = array();
        
        // Заполнение массива дней недели, начиная с текущего дня
        for ($i = 0; $i < 7; $i++) {
            $day = date('D', strtotime('this week +' . $i . ' days'));
            $daysOfWeek[] = $day;
        }
        
        // Отображение ячеек таблицы
        foreach ($daysOfWeek as $day) {
            $class = ($day == date('D')) ? 'today' : ''; // Добавляем класс 'today' для сегодняшнего дня
            echo '<div class="col ' . $class . '">' . $day . ' <strong>' . date('d', strtotime('this week +' . array_search($day, $daysOfWeek) . ' days')) . '</strong></div>';
        }
        ?>
    </div>
</div>

<!-- Подключение Bootstrap JS (необходимо для работы некоторых компонентов Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
