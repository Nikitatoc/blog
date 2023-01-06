<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="js.js"></script>
</head>
<header>
    <a href="blog.php" class="esc"><</a>
    <h1 id="HeaderText">Цей блог зроблено з душею, щоб кожен зміг висловити власні думки.</h1>
    <?php  if(@$_COOKIE['email']): ?>
        <a href="cabinet.php"><img src="img/cabinet.jpg" alt="Ваш кабінет" id="cabinet"></a>
    <?php else: ?>
        <a href="index.php" id="login">Увійти</a>
    <?php endif ?>
</header>

<p id="cabinetText">Тут будуть видображатися всі ваші статті, щоб ви могли змінити чи видалити їх</p>
<?php
$dns='mysql:host=localhost;dbname=blog';
$pdo= new PDO($dns, 'root','root');



$email=$_COOKIE['email'];
$queryId=$pdo ->query("SELECT `id` FROM `users` WHERE email='$email'");
while ($row=$queryId->fetch(PDO::FETCH_OBJ)) {
    $TrueId = $row->id;
}

$query = $pdo->query("SELECT * FROM `article` WHERE `Userid`= '$TrueId'");
while ($row = $query->fetch(PDO::FETCH_OBJ)) {
    echo '<a href="editArticle.php ? id=' . $row->id . '" id="DecorationNone">' .
            '<li class="ArticleList">' . $row->name .';
     <a href="delete.php? id=' . $row->id . '"><button id="ArticleButton">Видалити</button></a></li>' . '</a>';
    }

?>
