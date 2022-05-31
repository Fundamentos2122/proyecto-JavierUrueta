<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="snacksAdmin.css">
</head>
<body>
    <div class="barrasuperior">
        <img class="logo" src="LogoPilates.PNG" alt="LogoPilates">

        <div class="lema" >“Un estilo de vida para verte bien y sentirte mejor”</div>

        <div class="iconosderecha">
            <button class="bder" name="ing" type="button" role="link" onclick="window.location='login.html'"><img class="imagensalir" src="logout.png">
        </div>
    </div>

    <div class="menu">
        <span><a class="botonmenu" href="inicioAdmin.html"> Pedidos</a></span>
        <span><a class="botonmenu" href="snacksAdmin.html"> Snacks</a></span>
        <span><a class="botonmenu" href="mercanciaAdmin.html"> Souvenirs</a></span>
        <span><a class="botonmenu" href="clientes.html"> Clientes</a></span>
    </div>

    <button class="add">Agregar Producto</button>
    <div class="card">
        <div class="name">Jugo Verde</div>
        <div class="content">
            <img class="producto" src="https://picsum.photos/50/50">
            <div class="info">
                <br>
                <form>
                    <div>
                        <label for="uname">Cant. disp </label>
                        <input type="text" id="uname" value="2" name="name" style="width: 20%;">
                        <button>Guardar</button>
                    </div>
                </form>
            </div>
            <button class="delete"><img src="delete.png" width="80%"></button>
        </div>
        
    </div>
    <div class="card">
        <div class="name">Jugo de Betabel</div>
        <div class="content">
            <img class="producto" src="https://picsum.photos/50/50">
            <div class="info">
                <br>
                <form>
                    <div>
                        <label for="uname">Cant. disp.</label>
                        <input type="text" id="uname" value="1" name="name" style="width: 20%;">
                        <button>Guardar</button>
                    </div>
                </form>
            </div>
            <button class="delete"><img src="delete.png" width="80%"></button>
        </div>
        
    </div>

    <div class="card">
        <div class="name">Jugo de piña c/ Jengibre</div>
        <div class="content">
            <img class="producto" src="https://picsum.photos/50/50">
            <div class="info">
                <br>
                <form>
                    <div>
                        <label for="uname">Cant. disp.</label>
                        <input type="text" id="uname" value="1" name="name" style="width: 20%;">
                        <button>Guardar</button>
                    </div>
                </form>
            </div>
            <button class="delete"><img src="delete.png" width="80%"></button>
        </div>
        
    </div>

    <div class="card">
        <div class="name">Leche de Almendras</div>
        <div class="content">
            <img class="producto" src="https://picsum.photos/50/50">
            <div class="info">
                <br>
                <form>
                    <div>
                        <label for="uname">Cant. disp.</label>
                        <input type="text" id="uname" value="1" name="name" style="width: 20%;">
                        <button>Guardar</button>
                    </div>
                </form>
            </div>
            <button class="delete"><img src="delete.png" width="80%"></button>
        </div>
        
    </div>

    <div class="card">
        <div class="name">Leche de Coco</div>
        <div class="content">
            <img class="producto" src="https://picsum.photos/50/50">
            <div class="info">
                <br>
                <form>
                    <div>
                        <label for="uname">Cant. disp.</label>
                        <input type="text" id="uname" value="1" name="name" style="width: 20%;">
                        <button>Guardar</button>
                    </div>
                </form>
            </div>
            <button class="delete"><img src="delete.png" width="80%"></button>
        </div>
        
    </div>

    <div class="card">
        <div class="name">Limonada Matcha</div>
        <div class="content">
            <img class="producto" src="https://picsum.photos/50/50">
            <div class="info">
                <br>
                <form>
                    <div>
                        <label for="uname">Cant. disp.</label>
                        <input type="text" id="uname" value="1" name="name" style="width: 20%;">
                        <button>Guardar</button>
                    </div>
                </form>
            </div>
            <button class="delete"><img src="delete.png" width="80%"></button>
        </div>
        
    </div>
</body>
</html>