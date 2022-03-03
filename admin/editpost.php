<?php
require('../inc/pdo.php');
require('inc/fonction.php');
require('inc/request.php');
$errors = [];
if(!empty($_POST['submitted'])) {
    $title = trim(strip_tags($_POST['title']));
    $content  = trim(strip_tags($_POST['content']));



    $errors = validText($errors, $title, 'title', 3, 120);
    $errors = validText($errors, $content, 'content', 3, 255);




    $errors = validText($errors, $title, 'title', 3, 120);
    $errors = validText($errors, $content, 'content', 3, 255);




    if(count($errors) === 0) {
        $sql = "INSERT INTO blog_articles (title, content, created_at,status)
                VALUES ( :title,:content, NOW(),'publish')";
        $query = $pdo->prepare($sql);
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':content', $content, PDO::PARAM_STR);


        $query->execute();
        header('Location: index.php');
    }
}


include('inc/header.php'); ?>
    <div class="wrapform">
        <form action="" method="post" novalidate>
            <label for="title">title</label>
            <input type="text" name="title" id="title" value="<?php if(!empty($_POST['title'])) {echo $_POST['title'];} ?>">
            <span class="error"><?php spanError($errors,'title'); ?></span>

            <label for="content">Votre article</label>
            <input type="text" name="content" id="content" value="<?php if(!empty($_POST['content'])) {echo $_POST['content'];} ?>">
            <span class="error"><?php spanError($errors,'content'); ?></span>


            <input type="submit" name="submitted" value="Ajouter un article">
        </form>
    </div>



<?php include('inc/footer.php');
