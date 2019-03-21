/* 
*
*
*       VOIR USER
*
*
*/

// FONCTION POUR VOIR UN UTILISATEURS
function showUser(id) {
    
    // VARIABLE POUR ENVOYER UNE REQUÊTE AU SERVEUR
    var xhr = new XMLHttpRequest();

    // ASSIGNIATION DE LA REQUÊTE à UNE FONCTION
    xhr.onreadystatechange = function () {

        // CONDITION POUR LA REQUÊTE
        if (xhr.readyState == 4 && xhr.status == 200) {

            // FONCTION QUI AFFICHE LES éLéMENTS DE LA PAGE ET QUI LES ENVOIES à LA BDD
            show(xhr.responseText);
        } else {
        }
    };

    // REQUêTE AVEC TOUT LES éLéMENTS à L'INTéRIEURE
    xhr.open('POST', 'controllers/show_user.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // VARIABLE QUI CONTIENT L'ID (UTILISATEUR) DE LA PAGE
    var data = 'id=' + id;
    xhr.send(data);
}

// FONCTION POUR AFFICHER LE NOM PRENOM ET @MAIL DE L'UTILISATEUR
function show(champ) {

    // VARIABLE USER QUI CONVERTI LA RéPONSE TEXT EN OBJET JSON
    var user = JSON.parse(champ);

    // VARIABLE QUI RéCUPèRE L'INPUT (NOM) DE LA PAGE
    var input = document.getElementById('nom');

    // LA VARIABLE : INPUT AVEC LA VALEUR à L'INTéRIEURE EST éGALE à LA VARIBLE USER + L'OBJET NOM
    input.value = user.nom;

    // VARIABLE QUI RéCUPèRE L'INPUT (PRENOM) DE LA PAGE
    var input2 = document.getElementById('prenom');

    // LA VARIABLE : INPUT2 AVEC LA VALEUR à L'INTéRIEURE EST éGALE à LA VARIBLE USER + L'OBJET PRENOM
    input2.value = user.prenom;

    // VARIABLE QUI RéCUPèRE L'INPUT (@MAIL) DE LA PAGE
    var input3 = document.getElementById('email');

    // LA VARIABLE : INPUT3 AVEC LA VALEUR à L'INTéRIEURE EST éGALE à LA VARIBLE USER + L'OBJET EMAIL
    input3.value = user.email;
}