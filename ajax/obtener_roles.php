<?php 

include('../config.php');
// Verificar que se ha recibido el ID del cliente
if (!isset($_GET['id'])) {
    die('No se ha recibido el ID del rol');
}

$idRoles = $_GET['id'];

// Preparar la consulta SQL para obtener los datos del rol
$consulta = $pdo->prepare('SELECT * FROM roles WHERE id_rol = :id');

// Asignar el valor del parámetro :id_rol
$consulta->bindParam(':id', $idRoles, PDO::PARAM_INT);

// Ejecutar la consulta
$consulta->execute();

// Obtener los resultados
$roles = $consulta->fetch(PDO::FETCH_ASSOC);

// Devolver los datos del rol como JSON
echo json_encode($roles);
