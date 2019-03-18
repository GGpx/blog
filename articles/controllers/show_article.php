<?php
include_once '../json/objet_articles.php';


// -----------------------------------VARIABLE POUR VERIFIER SI LA VARIABLE EST VIDE OU PAS 
$id = (!empty($_POST['id'])) ? $_POST['id'] : '' ;


// -----------------------------------REQUÊTE POUR AJOUTER UN COMMENTAIRE
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$request = $connec->prepare("SELECT * 
                            FROM articles 
                            WHERE id='$id';");
$request->setFetchMode(PDO::FETCH_CLASS, 'Articles');
$request->execute();

$title_article = $request->fetch();

// ECHO POUR ENCODER L'OBJET EN JSON
echo(json_encode($title_article));


?>