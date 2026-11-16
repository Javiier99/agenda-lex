<!-- Conección a la base de datos -->

<?php

    require_once __DIR__ . '/env.php';

    $host = env('DB_HOST');
    $usuario = env('DB_USER'); 
    $password = env('DB_PASS'); 
    $baseData = env('DB_NAME'); 


    // $host = env('DB_HOST', 'localhost');
    // $usuario = env('DB_USER', 'root'); 
    // $password = env('DB_PASS', ''); 
    // $baseData = env('DB_NAME', 'booking'); 


    $dns = "mysql:host=$host;dbname=$baseData"; // La conección a la BBD

    try{
        // Creamos la instancia de conexión PDO
        $pdo = new PDO($dns, $usuario, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Muestra los errores
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Devolverá los datos como un array asociativo
        ]);
        echo "Coneccion establecida";
    } catch (PDOException $e){
        die("Error al conectar la base de datos" . $e->getMessage());
    }






?>

