<!doctype html>
<html lang="en">
<?php include('menu.php');
include('config.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/258602d944.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container shadow-lg p-3 mb-5 bg-white rounded">
        <form action="insert_usuarios.php" class="row g-3" method="post" id="form_usuarios">
            <h3>Registro de Usuarios <img src="img/usuarios.png" alt="" width="80px" height="80px"></h3>
            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="usuario" id="usuario" require>
                        <label for="floatingInputGroup1">Username:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingInputGroup1" placeholder="Username" name="contra" id="contra" require>
                        <label for="floatingInputGroup1">Password:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInputGroup1" placeholder="Username" name="ema" id="ema" require>
                        <label for="floatingInputGroup1">Email:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInputGroup1" placeholder="Username" name="telef" id="telef" require>
                        <label for="floatingInputGroup1">Telefono:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-user-clock"></i></span>
                    <select name="status" id="status" class="form-select" aria-label="Default select example" require>
                        <option selected><label for="floatingInputGroup1">--Seleccione el status--</label></option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-address-book"></i></span>
                    <select name="rol_id" id="rol_id" class="form-select" aria-label="Default select example" require>
                        <option selected><label for="floatingInputGroup1">--Seleccione su rol--</label></option>
                        <?php
                        $host = 'localhost';
                        $dbname = 'veterinaria';
                        $usuario = 'root';
                        $password = '';
                        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

                        $consulta = "SELECT * FROM roles";
                        $sql = $pdo->prepare($consulta);
                        $sql->execute();
                        //COnversion de informacion
                        $registros = $sql->fetchAll(PDO::FETCH_OBJ);

                        foreach ($registros as $clientes) :
                            echo '<option value="' . $clientes->id_rol . '">' . $clientes->nombre . '</option>';
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <a href="Registro_usuario.php" id="btn6" class="btn btn-outline-warning" target="_blank">Registros</a>
                <button type="submit" class="btn btn-outline-success">Guardar Info</button>
            </div>

        </form>
        <br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>