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
    $mascota = $_POST["mascota_id"];
    $cliente = $_POST["cliente_id"];
    $examen_fisico = $_POST["exaFis"];
    $diagnostico = $_POST["diagnostic"];
    $medicamentos = $_POST["medi"];
    $proxima_cita = $_POST["citaProxi"];
    $total = $_POST["totPag"];

    if (preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s, ]+$/", $_POST["exaFis"]) && preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s, ]+$/", $_POST["diagnostic"]) && preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s, ]+$/", $_POST["medi"]) && preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["citaProxi"]) && preg_match("/^[0-9]+(\.[0-9]{1,2})?$/", $_POST["totPag"])) {

        // Preparar la consulta SQL para insertar los datos en la tabla cliente
        $sql = "INSERT INTO consultas (id_mascotas, id_cliente, examen_fisico, diagnostico, medicamentos, proxima_cita, costo) VALUES ('$mascota', '$cliente', '$examen_fisico', '$diagnostico', '$medicamentos', '$proxima_cita', '$total')";

        $consulta = "SELECT * FROM consultas";
        
    } else {
        echo "<script>alert('Error, no se permiten caracteres especiales.'); window.history.back();</script>";
    }

    // Ejecutar la consulta SQL
    if ($pdo->query($sql) === TRUE) {
        echo "<script>alert('Los datos se insertaron correctamente.'); window.location = 'consultas.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->error;
    }

    // Cerrar la conexión a la base de datos
    $pdo->close();
}
