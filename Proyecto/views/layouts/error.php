<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_login.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="../index.php"><img class="img-logo" src="../images/10.png" alt="LOGO"></a>
        </div>
    </div>
    <?php
        if(array_key_exists("error",$_GET)){
            echo "<h2 class=\"error\">" . $_GET["error"] . "</h2>";
        }
        else{
            echo "<h2>Error desconocido</h2>";
        }
    ?>
</body>
</html>