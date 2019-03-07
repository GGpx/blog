<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="js/ajout_user.js"></script>
    <script src="js/sup_user.js"></script>
    <script src="js/voir_user.js"></script>
    <title>Ajouter un utilisateur</title>

    <style>
        div{
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            width:600px;
            height: auto;
            border: 2px solid black;
        }

        h2{
            text-decoration: underline;
        }

    </style>

</head>
<body>
    <h1>Bienvenu sur mon super blog !</h1>

    <label>Nom :</label>
    <input type="text" id="nom"><br><br>


    <label>Prénom :</label>
    <input type="text" id="prenom"><br><br>


    <label>Mail :</label>
    <input type="email" id="email"><br><br>

    <input type="submit" value="Valider" onclick="createUser()">


    <h2>Liste des utilisateurs :</h2>
    <div id="list_user">
        <?php

include_once 'objet/class_user.php';

$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connec->prepare('SELECT * FROM user ORDER BY id DESC');

$request->execute();
$users = $request->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $key => $user):
?>
        <div id="<?=$user['id']?>">
            <h6>ID :</h6>
            <p> <?=$user['id']?> </p>

            <h6>Nom :</h6>
            <p> <?=$user['nom']?> </p>

            <h6>Prenom :</h6>
            <p> <?=$user['prenom']?> </p>

            <h6>Mail :</h6>
            <p> <?=$user['email']?> </p>

            <input type="submit" value="Voir" onclick="showUser()"><br><br>
            <input type="submit" value="Modifier" onclick="updateUser()"><br><br>
            <input type="submit" value="Supprimer" onclick="deleteUser(<?=$user['id']?>)"><br><br>
        </div>
    <?php endforeach?>
    </div>

</body>
</html>
