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

        $nombreUsuario = $objetoAbogado->getNombre();
        $apellidoUsuario = $objetoAbogado->getApellidos();

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
    <title>DashBoard de <?php echo $nombreUsuario; ?></title>
    <link rel="stylesheet" href="./../../css/main.css">
</head>
<body>
<main class="all-pages-main">
        <section class="all-pages-main-section1">
            <!-- Esta es la sección la que deberemos de mantener  -->

            <?php require_once __DIR__ . "/templates/page_abogados.php"; ?>

        </section>
        <section class="all-pages-main-section2">
            <!-- Aqui irá todo el contenido de la página -->
            <div class="dashboard-main-section2">

                <div class="dashboard-main-section2-div1">
                    <p>{Fecha del día de hoy}</p>
                    <div class="dashboard-main-section2-div1-div">
                        <h1>Hola, <?php echo "$nombreUsuario $apellidoUsuario"; ?></h1>
                        <button class="button-primario"> + Nueva Tarea</button>
                    </div>
                </div>

                <div class="dashboard-main-section2-div2">
                    <div class="dashboard-main-section2-div2-div">
                        <div class="dashboard-main-section2-div2-div-div1">
                            <img src="#" alt="img">
                        </div>
                        <div class="dashboard-main-section2-div2-div-div2">
                            <p>Clientes</p>
                            <p class="dashboard-main-section2-div2-div-div2--p">{numero}</p>
                        </div>
                    </div>
                    <div class="dashboard-main-section2-div2-div">
                        <div class="dashboard-main-section2-div2-div-div1">
                            <img src="#" alt="img">
                        </div>
                        <div class="dashboard-main-section2-div2-div-div2">
                            <p>Tareas para Hoy</p>
                            <p class="dashboard-main-section2-div2-div-div2--p">{numero} <span class="dashboard-main-section2-div2-div-div2--p--span">/ {numero}</span></p>
                        </div>
                    </div>
                    <div class="dashboard-main-section2-div2-div">
                        <div class="dashboard-main-section2-div2-div-div1">
                            <img src="#" alt="img">
                        </div>
                        <div class="dashboard-main-section2-div2-div-div2">
                            <p>Pendientes</p>
                            <p class="dashboard-main-section2-div2-div-div2--p">{numero}</p>
                        </div>
                    </div>
                    <div class="dashboard-main-section2-div2-div">
                        <div class="dashboard-main-section2-div2-div-div1">
                            <img src="#" alt="img">
                        </div>
                        <div class="dashboard-main-section2-div2-div-div2">
                            <p>Vencidas</p>
                            <p class="dashboard-main-section2-div2-div-div2--p">{numero}</p>
                        </div>
                    </div>
                </div>

                <div class="dashboard-main-section2-div3">

                    <div class="dashboard-main-section2-div3-div1">
                        <div>
                            <div>
                                <h2>Tareas de Hoy</h2>
                                <p>{numero} por hacer de {numero}</p>
                            </div>
                            <a href="./tareas.php">Ver todas las tareas ></a>
                        </div>

                        <div>
                            <div>
                                <input type="checkbox">
                                <div>
                                    <h3>Titulo tarea</h3>
                                    <p>Descripción tarea</p>
                                    <div>
                                        <p>{Nombre cliente}</p>
                                        <p>{Fecha a hacer la tarea}</p>
                                        <p>{Estatus -> Pendiente/completada}</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="checkbox">
                                <div>
                                    <h3>Titulo tarea</h3>
                                    <p>Descripción tarea</p>
                                    <div>
                                        <p>{Nombre cliente}</p>
                                        <p>{Fecha a hacer la tarea}</p>
                                        <p>{Estatus -> Pendiente/completada}</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="checkbox">
                                <div>
                                    <h3>Titulo tarea</h3>
                                    <p>Descripción tarea</p>
                                    <div>
                                        <p>{Nombre cliente}</p>
                                        <p>{Fecha a hacer la tarea}</p>
                                        <p>{Estatus -> Pendiente/completada}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-main-section2-div3-div2">
                        <div>
                            <div>
                                <h2>Clientes</h2>
                                <p>Ordenados por tareas pendientes</p>
                            </div>
                            <a href="./tareas.php">Ver todas las tareas ></a>
                        </div>
                        <div>
                        <div>
                            <div>
                
                               
                                <div>
                                    <h3>{Nombre cliente}</h3>
                                    <p>Nombre de la empresa</p>
                                </div>

                                <p>{Número de tareas pendientes}</p>
                                
                            </div>
                        </div>
                        
                    </div>




                </div>
                






            </div>











        </section>
    </main>

    <script src="#"></script>
</body>
</html>