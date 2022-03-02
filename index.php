<?php
session_start();
require('inc/pdo.php');
require('inc/fonction.php');
require('inc/request.php');

$errors = array();



include('inc/header.php'); ?>
    <div class="wrap">
        <h2>Home Page</h2>
<?php
        $sql = "SELECT * FROM blog_articles";
        $query = $pdo->prepare($sql);
        $query->execute();
        $articles = $query->fetchAll();
    ?>
        <section id="reves">
            <?php foreach ($articles as $article) { ?>
                <div class="one_article" id="ancre-<?= $article['id']; ?>">
                    <div>
                        <hr>
                        <h2><?php echo $article['title']; ?></h2>
                        <p>contenu: <?php echo $article['content']; ?></p>
                        <p>date: <?php echo ($article['created_at']); ?></p>
                        <hr>
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>
<?php include('inc/footer.php');
