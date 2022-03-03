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
        $sql = "SELECT * FROM blog_articles WHERE status = 'publish'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $articles = $query->fetchAll();
        debug($articles);
    ?>
        <br>
        <section id="reves">
            <?php foreach ($articles as $article) { ?>
                <div class="one_article" id="ancre-<?= $article['id']; ?>">
                    <div>
                        <hr>
                        <h2><a href="single.php?id=<?= $article['id']; ?>"><?php echo $article['title']; ?></a></h2>
                        <?php if(isLogged()) { ?>

                            <?php if(isLoggedAdmin()) { ?>
                                <a href="detelete-article.php?id=<?= $article['id']; ?>">Detelete</a>
                            <?php } ?>
                        <?php } else { ?>

                        <?php } ?>
                        <hr>
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>
<?php include('inc/footer.php');
