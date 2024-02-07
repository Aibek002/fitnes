<?php
include 'insert.php';

if(isset($_POST['name'])){
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $email=$_POST['email'];
    $pass=password_hash( $_POST['password'],PASSWORD_DEFAULT);

    $data_register=[
        'name'=>$name,
        'surname'=>$surname,
        'email'=>$email,
        'password'=>$pass,
    ];  
    // echo $data_register;
    insert('data_registration',$data_register);
}
?>