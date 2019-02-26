// CRéACTION DE LA FUNCTION POUR ENVOYER UNE REQUÊTE VERS LE SERVEUR

function oclick() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // alert('la réponse du serveur est valide');
            ajout(document.getElementById('comment').value);
        } else {
            // alert('la réponse du serveur n\'est pas valide');
        }
    };

    // ----------------------------------------PREMIèRE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    xhr.open('POST', 'save_comment.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'comment=' + document.getElementById('comment').value;
    xhr.send(data);

    // ----------------------------------------DEUXIèmE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    // xhr.open('POST', 'save_comment.php');
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // var data = new FormData();
    // data.append('comment', document.getElementById('comment').value);
    //data.append(‘membre’,membre);
    // xhr.send(data);
}

// -------------------------------------------FONCTION POUR RAJOUTER EN DESSOUS LES COMMENTAIRES AJOUTER SUR LA BASE DE DONNéE
function ajout(comment) {
    var enfant = document.createElement('p');

    enfant.innerHTML = comment;

    enfant.style.color = "green";

    var parent = document.getElementById('comment_new');

    parent.appendChild(enfant);
}