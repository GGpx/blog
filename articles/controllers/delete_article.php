<?php
include_once '../json/objet_articles.php';


// -----------------------------------VARIABLE POUR VERIFIER SI LA VARIABLE EST VIDE OU PAS 
$id = (!empty($_POST['id'])) ? $_POST['id'] : '' ;

// -----------------------------------REQUÊTE POUR AJOUTER UN COMMENTAIRE
$connect = new PDO("mysql:dbname=blog", 'root', '0000');
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connect->prepare("DELETE FROM articles
                            WHERE id = $id");
$request->execute();

// UTILISATION DES OBJETS EN JSON
$titles_articles = new Articles;
$titles_articles -> id = $id;

// ECHO POUR ENCODER L'OBJET EN JSON
echo(json_encode($titles_articles));

?>