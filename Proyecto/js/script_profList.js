const snackList = document.getElementById("lista");

document.addEventListener("DOMContentLoaded", function() {

    getSnacks();

});

function paintSnacks(list) {
    let html = '';

    for(var i = 0; i < list.length; i++) {

        html += 
        `<ol class="listHora" id="${list[i].id}">
            <li class="cliente">${list[i].usuario} : ${list[i].horaclase}</li>
        </ol>`;
    }

    snackList.innerHTML = html;

}

function getSnacks() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/usersController.php", true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                console.log(this.responseText);
                let list = JSON.parse(this.responseText);

                paintSnacks(list);
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();

    return [];
}
