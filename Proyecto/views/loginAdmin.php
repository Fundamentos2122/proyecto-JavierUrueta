<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/loginAdmin.css">
</head>
<body>
    <div class="barrasuperior">
        <img class="logo" src="../imagenes/LogoPilates.PNG" alt="LogoPilates">
        <span class="lema">“Un estilo de vida para verte bien y sentirte mejor”</span>
    </div>
    <div class="flex">
        <div class="ingresar">
            <div class="tittle">Admin</div>
            <div class="inputs">
                 <div class="inputpassword">
                     <input class="ingdatos" type="text" name="user" placeholder="Usuario">
                     <input class="ingdatos" type="text" name="password" placeholder="Contraseña">
                 </div>
            </div>
             <button class="boton" name="ing" type="button" role="link" onclick="window.location='inicioAdmin.php'"><img class="imagenflecha" src="../imagenes/flecha.png">
             </button>
             <br>
         </div>
         <div class="ingresar">
             <div class="tittle">Instructor</div>
             <div class="inputs">
                  <div class="inputpassword">
                      <input class="ingdatos" type="text" name="user" placeholder="Usuario">
                      <input class="ingdatos" type="text" name="password" placeholder="Contraseña">
                  </div>
             </div>
              <button class="boton" name="ing" type="button" role="link" onclick="window.location='inicioInstructor.php'"><img class="imagenflecha" src="../imagenes/flecha.png">
              </button>
              <br>
         </div>
    </div>
    <div><a class="crear" href="index.php">No soy admin</a></div>


</body>
</html>