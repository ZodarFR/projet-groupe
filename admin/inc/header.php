<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription/Connexion</title>
    <link rel="stylesheet" href="./asset/css/style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <?php if(isLogged()) { ?>
                <p>Logged</p>
                <li><a href="../logout.php">Déconnexion</a></li>
                <?php if(isLoggedAdmin()) { ?>
                    <li><a href="admin/add-article.php">Admin</a></li>
                <?php } ?>
            <?php } else { ?>
                
            <?php } ?>
        </ul>
    </nav>
</header>