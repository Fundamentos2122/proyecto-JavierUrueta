<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/carrito.css">
</head>
<body>
    <?php
        include("layouts/header.php");
    ?>
    <div class="pedidos">
        <!--CARD-->
    </div>
    <div class="total" id="pagar">

    </div>
    <script src="../js/script_carrito.js"></script>

    <script>
        function envio(){

        let list = getJSON();
        //console.log(list);

        function getJSON(){
            let list2 = JSON.parse(localStorage.getItem("cartList"));
            var a =[];
        if(list2 === null){
            return [];
        }
        else{
            //console.log(list2);
            for(var i = 0; i < list2.length; i++){
                var myObj = {
                
                "name" : list2[i].name,    //your artist variable
                "total" : list2[i].precio   //your title variable
                };
                a.push(myObj);
            }
            // console.log(a);
            return JSON.stringify(a);
        }
        }
        document.getElementById("json").value = list;
        console.log(document.getElementById("json").value);
        let xhttp = new XMLHttpRequest();

        xhttp.open("POST", "../controllers/pedidoController.php", true);

        xhttp.setRequestHeader("Content-type", "application/json");

        xhttp.send(list);

        localStorage.clear();
        // location.replace('http://localhost/Proyecto/views/carrito.php');
    }
        // console.log(document.getElementById("json").value);
    </script>



</body>
</html>