<?php

include("../models/DB.php");
include("../models/Snack.php");

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

            $query = $connection->prepare('SELECT * FROM snacks WHERE id = :id');
            $query->bindParam(':id',$id,PDO::PARAM_INT);
            $query->execute();
    
            $product;
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $product = new Snack($row['id'], $row['name'], $row['imagen'], $row['cost'], $row['active']);
    
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
            $query = $connection->prepare('SELECT * FROM snacks WHERE active = 1');//Se le cambia el nombre ya sea photocard, cds, etc
            $query->execute();
    
            $products = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $product = new Snack($row['id'], $row['name'], $row['imagen'], $row['cost'], $row['active']);
    
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
    if(array_key_exists("name",$_POST)){//Si se envia por formulario
        //Utilizar el arreglo $_POST
        $photo = "";
        if (sizeof($_FILES) > 0) {
            $tmp_name = $_FILES["imagen"]["tmp_name"];
    
            $photo = file_get_contents($tmp_name);
            // var_dump($tmp_name);
            // echo "Hola";
        }
        if($_POST["_method"] === "POST"){
            //Registro nuevo
            postProduct($_POST["name"],$photo,$_POST["cost"],true);//future
        }
        else if($_POST["_method"] === "PUT"){
            putProduct($_POST["id"],$_POST["name"],$_POST["cost"],true);//future
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

function postProduct($name,$imagen,$cost,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('INSERT INTO snacks VALUES(NULL, :name, :imagen, :cost, 1)');
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $query->bindParam(':cost', $cost, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/snacksAdmin.php');
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

function putProduct($id,$name,$cost,$redirect){
    global $connection;
    try{
        $query = $connection->prepare('UPDATE snacks SET name = :name, cost = :cost WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':cost', $cost, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/snacksAdmin.php');
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
        $query = $connection->prepare('UPDATE snacks SET active = 0 WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/snacksAdmin.php');
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