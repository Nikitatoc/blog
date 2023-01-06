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
    <a href="blog.php" class="esc"><</a>
    <h1 id="HeaderText">Цей блог зроблено з душею, щоб кожен зміг висловити власні думки.</h1>
    <?php  if(@$_COOKIE['email']): ?>
        <a href="cabinet.php"><img src="img/cabinet.jpg" alt="Ваш кабінет" id="cabinet"></a>
    <?php else: ?>
        <a href="index.php" id="login">Увійти</a>
    <?php endif ?>
</header>


<?php
$dns='mysql:host=localhost;dbname=blog';
$pdo= new PDO($dns, 'root','root');

$id= $_GET['id'];
$query=$pdo ->query("SELECT * FROM `article` WHERE `id`= $id");
while ($row=$query->fetch(PDO::FETCH_OBJ)){
        echo "<h1 class='ArticleName'>$row->name</h1>";
        echo "<h2 class='ArticleName'>$row->theme</h2>";
        echo "<p id='article'>$row->article</p>";
        echo '<p class="authors">автори:</p>';
        echo "<p class='authors'>$row->authors</p>";
}


?>
</body>
</html>
