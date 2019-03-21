<?php
include_once '../objet/class_user.php';

// -----------------------------------VARIABLE POUR VERIFIER SI LA VARIABLE EST VIDE OU PAS

$id = (!empty($_POST['id'])) ? $_POST['id'] : '';
$nom = (!empty($_POST['nom'])) ? $_POST['nom'] : '';
$prenom = (!empty($_POST['prenom'])) ? $_POST['prenom'] : '';
$email = (!empty($_POST['email'])) ? $_POST['email'] : '';

// -----------------------------------REQUÊTE POUR AJOUTER UN COMMENTAIRE
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*
 *
 **
 **
 ** REQUÊTE POUR MODIFIER LES INFORMATIONS UTILISATEUR
 **
 **
 */
$request = $connec->prepare("UPDATE user
                            SET id='$id', nom='$nom', prenom='$prenom', email='$email'
                            WHERE id='$id'");

$request->execute();

// UTILISATION DES OBJETS EN JSON
$user = new User;
$user->id = $id;
$user->nom = $nom;
$user->prenom = $prenom;
$user->email = $email;

// ECHO POUR ENCODER L'OBJET EN JSON
echo (json_encode($user));
