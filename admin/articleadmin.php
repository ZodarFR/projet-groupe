<?php
$errors = array();

require('../inc/pdo.php');
require('../inc/fonction.php');
require('../inc/request.php');
include('inc/header.php'); ?>
    <div class="wrap">
<?php
        $sql = "SELECT * FROM blog_articles WHERE status = 'publish'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $articles = $query->fetchAll();
        
    ?>
        <br>
        <section id="reves">
            <?php foreach ($articles as $article) { ?>
                <div class="one_article" id="ancre-<?= $article['id']; ?>">
                    <div>
                        <hr>
                        <h2><a href="single.php?id=<?= $article['id']; ?>"><?php echo $article['title']; ?></a></h2> 
                        <a href="detelete-article.php?id=<?= $article['id']; ?>">Detelete</a>
                        <hr>
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>