<?php
$connection = new PDO('mysql:host=localhost;dbname=fitnes;charset=utf8;', 'root', '');

$name = 'Arailym';
$surname = 'Seidakhmet';
$kg = 55;
$query=" INSERT  fitnes(name , surname , kg ) VALUE ( '$name' , '$surname' , 55 )";

// $query = "INSERT INTO fitnes (name, surname, kg) VALUES ('$name', '$surname', $kg)";
$result = $connection->exec($query);

if ($result !== false) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . implode(" ", $connection->errorInfo());
}
?>
