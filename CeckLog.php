<?php
$email=$_POST['email'];
$password=$_POST['password'];

setcookie('email', $email, time() + 3600);


$errors='';
if($email==''){
    $errors="Поле email є обов'язковим";

}

if($password==''||isset($password)<5){
    $errors="Поле password є обов'язковим і має бути більш за 5 символів";

}
if($errors==''){
    $dns='mysql:host=localhost;dbname=blog';
    $pdo= new PDO($dns, 'root','root');

    $queryPassword=$pdo ->query("SELECT `password` FROM `users` WHERE email='$email'");
    while ($row=$queryPassword->fetch(PDO::FETCH_OBJ)){
        $TruePassword=$row->password;
    }

    if($password===$TruePassword){
        header('location:blog.php');
    }
    else{
        echo 'Введіть коректний логін чи пароль...';
    }
}

echo $errors;
