const snackList = document.getElementById("pedidos");

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
        `<div class="card">
            <div class="name">Cliente: ${list[i].name}</div>
            <ol class="lista">
            <li class="producto">Producto: ${list[i].producto}</li>
            </ol>
            <div class="pagar">Precio: $${list[i].costo}</div>
            <button class="btn-option" onclick="deleteSnack(${list[i].id})">
            <i class="fa-solid fa-xmark"></i>
            </button>
        </div>`;
    }

    snackList.innerHTML = html;

}

function getSnacks() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/pedidoController.php", true);

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