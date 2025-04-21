<?php
// Conexión a la base de datos (ajusta los datos según tu configuración de XAMPP)
$conexion = new mysqli("localhost", "root", "", "biblioteca");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'] ?? '';
$editorial = $_POST['editorial'] ?? '';
$clasificacion = $_POST['clasificacion'] ?? '';
$autor = $_POST['autor'] ?? '';
$codigo = $_POST['codigo'] ?? '';

// Construir consulta SQL dinámicamente
$sql = "SELECT * FROM libros WHERE 1=1";

if (!empty($nombre)) {
    $sql .= " AND nombre LIKE '%$nombre%'";
}
if (!empty($editorial)) {
    $sql .= " AND editorial LIKE '%$editorial%'";
}
if (!empty($clasificacion)) {
    $sql .= " AND clasificacion LIKE '%$clasificacion%'";
}
if (!empty($autor)) {
    $sql .= " AND autor LIKE '%$autor%'";
}
if (!empty($codigo)) {
    $sql .= " AND codigo LIKE '%$codigo%'";
}

$resultado = $conexion->query($sql);

// Mostrar resultados
if ($resultado->num_rows > 0) {
    echo "<h2>Resultados encontrados:</h2>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Código</th><th>Nombre</th><th>Autor</th><th>Editorial</th><th>Clasificación</th></tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["codigo"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["autor"] . "</td>";
        echo "<td>" . $fila["editorial"] . "</td>";
        echo "<td>" . $fila["clasificacion"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron libros.";
}

$conexion->close();
?>
