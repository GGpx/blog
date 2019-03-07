// CRéACTION DE LA FUNCTION POUR ENVOYER UNE REQUÊTE VERS LE SERVEUR
/*
*
*
* AJOUT USER
*
*/

function createUser() {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var user = (JSON.parse(xhr.responseText));
            ajout(user.nom);
            ajout(user.prenom);
            ajout(user.email);
        } else {
        }
    };

    // ----------------------------------------PREMIèRE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    xhr.open('POST', 'controllers/save_user.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'nom=' + document.getElementById('nom').value;
    data = data + '&prenom=' + document.getElementById('prenom').value;
    data = data + '&email=' + document.getElementById('email').value;
    xhr.send(data);
}

function ajout(list_user) {
    var enfant = document.createElement('p');

    // var enfant2 = document.createElement('<input type="submit">');

    enfant.innerHTML = list_user;
    enfant.innerHTML += '<input type="submit" value="Supprimer" onclick="deleteUser(id)">';
    
    var parent = document.getElementById('list_user');
    parent.appendChild(enfant);
    // parent.appendChild(enfant2);
}