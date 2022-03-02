<?php
require('inc/fonction.php');


if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    //////////////
    // WARNING => dans la vrai vie nous ferions une request à la BDD
    //////////////
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
    if(empty($currentMovie)) {
        die('404');
    }
} else {
    die('404'); // redirection
}
include('inc/header.php'); ?>
    <div class="wrap">
        <?php paginationMovie($currentIndex,$movies); ?>
        <?php include('view/bigmovie.php'); ?>
        <?php paginationMovie($currentIndex,$movies); ?>
    </div>
<?php include('inc/footer.php');