<?php
$servername = "localhost";  // Servidor (XAMPP usa "localhost")
$username = "root";         // Usuario por defecto en XAMPP
$password = "";             // Sin contraseña en XAMPP
$dbname = "biblioteca";     // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos";
}
?>
