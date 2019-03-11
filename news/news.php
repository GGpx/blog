<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>BLOG</title>
    <script src="main.js"></script>
</head>
<body>

    <h1>Article</h1>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa nihil similique repudiandae quaerat veniam ipsam
        ipsum omnis vel explicabo, suscipit sapiente neque itaque, consequuntur minus earum voluptas, commodi est harum!
        Impedit pariatur error tenetur nostrum vitae quasi similique, beatae, quam id eaque, odio dolorum incidunt.
        Nulla debitis ratione, accusantium reprehenderit fuga veritatis ea corrupti iure corporis possimus iste optio
        asperiores?
        Dolor, iure neque quis debitis enim reiciendis perferendis amet beatae laudantium. Nemo animi, distinctio
        inventore eaque, eius quae deleniti nam accusantium doloribus, quasi perferendis adipisci libero ad harum modi.
        Sequi!</p>

    <br>
        <label> Entrez un commentaire :</label>
    <br><br>
        <textarea id="comment" cols=100 rows=10></textarea>
        <input type="submit" id="bouton" value="Envoyer" onclick="oclick()">


<!-- REQUÊTE PHP POUR AFFICHER LA TABLE DE LA BASE DE DONNéE -->
<?php
    $connec = new PDO("mysql:dbname=blog", 'root', '0000');
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT * FROM commentaire");
    $request->execute();
    $commentaires = $request->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- POUR AFFICHER LES LIGNES DE LA TABLES -->
<?php foreach ($commentaires as $key => $commentaire) {?>

    <div id="comment_enregistrer">
        <ul>
            <li><?=$commentaire['date_create']?></li>
            <li><?=$commentaire['content']?></li>
        </ul>
    </div>

<?php } ?>
    <div id="date"></div>
    <div id="comment_new"></div>
</body>

</html>
