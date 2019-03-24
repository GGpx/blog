/* 
*
*
*        MODIFIER TITRES ET ARTICLES
*
*
*/

function changeTitle_art(id) {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            show2(xhr.responseText);
            
            var title_article = JSON.parse(xhr.responseText);
            
            del2(id);

            create2(title_article.id, title_article.title, title_article.article);
        }
    };

    
    xhr.open('POST', 'articles/controllers/update_article.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'id=' + id;
    data += '&title=' + document.getElementById('title').value;
    data += '&article=' + document.getElementById('article').value;
    xhr.send(data);

    // ----------------------------------------DEUXIèmE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    // xhr.open('POST', 'save_comment.php');
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // var data = new FormData();
    // data.append('comment', document.getElementById('comment').value);
    //data.append(‘membre’,membre);
    // xhr.send(data);    
}

function show2(title_article) {
    
    
    var input = document.getElementById('title');
    input.value = title_article.title;
    
    var input2 = document.getElementById('article');
    input2.value = title_article.article;

}

function del2(id) {

    var enfant = document.getElementById(id);
    enfant.innerHTML = title_art;

    var parent = document.getElementById('title_art');
    parent.removeChild(enfant);

}

function create2(id, title, article) {

    var enfant2 = document.createElement('div');
    enfant2.setAttribute('class' , 'div_bdd');
    enfant2.setAttribute('id', id);
    
    
    enfant2.innerHTML = title + ' && ' + article + '<br>';

    enfant2.innerHTML += '<input type="submit" value="Voir" onclick="showTitle_art('+id+')">';
    enfant2.innerHTML += '<input type="submit" value="Modifier" onclick="changeTitle_art('+id+')">';
    enfant2.innerHTML += '<input type="submit" value="Supprimer" onclick="deleteTitle_art('+id+')">';
    
    var parent2 = document.getElementById('title_art');
    parent2.appendChild(enfant2);
}