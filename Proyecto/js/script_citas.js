//PINTA LAS CITAS DE ESE USUARIO

const snackList = document.getElementById("contenido");

const formTweet = document.getElementById("form-tweet");
const modalTweet = document.getElementById("modalTweet");

//Delete
const modalDeleteTweet = document.getElementById("modalDeleteTweet");
const idDelete = document.getElementById("form-delete-id");

document.addEventListener("DOMContentLoaded", function() {

    getSnacks();
    
    let modals = document.getElementsByClassName("modal");

    for(var i = 0; i < modals.length; i++) {
        modals[i].addEventListener("click", function(e) {
            if(e.target === this){
                this.classList.remove("show");
            }
        });
    }


});

function paintSnacks(list) {
    let html = '';

    for(var i = 0; i < list.length; i++) {

        html += 
        `<div class="card" id = "${list[i].id}">
            <div class="content">
                <div class="info">
                    <p>Cita</p>
                    <p>Fecha: ${list[i].fecha}</p>
                    <p>Hora: ${list[i].hora}</p>
                    <p>Profe: ${list[i].profe}</p>
                </div>
                <div class="options">
                    <button class="btn-option" onclick="deleteSnack(${list[i].id})">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>         
            </div>       
        </div>`;
    }

    snackList.innerHTML = html;

}

function getSnacks() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/citasController.php", true);

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

    xhttp.open("GET", "../controllers/snacksControllers.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let tweet = JSON.parse(this.responseText);
                console.log(this.responseText);
                idEdit.value = tweet.id;
                textAreaEdit.value = tweet.name;
                costEdit.value = tweet.costo;

                modalTweet.classList.add("show");
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();
}
