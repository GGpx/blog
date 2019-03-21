/* 
*
*
*       MODIFIER USER
*
*
*/

// FONCTION POUR MODIFIER UN UTILISATEUR
function updateUser(id) {

    // VARIABLE POUR ENVOYER UNE REQUÊTE AU SERVEUR
    var xhr = new XMLHttpRequest();

    // ASSIGNIATION DE LA REQUÊTE à UNE FONCTION
    xhr.onreadystatechange = function () {

        // CONDITION POUR LA REQUÊTE
        if (xhr.readyState == 4 && xhr.status == 200) {

            // FONCTION QUI AFFICHE LES éLéMENTS DE LA PAGE, QUI AFFICHE UNE RéPONSSE EN TEXT 
            voir(xhr.responseText);

            // VARIABLE USER QUI TRANSFORME LA RéPONSE DU SERVEUR EN éLéMENT JSON
            var user = JSON.parse(xhr.responseText);

            // FONCTION QUI PERMET DE SUPPRIMER LES éLéMENTS PAR RAPPORT à L'ID
            supprimer2(id);

            // FONCTION QUI AJOUTE LES éLéMENTS DE LA PAGE ET QUI LES ENVOIES à LA BDD
            ajout2(user.id ,user.nom, user.prenom, user.email);
        } 
};

    // REQUêTE AVEC TOUT LES éLéMENTS à L'INTéRIEURE
    xhr.open('POST', 'controllers/updateUser.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // VARIABLE QUI CONTIENT TOUT LES éLéMENTS DE LA PAGE
    var data = 'id=' + id;
    data = data + '&nom=' + document.getElementById('nom').value;
    data = data + '&prenom=' + document.getElementById('prenom').value;
    data = data + '&email=' + document.getElementById('email').value;
    
    // ENVOIE DE LA REQUÊTE
    xhr.send(data);
}

// FONCTION POUR AJOUTER DES éLéMENTS à LA PAGE
function voir(user) {
    // VARIABLE QUI PERMET DE TRANSFORMER LA RéPONSE DU SERVEUR, D'UN OBJET JSON EN éléMENT JAVASCRIPT
    var inp = document.getElementById('nom');
    inp.value = user.nom;
    var inp2 = document.getElementById('prenom');
    inp2.value = user.prenom;
    var inp3 = document.getElementById('email');
    inp3.value = user.email;
}

function supprimer2(id) {
    var enfant = document.getElementById(id);
    enfant.innerHTML = list_user;

    var parent = document.getElementById('list_user');
    parent.removeChild(enfant);
}

function ajout2(id, nom, prenom, email) {
    var enfant = document.createElement('div');
    enfant.setAttribute('class', 'yeah');
    enfant.setAttribute('id', id);

    enfant.innerHTML = nom + prenom + email;
    enfant.innerHTML += '<input type="submit" value="Voir" onclick="showUser('+id+')">';
    enfant.innerHTML += '<input type="submit" value="Modifier" onclick="updateUser('+id+')">';
    enfant.innerHTML += '<input type="submit" value="Supprimer" onclick="deleteUser('+id+')">';
    
    var parent = document.getElementById('list_user');
    parent.appendChild(enfant);
}


//Trouver une fonction pour mettre la liste en ordre décroissant

