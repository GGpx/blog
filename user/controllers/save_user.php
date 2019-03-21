<?php
include_once '../objet/class_user.php';

// -----------------------------------VARIABLE POUR VERIFIER SI LA VARIABLE EST VIDE OU PAS

$nom = (!empty($_POST['nom'])) ? $_POST['nom'] : '';
$prenom = (!empty($_POST['prenom'])) ? $_POST['prenom'] : '';
$email = (!empty($_POST['email'])) ? $_POST['email'] : '';

// -----------------------------------REQUÊTE POUR AJOUTER UN COMMENTAIRE
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare("INSERT INTO user (nom , prenom, email) VALUES ('$nom' , '$prenom', '$email')");
$request->execute();

// VARIABLE POUR RéCUPéRER LE DERNIER ID ENVOYER AU SERVEUR
$id = $connec->lastInsertId();

// UTILISATION DES OBJETS EN JSON
$user = new User;
$user->id = $id;
$user->nom = $nom;
$user->prenom = $prenom;
$user->email = $email;

// ECHO POUR ENCODER L'OBJET EN JSON
echo (json_encode($user));
