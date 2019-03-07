<?php
include_once '../objet/class_user.php';


// -----------------------------------VARIABLE POUR VERIFIER SI LA VARIABLE EST VIDE OU PAS 

$id = (!empty($_POST['id'])) ? $_POST['id'] : '' ;
// $nom = (!empty($_POST['nom'])) ? $_POST['nom'] : '' ;
// $prenom = (!empty($_POST['prenom'])) ? $_POST['prenom'] : '' ;
// $email = (!empty($_POST['email'])) ? $_POST['email'] : '' ;

// -----------------------------------REQUÊTE POUR AJOUTER UN COMMENTAIRE
$connect = new PDO("mysql:dbname=blog", 'root', '0000');
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connect->prepare("DELETE FROM user
                            WHERE id = $id");
$request->execute();
$user = new User;
$user -> id = $id;


echo(json_encode($user));