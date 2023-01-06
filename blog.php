<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="js.js"></script>
</head>
<body>
<header>
    <a href="index.php" class="esc"><</a>
    <h1 id="HeaderText">Цей блог зроблено з душею, щоб кожен зміг висловити власні думки.</h1>
    <?php  if(@$_COOKIE['email']): ?>
    <a href="cabinet.php"><img src="img/cabinet.jpg" alt="Ваш кабінет" id="cabinet"></a>
    <?php else: ?>
    <a href="index.php" id="login">Увійти</a>
    <?php endif ?>
</header>

<div>
    <?php  if(@$_COOKIE['email']): ?>
    <a class="CreateArticle" href="CreateArticle.php">Створити статтю</a>
    <?php endif ?>
    <br>
    <br>
    <br>
    <hr>
</div>
<?php
$dns='mysql:host=localhost;dbname=blog';
$pdo= new PDO($dns, 'root','root');

$email=$_COOKIE['email'];
$queryId=$pdo ->query("SELECT `id` FROM `users` WHERE email='$email'");
while ($row=$queryId->fetch(PDO::FETCH_OBJ)){
    $TrueId=$row->id;
}

echo '<ul>';
    $query=$pdo ->query('SELECT * FROM `article`');
    while ($row=$query->fetch(PDO::FETCH_OBJ)){
    echo '<a href="FullArticle.php ? id='.$row->id.'" id="DecorationNone">'.'<li class="ArticleList">'.$row->name. '<br>' .$row->theme.'';
        if($row->Userid===$TrueId) {
            echo '<a href="delete.php? id='.$row->id.'"><button id="ArticleButton">Видалити</button></a></li>' . '</a>';
        }
    }
    echo '</ul>';
    ?>
</body>
</html>
