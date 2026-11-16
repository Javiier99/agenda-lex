<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        require_once __DIR__ . '/../../config/bbdd.php';

        $correoUsuario = (string) trim($_POST['email-inicio-sesion']);
        $passwordUsuario = (string) $_POST['password-inicio-sesion'];

        $sql = "SELECT id_abogados, nombre_abogados, apellidos_abogados, correo_abogados, telefono_abogados, password_abogados FROM abogados WHERE correo_abogados = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $correoUsuario]);
        $abogado = $stmt->fetch(PDO::FETCH_ASSOC);

        if($abogado == true){
            $hashGuardado = $abogado['password_abogados'];
            if(password_verify($passwordUsuario, $hashGuardado)){
                unset($_SESSION['intento-inicio-sesion']);
                $_SESSION['iniciada'] = true;
                $_SESSION['id_abogado'] = $abogado['id_abogados'];
                $_SESSION['nombre_abogados'] = $abogado['nombre_abogados'];
                $_SESSION['apellidos_abogados'] = $abogado['apellidos_abogados'];
                $_SESSION['correo_abogados'] = $abogado['correo_abogados'];
                $_SESSION['telefono_abogados'] = $abogado['telefono_abogados'];
    
                header("Location: ../../../public/pages/private/dashboard.php");
                exit();
                
            }else{

                $_SESSION['intento-inicio-sesion'] = [$correoUsuario, "Error, el correo o la contraseña no es correcta"];
                header("Location: ../../../index.php");
                exit();
                
            }




        }else{
            $_SESSION['intento-inicio-sesion'] = [$correoUsuario, "Error, el correo no existe"];

            header("Location: ../../../index.php");
            exit();
        }



    }


    $passwordEscrita = $_POST['password'];        // lo que escribe el usuario en el login
    $hashGuardado = $fila['password_abogados'];   // el hash que sacas de la base de datos
    
    if (password_verify($passwordEscrita, $hashGuardado)) {
        echo "Contraseña correcta";
    } else {
        echo "Contraseña incorrecta";
    }















?>

