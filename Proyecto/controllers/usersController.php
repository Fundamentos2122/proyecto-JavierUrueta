<?php 

include("../models/DB.php");

try {
    $connection = DBConnection::getConnection();
}
catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);

    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Obtener información del POST
    $username = trim($_POST["user"]);
    $password = trim($_POST["password"]);       
    $password = password_hash($password, PASSWORD_DEFAULT);  
    $type = "normal";

    try {
        $query = $connection->prepare('INSERT INTO usuarios VALUES(NULL, :username, :password, "normal")');
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la inserción";
        }
        else {
            header('Location: http://localhost/proyecto/views/index.php');
        }
    }
    catch(PDOException $e) {
        echo $e;
    }
}

?>