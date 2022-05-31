<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/d5ef93086f.js" crossorigin="anonymous"></script> <!--Esto por que? xd-->
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="barrasuperior">
        <img class="logo" src="../imagenes/LogoPilates.PNG" alt="LogoPilates">
        <span class="lema">“Un estilo de vida para verte bien y sentirte mejor”</span>
    </div>
    <div class="ingresar">
       <div class="tittle">Ingresar</div>
       <div class="inputs">
            <form class="inputpassword" action="../controllers/accesController.php" method="POST">
                <input type="hidden" name="_method" value="POST">
                <input class="ingdatos" type="text" name="user" placeholder="Usuario" required>
                <input class="ingdatos" type="password" name="password" placeholder="Contraseña" required>
                <!--<div class="forget">¿Olvidaste tu contraseña?</div>-->
                <input class="boton" type="submit" value="Iniciar">
            </form>
       </div>
        </button>
        <br>
        <div><a class="crear" href="registro.php"> Registrate</a></div>
        <br><br><br><br>
        <div><a class="crear" href="loginAdmin.php">Soy admin</a></div>
    </div>

    <?php
        //include("../js/app.php");
    ?>

</body>
</html>