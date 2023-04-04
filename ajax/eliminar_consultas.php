<?php
// Establecer la conexión a la base de datos
include('../config.php');
// Obtener el ID de la consulta a eliminar
$idConsulta = $_GET["id"];

// Preparar la consulta SQL para eliminar la consulta
$sql = "DELETE FROM consultas WHERE id_consulta = :id";
$consulta = $pdo->prepare($sql);
$consulta->bindParam(":id", $idConsulta);

// Ejecutar la consulta SQL y verificar si se eliminó la consulta correctamente
try {
    $consulta->execute();
    if ($consulta->rowCount() == 1) {
        echo "Cosnulta eliminada correctamente";
    } else {
        echo "No se encontró ninguna cosnulta con el ID especificado";
    }
} catch (PDOException $e) {
    echo "Error al eliminar la consulta: " . $e->getMessage();
}
