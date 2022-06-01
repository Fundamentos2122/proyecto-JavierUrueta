var boton = document.getElementById("boton");
const pagar = document.getElementsByClassName("total")[0];

const cartList = "cartList";
const keyPrice = "keyPrice";
const price = "price";

const cart = document.getElementById("list-products");
const btncheckout = document.getElementById("btncheckout");
const checkout = document.getElementById("checkout");

var band = 0; //Bandera para el menú
var total = 0;

window.addEventListener("resize",ventana);

document.addEventListener("DOMContentLoaded", function(){
    //Agregar evento al formulario
    boton.addEventListener("click",despliega_menu);
    paintCart();
    paintPrice();
});


function paintCart(){
    let list = getCart();

    let html = '';

    for(var i = 0; i < list.length; i++){
        var acum;

        html += 
        `<div class="card" id="${list[i].id}">
            <div class="producto">${list[i].name}</div>
            <div class="pagar"> $${list[i].costo}</div>
            <button class="delete-product" onclick="deleteProduct(${list[i].id})">Eliminar producto</button>
        </div>`;
        acum=parseFloat(list[i].costo);
        total+=acum;
    }

    cart.innerHTML = html;
    pagar.innerHTML =  `Total: $${total}<button class="propagar">Crear Pedido</button>`;
}

function paintPrice(){
    var precio = document.createElement("h3");
    var text = document.createTextNode("TOTAL = $"+total);
    precio.classList.add("subtotal");
    precio.appendChild(text);
    checkout.insertBefore(precio,btncheckout);

    let totalprice = total;
    localStorage.setItem(keyPrice,JSON.stringify(totalprice));
    if(total === 0){
        document.getElementById("btncheckout").style.display = "none";
    }
}

function updatePrice(){
    let price = document.getElementsByClassName("subtotal")[0];
    price.remove();
    paintPrice();
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

function getPrice(){                             
    let price = JSON.parse(localStorage.getItem(price)) ;
    return price;
}

function deleteProduct(id){
    var acum = 0;
    let list = getCart();

    list = list.filter(i => i.id !== id); //Regresa todos menos el que se va a eliminar

    localStorage.setItem(cartList,JSON.stringify(list));    

    let product = document.getElementById(id);

    product.className +=' hide';
    // console.log(tweet.className); // Regresa card

    setTimeout(()=>{
        product.remove();
    },300)
    if(list.length===0){
        total = 0;
    }
    for(var i = 0; i < list.length; i++){
        acum+=parseFloat(list[i].precio);
        total=acum;
    }
    updatePrice();
    // tweet.remove();
    // console.log("Eliminando " + id);
}