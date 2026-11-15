
<?php


    session_start();

    $correoUsuario = '';
    $errorUsuario = '';

    if(isset($_SESSION['intento-inicio-sesion'])){
        $correoUsuario = $_SESSION['intento-inicio-sesion'][0];
        $errorUsuario = $_SESSION['intento-inicio-sesion'][1];
    }

    if(isset($_SESSION['iniciada'])){
        // * Ocultado por el momento hasta terminar toda la página
        // header('Location: ./public/pages/private/dashboard.php');
        // exit();
    }

?>






<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Fin de Formación</title>
    <link rel="stylesheet" href="./public/css/main.css">
</head>
<body>

    <main class="index-main">
        <!-- Inicio sesión -->
        <section class="index-main-section1">
            <div class="index-main-section1-div1">
                <div class="index-main-section1-div1-div1">
                    <div class="index-main-section1-div1-div1-div">
                        <img src="#" alt="Ca">
                    </div>
                    <h2 class="index-main-section1-div1-div1--h2">DashBoard Abogados</h2>
                </div>
                
                <div class="index-main-section1-div1-div2">
                    <h1 class="index-main-section1-div1-div2--h1">Todo tu despacho en un solo panel</h1>
                    <p class="index-main-section1-div1-div2--p">Gestiona clientes, expedientes y plazos desde un único lugar, sin hojas de cálculo ni notas sueltas.</p>
                    <div class="index-main-section1-div1-div2-div">
                        <div class="index-main-section1-div1-div2-div-div">
                            <div class="index-main-section1-div1-div2-div-div-div">
                                <img src="#" alt="ca">
                            </div>
                            <p class="index-main-section1-div1-div2-div--p">Clientes centralizados: fichas, contacto e historial siempre a mano</p>
                        </div>
                        <div class="index-main-section1-div1-div2-div-div">
                            <div class="index-main-section1-div1-div2-div-div-div">
                                <img src="#" alt="ca">
                            </div>
                            <p class="index-main-section1-div1-div2-div--p">Tareas bajo control: plazos, vencimientos y prioridades de un vistazo</p>
                        </div>
                        <div class="index-main-section1-div1-div2-div-div">
                            <div class="index-main-section1-div1-div2-div-div-div">
                                <img src="#" alt="ca">
                            </div>
                            <p class="index-main-section1-div1-div2-div--p">Trabajo organizado: filtra y encuentra cualquier asunto en segundos</p>
                        </div>
                    </div>
                </div>
                <img src="#" alt="">
                
            </div>
            <div class="index-main-section1-div2">
                
                
                <div class="index-main-section1-div2-div">
                    <h3>Inicia sesión en nuestra web</h3>
                    <p class="index-main-section1-div2-div--p"><?php if(isset($_SESSION['registro-abogado'])){ echo $_SESSION['registro-abogado']; unset($_SESSION['registro-abogado']); }?></p>
                    <form action="./private/procesos/verificacion/verificar_inicio_sesion.php" method="POST" class="index-main-section1-div2-div-form">
                        <div class="index-main-section1-div2-div-form-div1">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" id="email" required name="email-inicio-sesion" value="<?php echo $correoUsuario; ?>">
                        </div>
                        <div class="index-main-section1-div2-div-form-div2">
                            <label for="pasword">Contraseña</label>
                            <input type="password" id="password-inicio" required name="password-inicio-sesion">
                        </div>
                        <button type="submit" class="button-primario">Entrar al DashBoard</button>
                        <div class="index-main-section1-div2-div-form-div3">
                            <a href="">¿Has olvidado la contraseña?</a>
                            <a href="#" class="index-main-section1-div2-div-form-div3--registrarse-iniciar-sesion">Registrarse</a>
                            <p class="error"> <?php if(isset($errorUsuario)){echo $errorUsuario; } ?> </p>
                        </div>
                    </form>
                </div>

            </div>
        </section>

        
        <section class="index-main-section2 hidden">
            <div class="index-main-section2-div1">
                <div class="index-main-section2-div-div">
                    <h3>Crea tu cuenta</h3>
                    <p>Empieza a gestionar tu despacho en minutos</p>
                    <!-- Registro -->
        
                    <form action="./private/procesos/verificacion/verificar_registro_abogado.php" method="POST" class="index-main-section2-div-div-form" id="registro-abogado">
                        <div class="index-main-section2-div-div-form-div1">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre-registro" placeholder="Nombre" require name="nombre-registros">
                        </div>
                        <div class="index-main-section2-div-div-form-div1">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" id="apellidos-registro" placeholder="Apellidos" require name="apellidos-registros">
                        </div>
                        <div class="index-main-section2-div-div-form-div2">
                            <label for="email-registro">Correo Electrónico</label>
                            <input type="email" id="email-registro" placeholder="nombre@despacho.com" require name="email-registros">
                        </div>
                        <div class="index-main-section2-div-div-form-div2">
                            <label for="telefono-registro">Télefono</label>
                            <input type="number" id="telefono-registro" placeholder="Número de Telefono" require name="telefono-registro">
                        </div>
                        <div class="index-main-section2-div-div-form-div3">
                            <label for="email-registro">Contraseña</label>
                            <input type="password" id="password-registro" placeholder="Escribe tu contraseña" require name="password-registro">
                            <input type="password" id="password-registro-comprobar" placeholder="Repite tu contraseña" require name="password-registro-comprobacion">
                        </div>
                        <button type="submit" class="button-primario">Registrarse</button>
                        <div class="index-main-section2-div-div-form-div4">
                            <a href="#" class="index-main-section1-div2-div-form-div3--registrarse-iniciar-sesion">Iniciar Sesión</a>
                            <ol class="index-main-section2-div-div-form-div4-div">

                            </ol>
                        </div>
                        
                    </form>
                </div>
                
            </div>

            <div class="index-main-section2-div2">
                <div class="index-main-section2-div2-div1">
                    <div class="index-main-section2-div2-div1-div">
                        <img src="#" alt="cs">
                    </div>
                    
                    <h2 class="index-main-section2-div2-div1-div--h2">Dashboard Abogados</h2>
                </div>

                <div class="index-main-section2-div2-div">
                    <h1 class="index-main-section2-div2-div--h1">Tu despacho, organizado desde el primer día</h1>
                    <p class="index-main-section2-div2-div--p">Centraliza clientes, expedientes y plazos en un único panel y olvídate de las hojas de cálculo y las notas sueltas.</p>
                    <div class="index-main-section2-div2-div-div">
                        <div class="index-main-section2-div2-div-div-div">
                            <div class="index-main-section2-div2-div-div-div-div">
                                <img src="#" alt="cs">
                            </div>
                            <p class="index-main-section2-div2-div-div--p">Clientes centralizados: fichas, contacto e historial siempre a mano</p>
                        </div>
                        <div class="index-main-section2-div2-div-div-div">
                            <div class="index-main-section2-div2-div-div-div-div">
                                <img src="#" alt="cs">
                            </div>
                            <p class="index-main-section2-div2-div-div--p">Plazos bajo control: vencimientos y prioridades de un vistazo</p>
                        </div>
                        <div class="index-main-section2-div2-div-div-div">
                            <div class="index-main-section2-div2-div-div-div-div">
                                <img src="#" alt="cs">
                            </div>
                            <p class="index-main-section2-div2-div-div--p">Expedientes ordenados: encuentra cualquier asunto en segundos</p>
                        </div>
                    </div>
                </div>
                <img src="#" alt="">

            </div>
        </section>


    </main>


    <script src="./public/js/login-registration/main.js"></script>

</body>
</html>