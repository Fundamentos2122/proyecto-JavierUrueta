<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylesinicio.css">
</head>
<body>
    <?php
        include("layouts/header.php");
    ?>
    <div class="contenido">
        <table class="tabla">
            <caption>Clases de la semana</caption>
            <tr class="renglon">
              <td class="dia">L</td>          
              <td class="tipoclase">Gluteo</td>
            </tr>
          
            <tr class="renglon">          
              <td class="dia">M</td>          
              <td class="tipoclase">Brazo</td>         
            </tr>
          
            <tr class="renglon">         
              <td class="dia">Mi</td>         
              <td class="tipoclase">Flexibilidad</td>         
            </tr>
          
            <tr class="renglon">         
              <td class="dia">J</td>          
              <td class="tipoclase">Espalda Baja</td>         
            </tr>
          
            <tr class="renglon">         
              <td class="dia">V</td>       
              <td class="tipoclase">Pierna</td>       
            </tr>         
        </table>

        <div class="seccioninstructores">
            <div class="tittle"><h1 class="titulo">Agenda tus clases</h1></div>
            <form class="formo" action="../controllers/usersController.php" method="POST" autocomplete="off">  
              <input type="hidden" name="_method" value="PUT"> <!--PUT?-->
              <input type="hidden" name="id" value="" id="form-edit-id">      
              <input class="cajas" id="form-edit-text" name="semana" type="text" placeholder="Clases a la semana" required>
              <input class="cajas" id="form-edit-cost" name="horaclase" type="text" placeholder="Hora de las clases" required>
              <input class="add" type="submit" id="addClass" value="Agendar">
            </form>
        </div>
    </div>

    <div class="contenido2">
        <span class="nuestrosprincipios">Nuestros Principios</span>
        <div class="subcontenido2">
            <p class="principiostext">
                Es una disciplina que se basa en el desarrollo de los músculos internos que ayuda a mantener el equilibrio corporal y que da firmeza y fortalece la columna vertebral.
                <br><br>
                Por eso mismo, el pilates es un método que se suele utilizar para rehabilitación, curar el dolor de espalda o corregir la posición corporal. Además, su práctica cuando no se tienen molestias cervicales o lumbares ayuda a prevenir malas posturas y las consecuencias que puedan tener para la espalda. </p>
            <img class="poses" src="../imagenes/Principios.JPG" alt="Principios">
        </div>
    </div>

</body>
</html>