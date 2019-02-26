<?php
// if (isset($_POST['comment'])) {
//     $content = $_POST['comment'];
// } else {
//     $content= '';
// }

// -----------------------------------VARIABLE POUR VERIFIER SI LA VARIABLE EST VIDE OU PAS 
$content = (!empty($_POST['comment'])) ? $_POST['comment'] : '' ;

// -----------------------------------VARIABLE POUR EVITER QU'ELLE SOIT VIDE
$date_create = "2018-02-20";

// -----------------------------------REQUÊTE POUR AJOUTER UN COMMENTAIRE
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("INSERT INTO commentaire (date_create , content) VALUES ('$date_create' , '$content')");
$request->execute();