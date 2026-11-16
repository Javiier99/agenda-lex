<?php

    session_start();

    if(isset($_SESSION['iniciada']) || $_SESSION['iniciada'] == true){

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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard de <?php echo $objetoAbogado->getNombre(); ?></title>
    <link rel="stylesheet" href="/javier/agenda-lex-main/public/css/main.css">
</head>
<body>
<main class="all-pages-main">
        <section class="all-pages-main-section1">
            <!-- Esta es la sección la que deberemos de mantener  -->

            <?php require_once __DIR__ . "/templates/page_abogados.php"; ?>

        </section>
        <section class="all-pages-main-section2">
            <!-- Aqui irá todo el contenido de la página -->


            










        </section>
    </main>

    <script src="#"></script>
</body>
</html>