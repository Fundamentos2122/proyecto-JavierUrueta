<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d5ef93086f.js" crossorigin="anonymous"></script><!--quesesto?-->
    <title>Document</title>
    <link rel="stylesheet" href="../css/clientes.css">
</head>
<body>
    <?php
        include("layouts/headerAdmin.php");
    ?>

    <form class="agregar"  id="form-user" action="../controllers/profControllers.php" method="POST"><!--enctype="multipart/form-data"-->
        <input type="hidden" name="_method" value="POST">
        <input class="ingdatos" type="text" name="user" id="snack-Name" placeholder="Usuario" autocomplete="off" required>
        <input class="ingdatos" type="password" name="password" id="snack-Precio" placeholder="Contraseña" required>
        <input class="add" type="submit" id="addPrdct" value="Agregar">
    </form>

    <div>
        <table class="info">
            <tbody id="tableUsers">
                <!-- <tr class="arriba">
                    <th>Nombre</th>
                    <th>Horario</th>
                    <th>Clases x Semana</th>
                    <th>Tipo</th>
                    <th>Dar de baja</th>
                </tr> -->
                <!-- <tr class="cliente">
                        <td>Marcela de los Santos Martinez</td>
                        <td>8:00 am</td>
                        <td>3</td>
                        <td>marcela@yahoo.com.mx</td>
                        <td><button class="delete" class="btn-option" onclick="deleteSnack(${list[i].id})" img src="../imagenes/delete.png" width="20%" ></button></td>
                </tr> -->

                
                <!--<div id="userList">
                    
                    <tr class="cliente">
                        <td>Marcela de los Santos Martinez</td>
                        <td>8:00 am</td>
                        <td>3</td>
                        <td>marcela@yahoo.com.mx</td>
                        <td><button class="delete" class="btn-option" onclick="deleteSnack(${list[i].id})" img src="../imagenes/delete.png" width="20%" ></button></td>
                    </tr>
                </div>-->
            </tbody>
            <tbody id="tableProfes"></tbody>
        </table>
        
    </div>


    <?php
        include("layouts/modalDeleteUser.php");
        include("layouts/modalDeleteProf.php");
    ?>

    <script src="../js/script_user.js"></script>

</body>
</html>