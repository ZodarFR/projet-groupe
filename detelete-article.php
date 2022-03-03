<?php
require('inc/pdo.php');
require('inc/fonction.php');
require('inc/request.php');


if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $article = getArticleById($id);
    if(empty($article)) {
        die('404');
    }
} else {
    die('404');
}
$sql = "DELETE FROM blog_articles WHERE id = :id";
$query = $pdo->prepare($sql);
$query->bindValue(':id',$id, PDO::PARAM_INT);
$query->execute();

header('Location: index.php');
