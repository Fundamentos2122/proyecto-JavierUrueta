//PINTA A LOS CLIENTES POR PROFES

const snackList = document.getElementById("lista");

document.addEventListener("DOMContentLoaded", function() {

    getSnacks();

});




function paintSnacks(list) {

    console.log(list);

    let html = '';

    for(var i = 0; i < list.length; i++) {

    
        html += 
        `<ol class="listHora" id="${list[i].id}">
            <li class="cliente">Nombre: ${list[i].user}</li>
            <li class="cliente">Fecha: ${list[i].fecha}</li>
            <li class="cliente">Hora: ${list[i].hora}Hrs</li>
        </ol>`;
        
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
