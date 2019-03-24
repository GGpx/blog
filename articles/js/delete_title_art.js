/* 
*
*
*        DELETE USER
*
*
*/

function deleteTitle_art(id) {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            del(id);
        }
    };

    
    xhr.open('POST', 'articles/controllers/delete_article.php');
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

function del(id) {

    var enfant = document.getElementById(id);
    enfant.innerHTML = title_art;

    var parent = document.getElementById('title_art');
    parent.removeChild(enfant);

}




