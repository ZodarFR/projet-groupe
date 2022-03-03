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
        // ////////////////////Add Comments/////////////////////////
        
        $errors = [];

    if(!empty($_POST['submitted'])) {
        $content = trim(strip_tags($_POST['content']));
        $errors = validText($errors, $content, 'content', 3, 120);
            if(count($errors) === 0) {
                $sql = "INSERT INTO blog_comments (content, created_at,status)
                        VALUES (:content, NOW(),'publish')";
                $query = $pdo->prepare($sql);
                $query->bindValue(':content', $content, PDO::PARAM_STR);
                $query->execute();
            // header('Location: ../index.php');
            }
    }




?>
<?php if(isLogged()) { 
    ?>
    <div class="commentaire">
        <form action="" method="post" novalidate>
            <label for="title">Ajouter un commentaire</label>
            <input type="text" name="content" id="content" value="<?php if(!empty($_POST['content'])) {echo $_POST['content'];} ?>">
            <span class="error"><?php spanError($errors,'content'); ?></span>

            <input type="submit" name="submitted" value="Envoyer">
        </form>

    </div>
<?php }  ?>


<?php

// commentaire

$errors = [];

if(!empty($_POST['submitted'])) {
    $content = trim(strip_tags($_POST['content']));
    $id_article = trim(strip_tags($_POST['id_article']));

    $errors = validText($errors, $content, 'content', 3, 120);

    if(count($errors) === 0) {
        $sql = "INSERT INTO blog_comments (id_article, content, created_at, status)
                VALUES (:id_article, :content, NOW(),'new')";
        $query = $pdo->prepare($sql);
        $query->bindValue(':content', $content, PDO::PARAM_STR);
        $query->bindValue(':id_article', $id_article, PDO::PARAM_STR);

        $query->execute();
        // header('Location: index.php');
    }
}


?>
  <div class="wrapform">
      <form action="" method="post" novalidate>
          <input type="text" name="content" id="content" value="<?php if(!empty($_POST['content'])) {echo $_POST['content'];} ?>">
          <span class="error"><?php spanError($errors,'content'); ?></span>



          <input type="submit" name="submitted" value="Ajouter un commentaire">
      </form>
  </div>


<?php include('inc/footer.php');
