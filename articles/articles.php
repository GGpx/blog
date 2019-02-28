<?php

// include_once 'save_article.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <script src="js/art.js"></script>
    <script src="js/title.js"></script>
    <title>Article</title>
</head>

<body>

    <label>Titre : </label>
    <input type="text" id="title"> <!-- PARTIR QUI EST ENVOYER EN REQUETE AJAX A LA BASE DE DONNéE-->
    <label>Article : </label>
    <textarea id="article" cols="50" rows="10"></textarea>
    <input type="submit" onclick="titre() , art()">

    <!-- REQUETE POUR AFFICHER LES TITRES DES ARTICLES -->
<?php

$bdd = new PDO("mysql:dbname=blog", 'root', '0000');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$requete = $bdd->prepare("SELECT title FROM articles");
$requete->execute();
$titles = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach ($titles as $key => $title): ?>

    <ul id="titre"> <!-- ID POUR L'AJOUT D'UNE LIGNE EN RETOUR DE LA REQUETE -->
        <li>
            <?=$title['title']?>
        </li>
    </ul>

<?php endforeach;

// REQUETE POUR AFFICHER L'ARTICLE

$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("SELECT article FROM articles");
$request->execute();
$articles = $request->fetchAll(PDO::FETCH_ASSOC);

foreach ($articles as $key => $article):
?>
    <div id="art">
        <p> <?=$article['article']?> </p>
    </div>
    <?php endforeach?>
</body>

</html>