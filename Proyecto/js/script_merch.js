const snackList = document.getElementById("merchList");

const formTweet = document.getElementById("form-tweet");
const modalTweet = document.getElementById("modalTweet");

//Editar
const idEdit = document.getElementById("form-edit-id");
const textAreaEdit = document.getElementById("form-edit-text");
const costEdit = document.getElementById("form-edit-cost");
const colorEdit = document.getElementById("form-edit-color");
const tallaEdit = document.getElementById("form-edit-talla");
const btnSaveEdit = document.getElementById("btnSaveEdit");

//Delete
const modalDeleteTweet = document.getElementById("modalDeleteTweet");
const idDelete = document.getElementById("form-delete-id");

document.addEventListener("DOMContentLoaded", function() {

    getMerch();

    let modals = document.getElementsByClassName("modal");

    for(var i = 0; i < modals.length; i++) {
        modals[i].addEventListener("click", function(e) {
            if(e.target === this){
                this.classList.remove("show");
            }
        });
    }

});

function paintMerch(list) {
    let html = '';

    for(var i = 0; i < list.length; i++) {

        html += 
        `<div class="card" id = "${list[i].id}">
            <div class="name">${list[i].name}</div>
            <div class="content">
                <img class="producto" src="data:image/jpg;base64,${list[i].imagen}">
                <div class="info">
                    <p>$${list[i].costo}</p>
                    <br>
                    <p>Color: ${list[i].color}</p>
                    <br>
                    <p>Talla: ${list[i].talla}</p>
                </div>
                <div class="options">
                    <button class="btn-option" onclick="editMerch(${list[i].id})">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn-option" onclick="deleteMerch(${list[i].id})">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>         
            </div>       
        </div>`;
    }

    snackList.innerHTML = html;

}

function getMerch() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/merchControllers.php", true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                console.log(this.responseText);
                let list = JSON.parse(this.responseText);

                paintMerch(list);
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

function deleteMerch(id) {
    idDelete.value = id;

    modalDeleteTweet.classList.add("show");
}

function editMerch(id) {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/merchControllers.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let tweet = JSON.parse(this.responseText);
                console.log(this.responseText);
                idEdit.value = tweet.id;
                textAreaEdit.value = tweet.name;
                colorEdit.value = tweet.color;
                tallaEdit.value = tweet.talla;
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