<?php

    $server = ''; //Deben ingresar su puerto de Mysql de ustedes
    $username = '';
    $password = '';
    $database =''; //Ingresen su base de datos, que crearon en el phpMyAdmin

    try{
        $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        //echo"conexion exitosa";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST[""];
            $email = $_POST[""];
        
            // Preparar la consulta SQL para insertar los datos en la tabla
            $sql = "INSERT INTO  (nombre, email) VALUES (:nombre, :email)";
            
            // Preparar la sentencia
            $stmt = $con->prepare($sql);
            
            // Asignar valores a los parámetros
            $stmt->bindParam(':nombre', $name);
            $stmt->bindParam(':email', $email);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Datos almacenados correctamente en la base de datos.";
            } else {
                echo "Error al almacenar los datos en la base de datos.";
            }
        }

    }catch(PDOException $e){
        die('conexion de error:' . $e->getMessage());
    }

?>
