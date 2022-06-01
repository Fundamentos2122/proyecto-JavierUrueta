<?php

include("../models/DB.php");
include("../models/merch.php");

try{
    $connection = DBConnection::getConnection();

}
catch(PDOException $e){
    error_log("Error de conexion - " . $e, 0);

    exit();
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(array_key_exists("id",$_GET)){
        //Obtener un solo registro
        try{
            $id = $_GET["id"];

            $query = $connection->prepare('SELECT * FROM merch WHERE id = :id');
            $query->bindParam(':id',$id,PDO::PARAM_INT);
            $query->execute();
    
            $product;
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $product = new Merch($row['id'], $row['name'], $row['imagen'],  $row['color'],  $row['talla'], $row['costo'], $row['active']);
    
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
            $query = $connection->prepare('SELECT * FROM merch WHERE active = 1');
            $query->execute();
    
            $products = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $product = new Merch($row['id'], $row['name'], $row['imagen'],  $row['color'],  $row['talla'], $row['costo'], $row['active']);
    
                $products[] = $product->getArray();//Push
            }
            echo json_encode($products);
        }
        catch(PDOException $e){
            echo $e;
        }
    }
    
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("name",$_POST)){
        //Utilizar el arreglo $_POST
        $photo = "";
        if (sizeof($_FILES) > 0) {
            $tmp_name = $_FILES["imagen"]["tmp_name"];
    
            $photo = file_get_contents($tmp_name);
        }
        if($_POST["_method"] === "POST"){

            postProduct($_POST["name"],$photo,$_POST["color"],$_POST["talla"],$_POST["cost"],true);
        }
        else if($_POST["_method"] === "PUT"){
            putProduct($_POST["id"],$_POST["name"],$_POST["color"],$_POST["talla"],$_POST["costo"],true);
        }
    }
    else if(array_key_exists("id",$_POST)){
        if($_POST["_method"] === "DELETE"){
            deleteProduct($_POST["id"],true);
        }
    }
    exit();
}

function postProduct($name,$imagen,$color,$talla,$cost,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('INSERT INTO merch VALUES(NULL, :name, :imagen, :color, :talla, :cost, 1)');
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $query->bindParam(':color', $color, PDO::PARAM_STR);
        $query->bindParam(':talla', $talla, PDO::PARAM_STR);
        $query->bindParam(':cost', $cost, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/mercanciaAdmin.php');
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

function putProduct($id,$name,$color,$talla,$cost,$redirect){
    global $connection;
    try{
        $query = $connection->prepare('UPDATE merch SET name = :name, color = :color, talla = :talla, costo = :cost WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':color', $color, PDO::PARAM_STR);
        $query->bindParam(':talla', $talla, PDO::PARAM_STR);
        $query->bindParam(':cost', $cost, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/mercanciaAdmin.php');
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
        $query = $connection->prepare('UPDATE merch SET active = 0 WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/mercanciaAdmin.php');
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