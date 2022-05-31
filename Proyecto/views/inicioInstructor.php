<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/inicioInst.css">
</head>
<body>

    <div class="barrasuperior">
        <img class="logo" src="../imagenes/LogoPilates.PNG" alt="LogoPilates">

        <div class="lema" >“Un estilo de vida para verte bien y sentirte mejor”</div>

        <div class="iconosderecha">
            <button class="bder" name="ing" type="button" role="link" onclick="window.location='index.php'"><img class="imagensalir" src="../imagenes/logout.png">
        </div>
    </div>

    <div class="menu">
        <span>Clases de Hoy </span>
        <script>
            date = new Date().toLocaleDateString();
            document.write(date);
        </script>
    </div>
    <div class="lista">
        <div class="hora">07:00 am</div>
        <ol class="listHora">
            <li class="cliente">Juana Ramos de la Paz</li>
            <li class="cliente">Rita Martinez Martinez</li>
        </ol>
        <div class="hora">08:00 am</div>
        <ol class="listHora">
            <li class="cliente">Juana Ramos de la Paz</li>
            <li class="cliente">Rita Martinez Martinez</li>
            <li class="cliente">Facundo Torres Miranda</li>
        </ol>
        <div class="hora">09:00 am</div>
        <ol class="listHora">
            <li class="cliente">Juana Ramos de la Paz</li>
            <li class="cliente">Rita Martinez Martinez</li>
            <li class="cliente">Bad Bunny</li>
        </ol>
    </div>

</body>
</html>