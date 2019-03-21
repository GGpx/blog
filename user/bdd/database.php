<?php

/*
 * Ce fichier contient toutes les fonctions en lien avec la base de données
 * - creation d'objet dans la base de données
 * - modification d'objet dans la base de données
 * - suppression d'objet dans la base de données
 * - recupération d'objet dans la base de données
 * ...
 */

function getDBH()
{
    try {
        return new PDO(DSN, USER, PASSWORD);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

/****************************************
 *
 * LES ARTICLES
 *
 ****************************************/

function getAllArticle()
{
    $dbh = getDBH();
    $req = $dbh->prepare('SELECT * FROM user ORDER BY id DESC');
    $req->setFetchMode(PDO::FETCH_CLASS, 'User');
    $req->execute();

    return $req->fetchAll();
}
