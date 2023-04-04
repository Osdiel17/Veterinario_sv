<?php
// Establecer la conexión con la base de datos
$host = 'localhost';
$dbname = 'veterinaria';
$user = 'root';
$password = '';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Manejar errores de PDO en modo de excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Obtener los valores del formulario
    $Id = $_POST['Id'];
    $nombre = $_POST['nom'];
    $telefono = $_POST['telef'];
    $dui = $_POST['dui'];
    $direccion = $_POST['direc'];
    $email = $_POST['ema'];
    $estatus = $_POST['status'];

    // Preparar la consulta SQL INSERT con marcadores de posición
    $sql = "UPDATE cliente SET nombre = :nombre, telefono = :telefono, dui = :dui, direccion = :direccion, email = :email, estatus = :status WHERE id_cliente = :id";
            
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":telefono", $telefono);
    $stmt->bindParam(":dui", $dui);
    $stmt->bindParam(":direccion", $direccion);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":status", $estatus);
    $stmt->bindParam(":id", $Id);

    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        header("Location: Registro_cliente.php");
    } else {
        print "Hubo un error al guardar los datos.";
    }
} catch(PDOException $e) {
    echo "La conexión falló: " . $e->getMessage();
}

// Cerrar la conexión con la base de datos
$conexion = null;
?>