<?php
include("../models/DB.php");
include("../models/pedido.php");

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

            $query = $connection->prepare('SELECT * FROM pedidos WHERE id = :id');
            $query->bindParam(':id',$id,PDO::PARAM_INT);
            $query->execute();
    
            $product;
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $product = new Pedido($row['id'], $row['usuario'], $row['producto'], $row['total'], $row['active']);
    
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
            $query = $connection->prepare('SELECT * FROM pedidos WHERE active = 1');//Se le cambia el nombre ya sea photocard, cds, etc
            $query->execute();
    
            $products = array();//Genera arreglo vacio
    
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $product = new Pedido($row['id'], $row['usuario'], $row['producto'], $row['total'], $row['active']);
    
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
    if(array_key_exists("id",$_POST)){
        if($_POST["_method"] === "DELETE"){//AGREGO ESTO Y LA FUNCION, SOLO POR FORMULARIO
            deleteProduct($_POST["id"],true);
        }
    }
        //Si se envia por ajax
        //Utilizar file_get_contents
        $emptyArray = [];
        $data = json_decode(file_get_contents('php://input'));
        $emptyArray = $data;
        postDetail($data,true);
        
        // if($data->_method === "POST"){
        //     // postProduct($data->titulo,$data->feature1,$data->feature2,$data->feature3,$data->price,$data->image,$data->href,false);
        // }
        // else if($data->_method === "PUT"){
        //     // var_dump($data);
        //     // putProduct($data->id,$data->titulo,$data->feature1,$data->feature2,$data->feature3,$data->price,$data->image,$data->href,false);
        // }
    // var_dump($_POST);
    // var_dump($data);
    //  var_dump($emptyArray[0]->name);
    exit();
}

function postDetail($data,$redirect){
    // echo count($data);
    global $connection;
    // echo "Hola";
    // var_dump($data);
    // exit();
    session_start();
    $usuario = $_SESSION["username"];


    foreach ($data as $object) {
        try {
            $query = $connection->prepare('INSERT INTO pedidos VALUES(NULL, :usuario, :producto, :total, 1)');
            $query->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $query->bindParam(':producto', $object->name, PDO::PARAM_STR);
            $query->bindParam(':total', $object->total, PDO::PARAM_INT);
            $query->execute();
    
            if($query->rowCount() === 0) {
                echo "Error en la inserción";
            }
            else {
                if ($redirect) {
                    //header('Location: http://localhost/Proyecto/index.php');
                }
                else {
                    echo "Registro guardado";
                }
            }
        }
        catch(PDOException $e) {
            echo $e;
        }
        // var_dump($object->total);
        // echo $object->name;
    }

}

function deleteProduct($id,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('UPDATE pedidos SET active = 0 WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyecto/views/inicioAdmin.php');
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