<?php

    session_start();

    if(isset($_SESSION['iniciada']) || $_SESSION['iniciada'] == false){
        echo "Ha entrado";

        $sesionIniciada = $_SESSION['iniciada'];
        $idAbogado = $_SESSION['id_abogado'];
        $nombreAbogados = $_SESSION['nombre_abogados'];
        $apellidosAbogados = $_SESSION['apellidos_abogados'];
        $correoAbogados = $_SESSION['correo_abogados'];
        $telefonoAbogados = $_SESSION['telefono_abogados'];

        require_once __DIR__ . '/../../../private/class/abogados.php';

        $objetoAbogado = new Abogados($idAbogado, $nombreAbogados, $apellidosAbogados, $correoAbogados, $telefonoAbogados);


    }else{
        header('Location: ../../../index.php');
        exit();
    }






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard de <?php echo $objetoAbogado->getNombre(); ?></title>
</head>
<body>
    <a href="../../../private/class/abogados.php"></a>
</body>
</html>