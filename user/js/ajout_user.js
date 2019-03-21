/*
*
*
*       AJOUT USER
*
*
*/

// FONCTION POUR CRéER UN UTILISATEURS
function createUser() {

    // VARIABLE POUR ENVOYER UNE REQUÊTE AU SERVEUR
    var xhr = new XMLHttpRequest();

    
    xhr.onreadystatechange = function () {

        // CONDITION POUR LA REQUÊTE
        if (xhr.readyState == 4 && xhr.status == 200) {

            // VARIABLE USER QUI CONVERTI LA RéPONSE TEXT EN OBJET JSON
            var user = (JSON.parse(xhr.responseText));

            // FONCTION QUI AJOUTE LES éLéMENTS DE LA PAGE ET QUI LES ENVOIES à LA BDD
            ajout(user.id ,user.nom, user.prenom, user.email);
        } else {
        }
    };

    // REQUêTE AVEC TOUT LES éLéMENTS à L'INTéRIEURE
    xhr.open('POST', 'controllers/save_user.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // VARIABLE QUI CONTIENT TOUT LES éLéMENTS DE LA PAGE
    var data = 'nom=' + document.getElementById('nom').value;
    data = data + '&prenom=' + document.getElementById('prenom').value;
    data = data + '&email=' + document.getElementById('email').value;

    // ENVOIE DE LA REQUÊTE
    xhr.send(data);
}

// FONCTION POUR AJOUTER DES éLéMENTS à LA PAGE
function ajout(id, nom, prenom, email) {

    // VARIABLE ENFANT QUI AJOUTE PAR RAPPORT à L'éLéMENT PARENT
    var enfant = document.createElement('div');

    // ATTRIBUT DE LA VIARIABLE ENFANT 
    enfant.setAttribute('class', 'yeah');
    enfant.setAttribute('id', id);

    // MODIFICATION D'UN éLéMENT RECUPèRER DU SERVEUR DE JAVASCRIPT EN éLéMENT HTML
    enfant.innerHTML = nom + prenom + email;

    // AJOUT DES BOUTONS POUR LA MODIFICATION EN AJAX
    enfant.innerHTML += '<input type="submit" value="Voir" onclick="showUser('+id+')">';
    enfant.innerHTML += '<input type="submit" value="Modifier" onclick="updateUser('+id+')">';
    enfant.innerHTML += '<input type="submit" value="Supprimer" onclick="deleteUser('+id+')">';
    
    // VARIABLE PARENT QUI PERMET D'AJOUTER DANS L'ENFANT
    var parent = document.getElementById('list_user');
    parent.appendChild(enfant);
}