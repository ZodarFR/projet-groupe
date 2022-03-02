<?php
require('inc/fonction.php');
require('inc/pdo.php');
include('inc/header.php');
?>
<div class="wrap">

<?php
        if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
        }
        $sql = "SELECT * FROM blog_articles WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id',$id, PDO::PARAM_INT);
        $query->execute();
<<<<<<< HEAD
        $articles = $query->fetchAll();
        debug($articles);
=======
        $articles = $query->fetchall();
        // debug($articles);
>>>>>>> 9ee7c82b885cbd892a507f8e84bc4f26b5a22ebf
    ?>
        <section id="articles">
            <?php foreach ($articles as $article) { ?>
                <div class="one_article" id="ancre-<?= $article['id']; ?>">
                    <div>
                        <hr>
<<<<<<< HEAD
                        <h2><a href="detail-article.php?id=<?= $article['id']; ?>"><?php echo $article['title']; ?></a></h2>

=======
                        <h2><?php echo $article['title']; ?></h2>
                        <p><?php echo $article['content']; ?></p>
                        <p><?php echo $article['created_at']; ?></p>
                    
>>>>>>> 9ee7c82b885cbd892a507f8e84bc4f26b5a22ebf
                        <hr>
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>

<?php


include('inc/footer.php');
