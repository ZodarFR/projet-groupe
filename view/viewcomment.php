
<?php 
if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "SELECT * FROM blog_articles WHERE id = :id";
$query = $pdo->prepare($sql);
$query->bindValue(':id',$id, PDO::PARAM_INT);
$query->execute();
$articles = $query->fetchAll();
debug($articles);


if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "SELECT * FROM blog_comments";
$query = $pdo->prepare($sql);

$query->execute();
$comments = $query->fetchAll();
debug($comments);
?>
<section id="articles">
    <?php foreach ($comments as $comment) { ?>
        <div class="one_article" id="ancre-<?= $comment['id']; ?>">
            <div>
                <hr>
                <h2><?php echo $comment['content']; ?></h2>
                <hr>
            </div>
        </div>
    <?php } ?>
</section>