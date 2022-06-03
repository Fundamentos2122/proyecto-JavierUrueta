<?php

include("../models/DB.php");
include("../models/cita.php");

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

    session_start();
    $user = $_SESSION["username"];
    $tipo = $_SESSION["type"];

    if($tipo === "normal"){
        //Obtener todos los registros
        try{
            $user = $_SESSION["username"];
            $query = $connection->prepare('SELECT * FROM citas WHERE usuario = :usuario AND activo = 1');
            $query->bindParam(':usuario',$user,PDO::PARAM_STR);
            $query->execute();
            
    
            $products = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $product = new Cita($row['id'], $row['usuario'], $row['profe'], $row['fecha'], $row['hora'], $row['activo']);
    
                $products[] = $product->getArray();//Push
            }
            // var_dump($tweets);
            echo json_encode($products);
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    else
        try{
            $user = $_SESSION["username"];
            $query = $connection->prepare('SELECT * FROM citas WHERE profe = :usuario AND activo = 1');
            $query->bindParam(':usuario',$user,PDO::PARAM_STR);
            $query->execute();
            
    
            $products = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $product = new Cita($row['id'], $row['usuario'], $row['profe'], $row['fecha'], $row['hora'], $row['activo']);
    
                $products[] = $product->getArray();//Push
            }
            // var_dump($tweets);
            echo json_encode($products);
        }
        catch(PDOException $e){
            echo $e;
        }   
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){

    session_start();
    $usuario = $_SESSION["username"];
    // echo $usuario;

    if(array_key_exists("_method",$_POST)){//Si existe algo en el formulario name="_method"
        //Utilizar el arreglo $_POST
        // echo $usuario;
        if($_POST["_method"] === "POST"){
            //Registro nuevo
            //echo "PEREVERGEEEEEEEEEEEEE";
            postCita($usuario,$_POST["profesor"],$_POST["fecha"],$_POST["hora"],true);//LOS NOMBRES DE LOS PINCHES INPUTS
        }
        else if($_POST["_method"] === "PUT"){
            putProduct($_POST["id"],$_POST["prof"],$_POST["fecha"],$_POST["hora"],true);//future
        }
        else if($_POST["_method"] === "DELETE"){//AGREGO ESTO Y LA FUNCION, SOLO POR FORMULARIO
            deleteProduct($_POST["id"],true);
        }
    }


    exit();
}
// var_dump($_SERVER);

function postCita($user,$profe,$fecha,$hora,$redirect){
    global $connection;
    // echo "HOLAMUNDO";

        $query1 = $connection->prepare('SELECT * FROM citas WHERE hora = :hora AND profe = :profe AND fecha = :fecha AND usuario = :usuario');
        $query1->bindParam(':profe', $profe, PDO::PARAM_STR);
        $query1->bindParam(':hora', $hora, PDO::PARAM_STR);
        $query1->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $query1->bindParam(':usuario', $user, PDO::PARAM_STR);

        $query1->execute();
        $row2 = $query1->fetch(PDO::FETCH_ASSOC);
        // var_dump($row2['activo']);
        // exit();

        if($row2['profe']!== NULL && $row2['hora']!== NULL && $row2['fecha']!== NULL && $row2['usuario']!== NULL && $row2['activo'] === "1"){
            echo "Esa cita ya esta apartada joven";
            exit();
        }



    try{
        $query = $connection->prepare('INSERT INTO citas VALUES(NULL, :usuario, :profe, :fecha, :hora, 1)');
        $query->bindParam(':usuario', $user, PDO::PARAM_STR);
        $query->bindParam(':profe', $profe, PDO::PARAM_STR);
        $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $query->bindParam(':hora', $hora, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/inicio.php');
                echo "HOLAMUNDO";
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

function putProduct($id,$profe,$fecha,$hora,$redirect){
    global $connection;
    try{
        $query = $connection->prepare('UPDATE citas SET profe = :profe, fecha = :fecha, hora = :hora WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':profe', $profe, PDO::PARAM_STR);
        $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $query->bindParam(':hora', $hora, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
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
        $query = $connection->prepare('UPDATE citas SET activo = 0 WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/misclases.php');
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
?>