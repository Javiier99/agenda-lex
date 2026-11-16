<?php



    if($_SERVER['REQUEST_METHOD'] == "POST"){

        session_start();

        require_once __DIR__ . '/../../config/bbdd.php';

        $nombreUsuario = (string) trim($_POST['nombre-registros']);
        $apellidosUsuario = (string) trim($_POST['apellidos-registros']);
        $emailUsuario = (string) trim($_POST['email-registros']);
        $telefonoUsuario = (int) trim($_POST['telefono-registro']);
        $passwordUsuario = (string) $_POST['password-registro'];

        $sql = "SELECT id_abogados, nombre_abogados, apellidos_abogados, correo_abogados, telefono_abogados, password_abogados FROM abogados WHERE correo_abogados = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $emailUsuario]);
        $registroEmailAbogado = $stmt->fetch(PDO::FETCH_ASSOC);

        if($registroEmailAbogado == false){
            // Está todo ok, ya que no existe ese correo registrado
            // Guardar los datos en la base de datos
            // Redirigir de nuevo al inicio sesión sin la necesidad de registrarse de nuevo, indicarlo en un mensaje
            try{
                require_once __DIR__ . '/../../accion/crear_abogado.php';
                $_SESSION['registro-abogado'] = "El registro está completo, inicie sesión con las credenciales usadas";
                header("Location: ../../../index.php");
                exit();
            }catch(PDOException $e){
                $_SESSION['registro-abogado'] = "Ha ocurrido un error, vuelve a intenterlo más tarde";
                header("Location: ../../../index.php");
                exit();
            }
            
            




        }else{
            // Está mal ya que el correo está registrado y por lo tanto no puede registrarse si no recuperar la contraseña
            // Indicar que está registrado y que se recomienda recuperar la contraseña
            $_SESSION['registro-abogado'] = "El correo existe, prueba a iniciar sesión o recordar contraseña";
            header("Location: ../../../index.php");
            exit();


        }


        
    }













?>