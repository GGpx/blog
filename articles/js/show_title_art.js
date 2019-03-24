/* 
*
*
*        VOIR TITRES ET ARTICLES
*
*
*/

function showTitle_art(id) {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            show(xhr.responseText);
        }
    };

    
    xhr.open('POST', 'articles/controllers/show_article.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'id=' + id;
    xhr.send(data);

    // ----------------------------------------DEUXIèmE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    // xhr.open('POST', 'save_comment.php');
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // var data = new FormData();
    // data.append('comment', document.getElementById('comment').value);
    //data.append(‘membre’,membre);
    // xhr.send(data);    
}

function show(champ) {
    var title_article = JSON.parse(champ);
    
    var input = document.getElementById('title');
    var input2 = document.getElementById('article');

    input.value = title_article.title;
    input2.value = title_article.article;

}