<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_input'];
    $command = escapeshellcmd("python ml1.py $id");
    $result = shell_exec($command);
    $result=7;
    echo $result . "/";

}
?>
