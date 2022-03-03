<?php
session_start();
require('../inc/fonction.php');
require('../inc/pdo.php');
include('inc/header.php');

        if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
        }
        $sql = "SELECT * FROM blog_articles WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id',$id, PDO::PARAM_INT);
        $query->execute();
        $articles = $query->fetchAll();
        // debug($articles);
    ?>
        <section id="articles">
            <?php foreach ($articles as $article) { ?>
                <div class="one_article" id="ancre-<?= $article['id']; ?>">
                    <div>
                        <hr>
                        <h2><?php echo $article['title']; ?></h2>
                        <p><?php echo $article['content']; ?></p>
                        <p><?php echo $article['created_at']; ?></p>
                        <hr>
                    </div>
                </div>
            <?php } ?>
        </section>
<?php



include('inc/footer.php');
