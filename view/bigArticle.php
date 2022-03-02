<?php
include('inc/header.php'); ?>

<h1><?php echo $currentMovie['title']; ?></h1>
<section id="films">
    <div class="movie">
        <?php echo getImgMovie($currentMovie); ?>
    </div>
</section>
<p>Année de sortie: <?php echo $currentMovie['year']; ?></p>
<p>Réalisateurs: <?php echo $currentMovie['directors']; ?></p>
<p>Notes: <?php echo $currentMovie['rating']; ?></p>
<p>Code Imdb: <?php echo $currentMovie['imdb_id']; ?></p>
