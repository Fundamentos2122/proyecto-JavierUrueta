<?php 
    //Indicamos que haremos uso de la sesión
    session_start();

    if(!array_key_exists("username", $_SESSION)) {
        header('Location: http://localhost/pilates/');
        exit();
    }

?>

<div class="barrasuperior">
        <img class="logo" src="../imagenes/LogoPilates.PNG" alt="LogoPilates">

        <div class="lema" >“Un estilo de vida para verte bien y sentirte mejor”</div>

        <div class="iconosderecha">
            <button class="bder" name="ing" type="button" role="link" onclick="window.location='index.php'"><img class="imagensalir" src="../imagenes/logout.png">
        </div>
    </div>

    <div class="menu">
        <span><a class="botonmenu" href="inicio.php"> Inicio</a></span>
        <span><a class="botonmenu" href="misclases.php"> Clases</a></span>
        <span><a class="botonmenu" href="snacks.php"> Snacks</a></span>
        <span><a class="botonmenu" href="mercancia.php"> Souvenirs</a></span>
       <!--<span><a class="botonmenu" href="ajustes.html"> Ajustes</a></span>--> 
        <span><a class="botonmenu" href="carrito.php"> Carrito</a></span>
    </div>