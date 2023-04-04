<?php
// Definir la información de la conexión
$host = 'localhost';
$dbname = 'veterinaria';
$user = 'root';
$password = '';

// Crear una instancia de la clase PDO
try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

// Datos de conexión a la base de datos
$host = 'localhost';
$dbname = 'veterinaria';
$user = 'root';
$password = '';

// Crear conexión a la base de datos
$pdo = new mysqli($host, $user, $password, $dbname);

// Verificar si hay errores de conexión
if ($pdo->connect_error) {
    die("La conexión falló: " . $pdo->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Obtener los datos del formulario
    $nombre = $_POST["nomRol"];
    $estatus = $_POST["estatus"];

    if (preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ@ ]+$/", $_POST["nomRol"]) && preg_match("/^(0|1)$/", $_POST["estatus"])) {

        // Preparar la consulta SQL para insertar los datos en la tabla cliente
        $sql = "INSERT INTO roles (nombre, status) VALUES ('$nombre', '$estatus')";

        $consulta = "SELECT * FROM roles";
    } else {
        echo "<script>alert('Error, no se permiten caracteres especiales.'); window.history.back();</script>";
    }

    // Ejecutar la consulta SQL
    if ($pdo->query($sql) === TRUE) {
        echo "<script>alert('Los datos se insertaron correctamente.'); window.location = 'roles.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->error;
    }

    // Cerrar la conexión a la base de datos
    $pdo->close();
}
