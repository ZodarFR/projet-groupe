<?php 

require('../inc/pdo.php');
require('../inc/fonction.php');
require('../inc/request.php');

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "SELECT * FROM blog_comments WHERE id = :id";
$query = $pdo->prepare($sql);
$query->bindValue(':id',$id, PDO::PARAM_INT);
$query->execute();
$comments = $query->fetchAll();
debug($comments);

?>
    <section id="comments">
        <?php foreach ($comments as $comment) { ?>
            <div class="one_article" id="ancre-<?= $comment['id']; ?>">
                <div>
                    <h2>Number: <?= $comment['id']; ?></h2>
                    <p>Comment: <?= $comment['content']; ?></p>
                    <p>Date: <?= $comment['created_at']; ?></p>
                    <p>Status: <?= $comment['status']; ?></p>
                </div>
            </div>
        <?php } ?>
      
    </section