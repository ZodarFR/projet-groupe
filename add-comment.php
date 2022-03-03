<?php
$errors = [];

if(!empty($_POST['submitted'])) {
    $content = trim(strip_tags($_POST['content']));
    
    $errors = validText($errors, $content, 'content', 3, 120);
    
        if(count($errors) === 0) {
            $sql = "INSERT INTO blog_comments (content, created_at,status, article_id)
                    VALUES (:content, NOW(),'publish',$id)";
            $query = $pdo->prepare($sql);
            $query->bindValue(':content', $content, PDO::PARAM_STR);
            
            $query->execute();
        // header('Location: ../index.php');
        }
}




?>

<?php if(isLogged()) { ?>
    <p>Logged</p>
        <div class="commentaire">
            <form action="" method="post" novalidate>
                <label for="title">Ajouter un commentaire</label>
                <input type="text" name="content" id="content" value="<?php if(!empty($_POST['content'])) {echo $_POST['content'];} ?>">
                <span class="error"><?php spanError($errors,'content'); ?></span>
                
                <input type="submit" name="submitted" value="Envoyer">
            </form>
        </div>
        <?php if(isLoggedAdmin()) { ?>

        <?php } ?>
<?php } else { ?>
            
        <?php } ?>