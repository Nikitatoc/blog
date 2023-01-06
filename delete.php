<?php
$deleteId=$_GET['id'];

$dns='mysql:host=localhost;dbname=blog';
$pdo= new PDO($dns, 'root','root');

$sqlCommand='DELETE FROM `article`WHERE `id`=?';
$query=$pdo->prepare($sqlCommand);
$query->execute([$deleteId]);

header('location:blog.php');
