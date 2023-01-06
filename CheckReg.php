<?php
$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['password'];
$password2=$_POST['password2'];





$errors='';
if($email==''){
    $errors="Поле email є обов'язковим";

}
if($name==''||isset($name)<3){
    $errors="Поле name є обов'язковим і повинно бути більш за 3 символа";

}
if($password==''||isset($password)<5){
    $errors="Поле password є обов'язковим і має бути більш за 5 символів";

}
if($password!==$password2){
    $errors="Паролі не співпадають";
}
if($errors==''){
    $dns='mysql:host=localhost;dbname=blog';
    $pdo= new PDO($dns, 'root','root');

    $sqlCommand = 'INSERT INTO users( email, name, password) VALUES ( :email, :nick, :password)';
    $query = $pdo->prepare($sqlCommand);
    $query->execute(['email'=>$email, 'nick'=>$name, 'password'=>$password]);

    header('location:index.php');
}


echo $errors;
