<?php
include_once '../objet/class_user.php';


// -----------------------------------VARIABLE POUR VERIFIER SI LA VARIABLE EST VIDE OU PAS 

$nom = (!empty($_POST['nom'])) ? $_POST['nom'] : '' ;
$prenom = (!empty($_POST['prenom'])) ? $_POST['prenom'] : '' ;
$email = (!empty($_POST['email'])) ? $_POST['email'] : '' ;

// -----------------------------------REQUÊTE POUR AJOUTER UN COMMENTAIRE
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("INSERT INTO user (nom , prenom, email) VALUES ('$nom' , '$prenom', '$email')");
$request->execute();
$user = new User;
$user -> nom = $nom;
$user -> prenom = $prenom;
$user -> email = $email;

echo(json_encode($user));