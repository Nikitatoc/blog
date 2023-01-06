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
    <a href="cabinet.php" class="esc"><</a>
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

$id=$_GET['id'];
$queryName=$pdo ->query("SELECT * FROM `article` WHERE id='$id'");
while ($row=$queryName->fetch(PDO::FETCH_OBJ)){
    $name=$row->name;
    $theme=$row->theme;
    $article=$row->article;
    $authors=$row->authors;
}

echo $id;
?>
<form method="post" action='editArticleCheck.php? id=<?php echo $id ?>'>
    <input type="text" name="name" placeholder="Назва статті" id="CreateName" value="<?php echo $name ?>">
    <br>
    <input type="text" name="theme" placeholder="Тема статті" id="CreateTheme" value="<?php echo $theme ?>">
    <br>
    <textarea name="article" placeholder="ваша стаття" rows="30" cols="100" id="CreateArt" ><?php echo $article ?></textarea>
    <br>
    <input type="text" name="authors" placeholder="Вкажіть авторов статті" id="CreateAuthors" value="<?php echo $authors ?>">
    <br>
    <button type="submit" class="LoginButton">Оновити</button>
</form>



</body>
