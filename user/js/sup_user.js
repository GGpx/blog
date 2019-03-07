/* 
*
* DELETE USER
*
*/


function deleteUser(id) {
    // alert(id);
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            supprimer(id);
        } else {
        }
    };

    // ----------------------------------------PREMIèRE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    xhr.open('POST', 'controllers/delete_user.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'id=' + id;
    xhr.send(data);
}

function supprimer(id) {
    var enfant = document.getElementById(id);
    enfant.innerHTML = list_user;

    var parent = document.getElementById('list_user');
    parent.removeChild(enfant);
}