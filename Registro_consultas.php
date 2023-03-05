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

    // Preparar la consulta SQL para insertar los datos en la tabla cliente
    $sql = "INSERT INTO consultas (id_mascotas, id_cliente, examen_fisico, diagnostico, medicamentos, proxima_cita, costo) VALUES ('$mascota', '$cliente', '$examen_fisico', '$diagnostico', '$medicamentos', '$proxima_cita', '$total')";

    $consulta = "SELECT * FROM consultas";

    // Ejecutar la consulta SQL
    if ($pdo->query($sql) === TRUE) {
        echo "<script>alert(Los datos se insertaron correctamente.)</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $pdo->error;
    }

    // Cerrar la conexión a la base de datos
    $pdo->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Consultas</title>
    <?php include('menu6.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container shadow-lg p-3 mb-5 bg-white rounded">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id_mascota</th>
                    <th scope="col">Id_usuario</th>
                    <th scope="col">Examen fisico</th>
                    <th scope="col">Diagnostico</th>
                    <th scope="col">Medicamentos</th>
                    <th scope="col">Proxima cita</th>
                    <th scope="col">Costo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = "SELECT * FROM consultas";
                $sql = $conexion->prepare($consulta);
                $sql->execute();
                //COnversion de informacion
                $registros = $sql->fetchAll(PDO::FETCH_OBJ);

                foreach ($registros as $clientes) {
                ?>

                    <tr>
                        <td><?= $clientes->id_consulta ?></td>
                        <td><?= $clientes->id_mascotas ?></td>
                        <td><?= $clientes->id_cliente ?></td>
                        <td><?= $clientes->examen_fisico ?></td>
                        <td><?= $clientes->diagnostico ?></td>
                        <td><?= $clientes->medicamentos ?></td>
                        <td><?= $clientes->proxima_cita ?></td>
                        <td><?= $clientes->costo ?></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>