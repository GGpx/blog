/* 
*
* VOIR USER
*
*/


function showUser() {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            show(xhr.responseText);
        } else {
        }
    };

    // ----------------------------------------PREMIèRE MéTHODE POUR RéCUPERER LE COMMENTAIRE
    xhr.open('POST', 'controllers/show_user.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'id=' + document.getElementById('id').value;
    xhr.send(data);
}

function show(list_user) {
    var enfant = document.createElement('p');
    enfant.innerHTML = list_user;

    var parent = document.getElementById('list_user');
    parent.appendChild(enfant);
}