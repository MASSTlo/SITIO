<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "biblioteca");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener datos del formulario
$fecha_prestamo = $_POST['fecha_prestamo'];
$fecha_regreso = $_POST['fecha_regreso'];
$nombre = $_POST['nombre'];
$grupo = $_POST['grupo'];
$turno = $_POST['turno'];
$numero_control = $_POST['numero_control'];
$documento = $_POST['documento'];
$codigo = $_POST['codigo'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editorial = $_POST['editorial'];

// Insertar en la base de datos
$sql = "INSERT INTO solicitud (fecha_prestamo, fecha_regreso, nombre, grupo, turno, numero_control, documento, codigo, titulo, autor, editorial)
VALUES ('$fecha_prestamo', '$fecha_regreso', '$nombre', '$grupo', '$turno', '$numero_control', '$documento', '$codigo', '$titulo', '$autor', '$editorial')";

if ($conexion->query($sql) === TRUE) {
    echo "📚 Solicitud guardada exitosamente.";
} else {
    echo "❌ Error: " . $conexion->error;
}

$conexion->close();
?>
