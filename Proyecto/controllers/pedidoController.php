<?php
include("../models/DB.php");

try{
    $connection = DBConnection::getConnection();

    // var_dump($connection);
}
catch(PDOException $e){
    error_log("Error de conexion - " . $e, 0);

    exit();
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
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
    global $send;
    global $connection;
    var_dump($data);
    exit();
    session_start();
    $usuario = $_SESSION["username"];


    foreach ($data as $object) {
        try {
            $query = $connection->prepare('INSERT INTO pedidos VALUES(NULL, :ususario, :producto, :total, 1)');
            $query->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $query->bindParam(':producto', $object->name, PDO::PARAM_STR);
            $query->bindParam(':total', $object->total, PDO::PARAM_INT);
            $query->bindParam(':send', $send, PDO::PARAM_INT);
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

?>