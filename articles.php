<?php

// include_once 'save_article.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="art.js"></script>
    <script src="title.js"></script>
    <title>Article</title>
</head>
<body>

    <label>Titre : </label>
    <input type="text" id="title">
    <label>Article : </label>
    <textarea id="art" cols="50" rows="10"></textarea>
    <input type="submit" onclick="cli()">


<?php
$bdd = new PDO("mysql:dbname=blog", 'root', '0000');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$requete = $bdd->prepare("SELECT title FROM articles");
$requete->execute();
$titles = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($titles as $key => $title){ ?>


    <ul id="titl">
        <li><?=$title['title']?></li>
    </ul>
    

<?php } ?>

<!-- REQUETE POUR AFFICHER L'ARTICLE -->
<?php
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("SELECT * FROM articles");
$request->execute();
$articles = $request->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($articles as $key => $article) : ?>

    <ul id="arts">
        <li><?= $article['article']?></li>
    </ul>

<?php endforeach ?>
</body>
</html>