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
    $username = $_POST["usuario"];
    $password = $_POST["contra"];
    $email = $_POST["ema"];
    $telefono = $_POST["telef"];
    $status = $_POST["status"];
    $rol = $_POST["rol_id"];

    if (preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/", $_POST["usuario"]) && preg_match("/^[0-9a-zA-Z]+$/", $_POST["contra"]) && preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*([.][a-zA-Z]{2,4})$/", $_POST["ema"]) && preg_match("/^[0-8]{8}$/", $_POST["telef"])&& preg_match("/^(0|1)$/", $_POST["status"])) {

        // Preparar la consulta SQL para insertar los datos en la tabla cliente
        $sql = "INSERT INTO usuario (usuarios, password, email, telefono, status, id_roles) VALUES ('$username', '$password', '$email', '$telefono', '$status', '$rol')";

        $consulta = "SELECT * FROM usuario";
        
    } else {
        echo "<script>alert('Error, no se permiten caracteres especiales.'); window.history.back();</script>";
    }

    // Ejecutar la consulta SQL
    if ($pdo->query($sql) === TRUE) {
        echo "<script>alert('Los datos se insertaron correctamente.'); window.location = 'usuarios.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->error;
    }

    // Cerrar la conexión a la base de datos
    $pdo->close();
}
