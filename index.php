<?php
$connection = new PDO('mysql:host=localhost;dbname=fitnes;charset=utf8;', 'root', '');

$name = 'Arailym';
$surname = 'Seidakhmet';
$kg = 55;

$parametr=[
    'n' => $name,
    's' => $surname,
    'k' => $kg,
];
$query=" INSERT  fitnes(name , surname , kg ) VALUE ( :n , :s , :k )";
$sql=$connection->prepare($query);
$sql->execute($parametr);


if ($result !== false) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . implode(" ", $connection->errorInfo());
}
?>
