<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d5ef93086f.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="../css/mercanciaAdmin.css">
</head>
<body>
    <?php
        include("layouts/headerAdmin.php");
    ?>

    <form class="agregar"  id="form-merch" action="../controllers/merchControllers.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="POST">
        <input class="ingdatos" type="text" name="name" id="merch-Name" placeholder="Nombre de la Mercancia">
        <input class="ingdatos" type="text" name="cost" id="merch-Precio" placeholder="Precio" >
        <input class="ingdatos" type="text" name="color" id="merch-Color" placeholder="Color" >
        <input class="ingdatos" type="text" name="talla" id="merch-Talla" placeholder="Talla" >
        <input class="ingdatos" type="file" name="imagen" id="merch-Imagen" accept=".jpg,.gif,.png" >
        <input class="add" type="submit" id="addPrdct" value="Agregar">
    </form>
    <div id="merchList">

    </div>
    
    <!--<div class="card">
        <div class="name">Toalla Deportiva</div>
        <div class="content">
            <img class="producto" src="https://picsum.photos/50/50">
            <div class="info">
                <p>Precio</p>
                <br>
                <p>Color</p>
                <br>
                <p>Talla</p>
            </div>
            <button class="delete"><img src="../imagenes/delete.png" width="80%"></button>
            <button class="edit"><img src="../imagenes/edit.png" width="80%"></button>
            
        </div>
        
    </div>-->

    <?php
        include("layouts/modalDeleteMerch.php");
        include("layouts/modalEditMerch.php");
    ?>

    <script src="../js/script_merch.js"></script>
</body>
</html>