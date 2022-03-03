
<?php  
if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
}
        $sql = "SELECT * FROM blog_comments";
        $query = $pdo->prepare($sql);
        
        $query->execute();
        $comments = $query->fetchAll();
        debug($comments);
    ?>
        <section id="comments">
            <?php foreach ($comments as $comment) { ?>
                <div class="one_article" id="ancre-<?= $comment['id']; ?>">
                    <div>
                        <hr>
                        <h2><?php echo $comment['id']; ?></h2>
                        <hr>
                    </div>
                </div>
            <?php } ?>
        </section