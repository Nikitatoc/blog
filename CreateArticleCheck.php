<?php
$name=$_POST['name'];
$theme=$_POST['theme'];
$article=$_POST['article'];
$authors=$_POST['authors'];
$id=$_GET['id'];

if($authors==''){
    $authors='не вказано';
}
$error='';
if($name==''){
    $error= 'Поле name повинно бути заповненим ';
}
if($theme==''){
    $error= 'Поле theme повинно бути заповненим';
}
if($article==''){
    $error= 'Поле article повинно бути заповненим';
}

if($error=='') {
    $dns='mysql:host=localhost;dbname=blog';
    $pdo= new PDO($dns, 'root','root');

    $sqlCommand = "UPDATE `article` SET name =:nick , theme=:theme, article=:article, authors=:authors  WHERE id='$id'" ;
    $query = $pdo->prepare($sqlCommand);
    $query->execute(['nick' => $name, 'theme'=>$theme, 'article' => $article, 'authors' => $authors]);

    header('location:cabinet.php');

}
echo $error;
