<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="js.js"></script>
</head>
<body>
<form method="post" action="CreateArticle.php">
    <input type="text" name="name" placeholder="Назва статті" id="CreateName">
    <br>
    <input type="text" name="theme" placeholder="Тема статті" id="CreateTheme">
    <br>
    <textarea name="article" placeholder="ваша стаття" rows="30" cols="100" id="CreateArt"></textarea>
    <br>
    <input type="text" name="authors" placeholder="Вкажіть авторов статті" id="CreateAuthors">
    <br>
    <button type="submit" class="LoginButton">Створити</button>
</form>
<?php
$name=$_POST['name'];
$theme=$_POST['theme'];
$article=$_POST['article'];
$authors=$_POST['authors'];
$email=$_COOKIE['email'];


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

if($error==''){
    $dns='mysql:host=localhost;dbname=blog';
    $pdo= new PDO($dns, 'root','root');

    $queryId=$pdo ->query("SELECT `id` FROM `users` WHERE email='$email'");
    while ($row=$queryId->fetch(PDO::FETCH_OBJ)){
        $id=$row->id;
    }


    $sqlCommand = 'INSERT INTO article(Userid, name, theme, article, authors) VALUES (:id, :nick, :theme, :article, :authors)';
    $query = $pdo->prepare($sqlCommand);
    $query->execute(['id' => $id, 'nick' => $name, 'theme'=>$theme, 'article' => $article, 'authors' => $authors]);

    header('location:blog.php');
}
echo '<div class="error">';
echo $error;
echo '</div>';
?>
</body>
</html>
