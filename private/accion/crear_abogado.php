<?php


    $sql = "INSERT INTO abogados (nombre_abogados, apellidos_abogados, correo_abogados, telefono_abogados, password_abogados) VALUES (:nombre_abogados, :apellidos_abogados, :correo_abogados, :telefono_abogados, :password_abogados)";
    

    $hash = password_hash($passwordUsuario, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre_abogados' => $nombreUsuario,
            ':apellidos_abogados' => $apellidosUsuario,
            ':correo_abogados' => $emailUsuario,
            ':telefono_abogados' => $telefonoUsuario,
            ':password_abogados' => $hash
        ]);
        
        $idInsertado = $pdo->lastInsertId(); // ID del usuario registrado
        
    } catch (PDOException $e) {
        die("Error al insertar: " . $e->getMessage());
    }


?>

