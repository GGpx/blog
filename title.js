// CRéACTION DE LA FUNCTION POUR ENVOYER UNE REQUÊTE VERS LE SERVEUR
function cli() {
    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            ajout(xhr.responseText);
        } else {
            // alert('la réponse du serveur n\'est pas valide');
        }
    };

    // ----------------------------------------PREMIèRE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    xhr.open('POST', 'save_article.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'title=' + document.getElementById('title').value;
    xhr.send(data);

    // ----------------------------------------DEUXIèmE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    // xhr.open('POST', 'save_comment.php');
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // var data = new FormData();
    // data.append('comment', document.getElementById('comment').value);
    //data.append(‘membre’,membre);
    // xhr.send(data);    
}

function ajout(title) {
    var enfant = document.createElement('li');
    enfant.innerHTML = titl;

    var parent = document.getElementById('title');
    parent.appendChild(enfant);
}


