const snackList = document.getElementsByClassName("productos")[0];

const cartList = "cartList";

document.addEventListener("DOMContentLoaded", function() {

    getSnacks();

});

function paintSnacks(list) {
    let html = '';

    for(var i = 0; i < list.length; i++) {

        html += 
        `<form class="card" id="${list[i].id}">
            <span class="name">${list[i].name}</span>
            <p class="name4">${list[i].costo}</p>
            <p class="name2">${list[i].color}</p>
            <p class="name3">${list[i].talla}</p>
            <img class="producto" src="data:image/jpg;base64,${list[i].imagen}">
            <div class="barrabaja">
                <div class="cantidad">
                    <p>Agregar al carrito</p>   
                </div>
                <button class="add">✔</button> 
            </div>
        </form>`;
    }

    

    snackList.innerHTML = html;

    const listproducts = document.getElementsByClassName("card");
    console.log(listproducts);
    for (var i=0; i< listproducts.length; i++){
        listproducts[i].addEventListener("submit",submitProduct);
    }

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

// -------------- CARRITO ----------------

//Funcion para local storage
function submitProduct(e){
    e.preventDefault();
    e.stopPropagation();
    let name;
    let cost;
    //let text;
    //let imagen;
    // const hijos = this.children;
    name = this.getElementsByClassName("name")[0];
    color = this.getElementsByClassName("name2")[0];
    talla = this.getElementsByClassName("name3")[0];
    //name = name + ", " + color + ", " + talla;
    cost = this.getElementsByClassName("name4")[0];
    //imagen = this.getElementsByClassName("producto")[0];

    let product = {
        id: Date.now(),
        name: name.textContent + ", " + color.textContent + ", " + talla.textContent,
        talla: talla.textContent,
        precio: cost.textContent,
        
        //imagen: imagen.getAttribute("src")
    };

    let list = getCart();

    list.push(product);

    // console.log(tweet);

    // let list = [ tweet ];

    localStorage.setItem(cartList,JSON.stringify(list));
    alert("Producto agregado al carrito!!!");
    //paintTweet();
    console.log("Enviando formulario");
}


function getCart(){
    let list = JSON.parse(localStorage.getItem(cartList));

    if(list === null){
        return [];
    }
    else{
        return list;
    }
}
