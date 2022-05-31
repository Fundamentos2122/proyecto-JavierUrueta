<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/clientes.css">
</head>
<body>
    <?php
        include("layouts/headerAdmin.php");
    ?>
    <div>
        <table class="info">
            <tbody>
                <tr class="arriba">
                    <th>Nombre</th>
                    <th>Horario</th>
                    <th>Clases x Semana</th>
                    <th>Correo</th>
                    <th>Dar de baja</th>
                </tr>
                <tr class="cliente">
                    <td>Marcela de los Santos Martinez</td>
                    <td>8:00 am</td>
                    <td>3</td>
                    <td>marcela@yahoo.com.mx</td>
                    <td><button class="delete"><img src="../imagenes/delete.png" width="20%" ></button>
                    </div></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>