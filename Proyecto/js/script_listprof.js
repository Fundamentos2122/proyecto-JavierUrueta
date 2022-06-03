const snackList = document.getElementById("seccioninstructores");
//const proflist = document.getElementById("prof");
const formTweet = document.getElementById("form-tweet");

document.addEventListener("DOMContentLoaded", function() {

    getSnacks();

});

function paintSnacks(list) {

    //let listhtml = '';
    //let html = '';

    var vari = 0;
    for(var i=0; i<list.length;i++)
    if(list[i].type == "profe")
    vari++;
    if(vari==0)      
    document.getElementById("seccioninstructores").style.display = "none";
    else
    for(var i=0; i<list.length;i++){
        if(list[i].type == "profe"){
            console.log(list[i]);
            document.getElementById("prof").innerHTML+=`<option value="${list[i].usuario}">${list[i].usuario}</option>`;
        }
    }

}

function getSnacks() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/profControllers.php", true);

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
