<?php
// if (isset($_POST['comment'])) {
//     $content = $_POST['comment'];
// } else {
//     $content= '';
// }

// -----------------------------------VARIABLE POUR VERIFIER SI LA VARIABLE EST VIDE OU PAS 

$title = (!empty($_POST['title'])) ? $_POST['title'] : '' ;
$article = (!empty($_POST['article'])) ? $_POST['article'] : '' ;

// -----------------------------------VARIABLE POUR EVITER QU'ELLE SOIT VIDE

// -----------------------------------REQUÊTE POUR AJOUTER UN COMMENTAIRE
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("INSERT INTO articles (title , article) VALUES ('$article' , '$title')");
$request->execute();

echo ($title);
echo ($article);