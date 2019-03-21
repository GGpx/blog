<?php
include_once 'json/objet_articles.php';
include_once '../user/objet/response.php';
include_once '../user/objet/responseFailed.php';
include_once '../user/objet/responseSucess.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="js/create_title_art.js"></script>
    <script src="js/show_title_art.js"></script>
    <script src="js/change_title_art.js"></script>
    <script src="js/delete_title_art.js"></script>


    <title>Articles</title>

    <style>
        .div_bdd{
            border: 2px solid black;
            width: 50%;
        }
    </style>
</head>

<body>

    <!-- POUR LA BARRE DE NAVIGATION (nav.php) -->
    <?php include_once '../nav.php'?>

    <a href="../user/user.php">Ajouter un utilisateur</a>

    <div id="champs"></div>
    <!-- PARTIR QUI EST ENVOYER EN REQUETE AJAX A LA BASE DE DONNéE-->
    <label>Titre : </label>
    <input type="text" id="title">

    <!-- TEXTAREA POUR LES ARTICLES -->
    <label>Article : </label>
    <textarea id="article" cols="50" rows="10"></textarea>

    <!-- BOUTON QUI PERMET L'ENVOI DU TITRE ET DE L'ARTICLE -->
    <input type="submit" value="Valider" onclick="createTitle_art()">



<!-- DIV PARENT POUR AFFICHER LES TITRES ET ARTICLES DE LA BDD -->
    <div id="title_art">



<!--
*
**
**      REQUÊTE POUR AFFICHER LES TITRES DES ARTICLES
**
**
*
-->
<?php

$bdd = new PDO("mysql:dbname=blog", 'root', '0000');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$requete = $bdd->prepare("SELECT *
                        FROM articles
                        ORDER BY id DESC");
$requete->execute();
$titles_articles = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- BOUCLES POUR AFFICHER LES TITRES ET ARTICLES DE LA BDD -->
        <?php foreach ($titles_articles as $key => $title_article): ?>

<!--
 *
 **
 **
 **          REQUETE POUR AFFICHER LES ARTICLES
 **
 **
 -->

        <div class="div_bdd" id="<?=$title_article['id']?>">

            <p><?=$title_article['id']?></p>
            <p><?=$title_article['title']?></p>
            <p> <?=$title_article['article']?> </p>



            <!-- BOUTON POUR VOIR UN ARTICLE -->
            <input type="submit" value="Voir" onclick="showTitle_art(<?=$title_article['id']?>)">
            <input type="submit" value="Modifier" onclick="changeTitle_art(<?=$title_article['id']?>)">
            <input type="submit" value="Supprimer" onclick="deleteTitle_art(<?=$title_article['id']?>)">
            
        </div>

        <?php endforeach?>

        <!-- FIN DE LA DIV PARENT POUR AFFICHER LES TITRES ET ARTICLES DE LA BD -->
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>