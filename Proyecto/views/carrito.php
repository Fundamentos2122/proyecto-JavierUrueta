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
        <div class="card">
            <div class="producto">Jugo Verde</div>
            <div class="cantidad">x1</div>
            <div class="pagar"> $40</div>
        </div>
        <div class="card">
            <div class="producto">Playera Hombre Negra Ch</div>
            <div class="cantidad">x1</div>
            <div class="pagar"> $100</div>
        </div>
        <div class="card">
            <div class="producto">Playera Hombre Verde Ch</div>
            <div class="cantidad">x1</div>
            <div class="pagar"> $100</div>
        </div>
    </div>
    <div class="total">Total: $240<button class="propagar">Pagar</button></div>
</body>
</html>