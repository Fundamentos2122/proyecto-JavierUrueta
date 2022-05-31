const snackList = document.getElementsByClassName("productos")[0];

document.addEventListener("DOMContentLoaded", function() {

    getSnacks();

});

function paintSnacks(list) {
    let html = '';

    for(var i = 0; i < list.length; i++) {

        html += 
        `<div class="card" id="${list[i].id}">
            <span class="name">${list[i].name}</span>
            <p class="name">$${list[i].costo}</p>
            <p class="name">${list[i].color}</p>
            <p class="name">${list[i].talla}</p>
            <img class="producto" src="data:image/jpg;base64,${list[i].imagen}">
            <div class="barrabaja">
                <div class="cantidad">
                    <p>Agregar al carrito</p>   
                </div>
                <button class="add" type="button">✔</button> 
            </div>
        </div>`;
    }

    

    snackList.innerHTML = html;

}

function getSnacks() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/merchControllers.php", true);

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