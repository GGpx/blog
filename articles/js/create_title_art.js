// CRéACTION DE LA FUNCTION POUR ENVOYER UNE REQUÊTE VERS LE SERVEUR
function create_title_art() {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var title_article = (JSON.parse(xhr.responseText));
            create(title_article.title, title_article.article);
        }
    };

    // ----------------------------------------PREMIèRE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    xhr.open('POST', 'controllers/save_article.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'title=' + document.getElementById('title').value;
    data = data + '&article=' + document.getElementById('article').value;
    xhr.send(data);

    // ----------------------------------------DEUXIèmE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    // xhr.open('POST', 'save_comment.php');
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // var data = new FormData();
    // data.append('comment', document.getElementById('comment').value);
    //data.append(‘membre’,membre);
    // xhr.send(data);    
}

function create(title, article) {

    var enfant = document.createElement('div');
    enfant.innerHTML = title + article;
    enfant.innerHTML += '<input type="submit" value="Supprimer" onclick="deleteTitle_art('+id+')">';

    var parent = document.getElementById('title_art');
    parent.appendChild(enfant);

}


