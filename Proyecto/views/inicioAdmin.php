<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d5ef93086f.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="../css/inicioAdmin.css">
</head>
<body>
    <?php
        include("layouts/headerAdmin.php");
    ?>
    <div class="pedidos" id="pedidos">

    </div>

    <?php
        include("layouts/modalDeletePedido.php");
    ?>

    <script src="../js/script_inicioAdmin.js"></script>

</body>
</html>