<?php

include_once '../json/objet_articles.php';

// -----------------------------------VARIABLE POUR VERIFIER SI LA VARIABLE EST VIDE OU PAS 

// $id = (!empty($_POST['id'])) ? $_POST['id'] : '' ;
$title = (!empty($_POST['title'])) ? $_POST['title'] : '' ;
$article = (!empty($_POST['article'])) ? $_POST['article'] : '' ;

// -----------------------------------REQUÊTE POUR AJOUTER UN COMMENTAIRE
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("INSERT INTO articles (title , article) VALUES ('$title' , '$article')");
$request->execute();

$id = $connec->lastInsertId();

$title_article = new Articles;
$title_article->id = $id;
$title_article->title = $title;
$title_article->article = $article;

echo (json_encode($title_article));

?>