const snackList = document.getElementById("tableUsers");
const snackList2 = document.getElementById("tableProfes");

const formTweet = document.getElementById("form-tweet");
const modalTweet = document.getElementById("modalTweet");

//Editar
const idEdit = document.getElementById("form-edit-id");
const textAreaEdit = document.getElementById("form-edit-text");
const costEdit = document.getElementById("form-edit-cost");
const btnSaveEdit = document.getElementById("addClass");

//Delete
const modalDeleteTweet = document.getElementById("modalDeleteTweet");
const idDelete = document.getElementById("form-delete-id");

document.addEventListener("DOMContentLoaded", function() {

    getSnacks();

});

function paintSnacks(list) {
    let html = '';
    let html2 = '';
    html2+= `<tr class="arriba">
    <th>Nombre</th>
    <th>Horario</th>
    <th>Clases x Semana</th>
    <th>Tipo</th>
    <th>Dar de baja</th>
</tr>`;
// snackList.innerHTML = html2;
    console.log(list);
    // console.log("Hola");
    for(var i = 0; i < list.length; i++) {
        
        html += html2 +
        `<tr class="cliente" id = "${list[i].id}">
            <td>${list[i].usuario}</td>
            <td>${list[i].horaclase}</td>
            <td>${list[i].semana}</td>
            <td>${list[i].type}</td>
            <td><button class="btn-option" onclick="deleteSnack(${list[i].id})">
                <i class="fa-solid fa-xmark"></i>
                </button>
            </td>
        </tr>`;
    }
    if(list[0].type === "normal"){

        snackList.innerHTML = html;
    }
    else{
        snackList2.innerHTML = html;
    }

}

function getSnacks() {
    let xhttp = new XMLHttpRequest();
    let xhttp2 = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/usersController.php", true);
    xhttp2.open("GET", "../controllers/profControllers.php", true);

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

    xhttp2.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                console.log(this.responseText);
                let list2 = JSON.parse(this.responseText);
                paintSnacks(list2);
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp2.send();

    return [];
}

function hideDelete() {
    let btnDelete = document.querySelectorAll("button[onclick^='deleteTweet']");

    btnDelete.forEach(btn => btn.remove());
}

function deleteSnack(id) {
    idDelete.value = id;

    modalDeleteTweet.classList.add("show");
}

function editSnack(id) {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/usersController.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let tweet = JSON.parse(this.responseText);
                console.log(this.responseText);
                idEdit.value = tweet.id;
                textAreaEdit.value = tweet.semana;
                costEdit.value = tweet.horaclase;

                //modalTweet.classList.add("show");
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();
}