<?php
include_once '../objet/class_user.php';


// -----------------------------------VARIABLE POUR VERIFIER SI LA VARIABLE EST VIDE OU PAS 
$id = (!empty($_POST['id'])) ? $_POST['id'] : '' ;

// -----------------------------------REQUÊTE POUR AJOUTER UN COMMENTAIRE
$connect = new PDO("mysql:dbname=blog", 'root', '0000');
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connect->prepare("DELETE FROM user
                            WHERE id = $id");
$request->execute();

// UTILISATION DES OBJETS EN JSON
$user = new User;
$user -> id = $id;

// ECHO POUR ENCODER L'OBJET EN JSON
echo(json_encode($user));

?>