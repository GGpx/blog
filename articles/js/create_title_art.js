/* 
*
*
*        CRéER DES TITRES ET ARTICLES
*
*
*/

function createTitle_art() {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var title_article = (JSON.parse(xhr.responseText));
            create(title_article.id, title_article.title, title_article.article);
        }
    };

    
    xhr.open('POST', 'articles/controllers/save_article.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'title=' + document.getElementById('title').value;
    data += '&article=' + document.getElementById('article').value;
    xhr.send(data);
}

function create(id, title, article) {

    var enfant = document.createElement('div');
    enfant.setAttribute('class' , 'div_bdd');
    enfant.setAttribute('id', id);
    
    
    enfant.innerHTML = title + ' && ' + article + '<br>';

    enfant.innerHTML += '<input type="submit" value="Voir" onclick="showTitle_art('+id+')">';
    enfant.innerHTML += '<input type="submit" value="Modifier" onclick="changeTitle_art('+id+')">';
    enfant.innerHTML += '<input type="submit" value="Supprimer" onclick="deleteTitle_art('+id+')">';
    
    var parent = document.getElementById('title_art');
    parent.appendChild(enfant);
}


