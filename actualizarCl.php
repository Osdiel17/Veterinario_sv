<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/258602d944.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none" href="principal.php">
                <img class="bi me-2" src="img/logo.png" alt="" width="40px" height="40px">
                </img>
                <span class="fs-4">Veterinaria Rodríguez</span>
            </a>
        </header>
    </div>
    <?php include('config.php');

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

    $Id = $_GET['Id'];

    $consulta = "SELECT * FROM cliente WHERE id_cliente = '$Id'";
    $sql = $conexion->prepare($consulta);
    $sql->execute();
    //COnversion de informacion
    $registros = $sql->fetchAll(PDO::FETCH_OBJ);

    foreach ($registros as $clientes) {

        $clientes->id_cliente;
        $clientes->nombre;
        $clientes->telefono;
        $clientes->dui;
        $clientes->direccion;
        $clientes->email;
        $clientes->estatus;
    }

    // Cerrar la conexión a la base de datos
    $pdo->close();
    ?>

    <div class="container shadow-lg p-3 mb-5 bg-white rounded">
        <form action="actualizarClProceso.php" class="row g-3" method="post">
            <h3>Actualizar Registro del Cliente <img src="img/cliente.png" alt="" width="80px" height="80px"></h3>
            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <div class="form-floating">
                        <input type="hidden" name="Id" value="<?= $clientes->id_cliente ?>">
                        <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="nom" id="nom" value="<?= $clientes->nombre ?>">
                        <label for="floatingInputGroup1">Nombre:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInputGroup1" placeholder="Username" name="telef" id="telef" value="<?= $clientes->telefono ?>">
                        <label for="floatingInputGroup1">Telefono:</label>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="direc" id="direc" value="<?= $clientes->direccion ?>">
                        <label for="floatingInputGroup1">Direccion:</label>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="dui" id="dui" value="<?= $clientes->dui ?>">
                        <label for="floatingInputGroup1">Dui:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInputGroup1" placeholder="Username" name="ema" id="ema" value="<?= $clientes->email ?>">
                        <label for="floatingInputGroup1">Email:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-user-clock"></i></span>
                    <select name="status" id="status" class="form-select" aria-label="Default select example" require>
                        <option selected value="<?= $clientes->estatus ?>"><label for="floatingInputGroup1">--Seleccione el status--</label></option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <a href="Registro_cliente.php" id="btn6" class="btn btn-outline-danger">Cancelar</a>
                <button type="submit" class="btn btn-outline-success">Guardar cambios</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>