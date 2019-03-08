<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <script src="js/ajout_user.js"></script>
    <script src="js/sup_user.js"></script>
    <script src="js/update_user.js"></script>
    <script src="js/voir_user.js"></script>
    <title>Ajouter un utilisateur</title>

<!-- CSS -->
    <style>
        .yeah{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            width: auto;
            height: auto;
            border: 2px solid black;
        }

        h6{
            padding: 1%;
        }

        h2{
            text-decoration: underline;
        }

    </style>

</head>
<body>


<!-- 
*
*
 *       DIV AVEC LES CHAMPS QUE L'ONT RéCUPèRE POUR ENREGISTRER DANS LA BDD
*
*
-->
    <div id="champs">
        <h1>Bienvenu sur mon super blog !</h1>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" required><br><br>


        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" required><br><br>


        <label for="email">Mail :</label>
        <input type="email" id="email" required><br><br>

        <input type="submit" value="Valider" onclick="createUser()">
    </div>


    <h2>Liste des utilisateurs :</h2>

<!-- 
*
*
 *       DIV QUI PERMET D'AFFICHER LES INFORMATIONS DE LA BDD
*
*
 -->
    <div id="list_user">


        <?php


// CODE POUR INCLURE LE FICHIER PHP AVEC LES OBJETS DE LA CLASS USER
include_once 'objet/class_user.php';


/*
*
*
*       CONNECTION à LA BDD
*
*/
$connec = new PDO("mysql:dbname=blog", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



//      REQUÊTE QUI SELECTIONNE DES éléMENTS DE LA BDD
$request = $connec->prepare('SELECT * 
                            FROM user ORDER 
                            BY id DESC');
$request->execute();



// ASSIGNIATION DE LA VARIABLE $USERS A LA REQUÊTE EXECUTER AVANT 
$users = $request->fetchAll(PDO::FETCH_ASSOC);


// BLOUCLE FOREACH POUR RéCUPERER LES DONNéES DE LA BDD
foreach ($users as $key => $user):
?>



<!-- // 
*
*
 *           DIV QUI PERMET D'AFFICHER LES INFORMATIONS DE LA BDD
  *          
   *         
 -->

        <div class="yeah" id="<?=$user['id']?>">

<!-- // POUR AFFICHER L'ID DES UTILISATEURS  -->
            <h6>ID :</h6>
            <p> <?=$user['id']?> </p>

<!-- // POUR AFFICHER LE NOM DES UTILISATEURS  -->
            <h6>Nom :</h6>
            <p> <?=$user['nom']?> </p>

<!-- // POUR AFFICHER LE PRENOM DES UTILISATEURS  -->
            <h6>Prenom :</h6>
            <p> <?=$user['prenom']?> </p>

<!-- // POUR AFFICHER LE EMAIL DES UTILISATEURS  -->
            <h6>Mail :</h6>
            <p> <?=$user['email']?> </p>


            <input type="hidden" id="id_user" name="id_user"/>

<!-- 
*
*
*           LES TROIS BOUTONS POUR VOIR/MODIFIER/SUPPRIMER LES UTILISATEURS
*
* -->
            <input type="submit" value="Voir" onclick="showUser(<?=$user['id']?>)"><br><br>
            <input type="submit" value="Modifier" onclick="updateUser(<?=$user['id']?>)"><br><br>
            <input type="submit" value="Supprimer" onclick="deleteUser(<?=$user['id']?>)"><br><br>
        </div>

        <!-- FIN DE LA BOUCLE FOREACH -->
    <?php endforeach?>
    </div>

</body>
</html>
