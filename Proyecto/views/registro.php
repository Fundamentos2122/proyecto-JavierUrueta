<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/registro.css">
</head>
<body>
    <div class="barrasuperior">
        <img class="logo" src="../imagenes/LogoPilates.PNG" alt="LogoPilates">
        <span class="lema">“Un estilo de vida para verte bien y sentirte mejor”</span>
    </div>
    <div>
        <form class="formo" action="../controllers/usersController.php" method="POST" autocomplete="off">
            <input type="hidden" name="_method" value="POST">
            <h1 class="titulo">Registrarse</h1>
            <input class="cajas" name="user" type="text" placeholder="Usuario" required>
            <input class="cajas" name="password" type="password" placeholder="Password" required>

            <br><br>

            <div class="crear"><input type="submit" value="ENVIAR"></div>

            <br><br>
            
            <p class="tengo-cuenta"><a href="index.php" class="tengo-cuenta">Ya tengo cuenta</a></p>
            
        </form>
    </div>
</body>
</html>