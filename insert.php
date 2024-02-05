<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'settings.php';

    $connection= new mysqli($host ,  $user , $pass , $data);
    if($connection->connect_error) die('error blya');
    $query = " SELECT * FROM fitnes ";
    $result=$connection->query($query);
    if(!$result) die('error');
    $row=$result->num_rows;
    for($i=0;$i<$row; $i++){
            $result->data_seek($i);
            echo $result->fetch_assoc()['name'];
    }


?>
</body>
</html>