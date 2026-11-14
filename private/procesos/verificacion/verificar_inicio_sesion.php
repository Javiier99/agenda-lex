<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        require_once __DIR__ . '/../../config/bbdd.php';

        $correoUsuario = (string) trim($_POST['email-inicio-sesion']);
        $passwordUsuario = (string) $_POST['password-inicio-sesion'];


        $sql = "SELECT id_abogados, nombre_abogados, apellidos_abogados, correo_abogados, telefono_abogados, contraseña_abogados FROM abogados WHERE correo_abogados = :email AND contraseña_abogados = :password ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $correoUsuario, 'password' => $passwordUsuario]);
        $abogado = $stmt->fetch(PDO::FETCH_ASSOC);

        if($abogado == false){
            echo "Es false";

            $_SESSION['intento-inicio-sesion'] = [$correoUsuario, "Error, el correo o la contraseña no es correcta"];

            header("Location: ../../../index.php");
            exit();


        }else{
            unset($_SESSION['intento-inicio-sesion']);
            $_SESSION['iniciada'] = true;
            $_SESSION['id_abogado'] = $abogado['id_abogados'];
            $_SESSION['nombre_abogados'] = $abogado['nombre_abogados'];
            $_SESSION['apellidos_abogados'] = $abogado['apellidos_abogados'];
            $_SESSION['correo_abogados'] = $abogado['correo_abogados'];
            $_SESSION['telefono_abogados'] = $abogado['telefono_abogados'];

            header("Location: ../../../public/pages/private/dashboard.php");
            exit();
        }



    }


















?>

