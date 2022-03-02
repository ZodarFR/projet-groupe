<?php
require('inc/fonction.php');
require('inc/pdo.php');


if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    //////////////
    // WARNING => dans la vrai vie nous ferions une request à la BDD
    //////////////
    $sql = "SELECT * FROM blog_articles";
    $query = $pdo->prepare($sql);
    $query->execute();
    $articles = $query->fetch();

    foreach($articles as $key => $article) {
        if($id === $article['id']){
            $currentarticle = $article;
            $currentIndex = $key;
            break;
        }
    }
    //////////////
    // END WARNING
    //////////////
    if(empty($currentarticle)) {
        die('404');
    }
} else {
    die('404'); // redirection
}
include('inc/header.php'); ?>
    <div class="wrap">
        
        <?php include('view/bigarticle.php'); ?>
        
    </div>
<?php include('inc/footer.php');