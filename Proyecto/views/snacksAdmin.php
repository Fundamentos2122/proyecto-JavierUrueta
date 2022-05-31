<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d5ef93086f.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="../css/snacksAdmin.css">

</head>
<body>
    <?php
        include("layouts/headerAdmin.php");
    ?>

    <form class="agregar"  id="form-snack" action="../controllers/snacksControllers.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="POST">
        <input class="ingdatos" type="text" name="name" id="snack-Name" placeholder="Nombre del Snack">
        <input class="ingdatos" type="text" name="cost" id="snack-Precio" placeholder="Precio" >
        <input class="ingdatos" type="file" name="imagen" id="snack-Imagen" accept=".jpg,.gif,.png" >
        <input class="add" type="submit" id="addPrdct" value="Agregar">
    </form>
    <div id="snackList">
        <!--<div class="card">
            <div class="name">Jugo Verde</div>
            <div class="content">
                <img class="producto" src="https://picsum.photos/50/50">
                 <div class="info">
                    <p>$###</p>
                </div>
                <button class="delete"><img src="../imagenes/delete.png" width="80%"></button>
             <button class="edit"><img src="../imagenes/edit.png" width="80%"></button>  
            </div>
        </div>-->
    </div>


    <?php
        include("layouts/modalDeleteSnack.php");
        include("layouts/modalEditSnack.php");
    ?>

    <script src="../js/script_snack.js"></script>
</body>
</html>