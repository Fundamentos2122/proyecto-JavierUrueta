<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/inicioAdmin.css">
</head>
<body>
    <?php
        include("layouts/headerAdmin.php");
    ?>
    <div class="pedidos">
        <div class="card">
            <div class="name">Guadalupe Martinez Martinez</div>
            <ol class="lista">
                <li class="producto">Jugo Verde x2</li>
            </ol>
            <div class="pagar"> $40</div>
            <input class="pagado" type="checkbox">
        </div>
        <div class="card">
            <div class="name">Carmen Ortiz Lopez</div>
            <ol class="lista">
                <li class="producto">Playera M Negra x1</li>
                <li class="producto">Playera Ch Verde x1</li>
            </ol>
            <div class="pagar"> $200</div>
            <input class="pagado" type="checkbox">
        </div>
    </div>

</body>
</html>