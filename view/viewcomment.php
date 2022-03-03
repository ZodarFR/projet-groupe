
<?php  
if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "SELECT * FROM blog_comments";
$query = $pdo->prepare($sql);

$query->execute();
$articles = $query->fetchAll();
// debug($articles);
?>
<section id="articles">
    <?php foreach ($articles as $article) { ?>
        <div class="one_article" id="ancre-<?= $article['id']; ?>">
            <div>
                <hr>
                <h2><?php echo $article['content']; ?></h2>
                <hr>
            </div>
        </div>
    <?php } ?>
</section>