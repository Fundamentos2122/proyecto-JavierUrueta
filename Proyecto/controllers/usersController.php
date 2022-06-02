<?php

include("../models/DB.php");
include("../models/User.php");

try{
    $connection = DBConnection::getConnection();

    // var_dump($connection);
}
catch(PDOException $e){
    error_log("Error de conexion - " . $e, 0);

    exit();
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
    // var_dump($_GET);
    if(array_key_exists("id",$_GET)){
        //Obtener un solo registro
        try{
            $id = $_GET["id"];

            $query = $connection->prepare('SELECT * FROM usuarios WHERE id = :id');
            $query->bindParam(':id',$id,PDO::PARAM_INT);
            $query->execute();
    
            $product;
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $product = new User($row['id'], $row['usuario'], $row['horaclase'], $row['semana'], $row['password'], $row['tipo']);

            }
            // var_dump($tweets);
            echo json_encode($product->getArray());
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    else{
        //Obtener todos los registros
        try{
            $query = $connection->prepare('SELECT * FROM usuarios WHERE tipo = "normal"');//Se le cambia el nombre ya sea photocard, cds, etc
            $query->execute();
    
            $products = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $product = new User($row['id'], $row['usuario'], $row['horaclase'], $row['semana'], $row['password'], $row['tipo']);
    
                $products[] = $product->getArray();//Push
            }
            // var_dump($tweets);
            echo json_encode($products);
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("_method",$_POST)){//Si se envia por formulario
        //Utilizar el arreglo $_POST
        if($_POST["_method"] === "POST"){
            //Registro nuevo
            postProduct($_POST["user"],$_POST["password"],"normal",true);//future
        }
        else if($_POST["_method"] === "PUT"){
            session_start();
            putProduct($_SESSION["username"],$_POST["horaclase"],$_POST["semana"],true);//future
        }
    }
    else if(array_key_exists("id",$_POST)){
        if($_POST["_method"] === "DELETE"){//AGREGO ESTO Y LA FUNCION, SOLO POR FORMULARIO
            deleteProduct($_POST["id"],true);
        }
    }
    exit();
}
// var_dump($_SERVER);

function postProduct($user,$password,$tipo,$redirect){
    global $connection;
    $password = password_hash($password, PASSWORD_DEFAULT);
    try{
        $query = $connection->prepare('INSERT INTO usuarios VALUES(NULL, :usuario, NULL, NULL, :password, :tipo)');
        $query->bindParam(':usuario', $user, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/index.php');
            }
            else {
                echo "Registro guardado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
    }

}

function putProduct($user,$horaclase,$semana,$redirect){
    global $connection;
    try{
        $query = $connection->prepare('UPDATE usuarios SET semana = :semana, horaclase = :horaclase WHERE usuario = :usuario');//Para actualizar es con una coma
        $query->bindParam(':usuario', $user, PDO::PARAM_STR);
        $query->bindParam(':semana', $semana, PDO::PARAM_STR);
        $query->bindParam(':horaclase', $horaclase, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                echo '<script>alert("Clase agendada con exito! :D")</script>';
                header('Location: http://localhost/proyecto/views/inicio.php');
                
            }
            else {
                echo "Registro guardado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
    }

}

function deleteProduct($id,$redirect){
    global $connection;

    try{
        $query = $connection->prepare("DELETE FROM usuarios WHERE id = :id");//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/clientes.php');
            }
            else {
                echo "Registro guardado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
    }
}