<!doctype html>
<html lang="en">
<?php include('menu.php');
include('config.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mascotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/258602d944.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container shadow-lg p-3 mb-5 bg-white rounded">
        <form action="insert_mascotas.php" class="row g-3" method="post" id="form_mascotas">
            <h3>Registro de Mascota <img src="img/logoMascotas.png" alt="" width="80px" height="80px"></h3>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-paw"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="nomMasc" id="nomMasc" require>
                        <label for="floatingInputGroup1">Nombre de la mascota:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-sharp fa-solid fa-mars-and-venus"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="raza" id="raza" require>
                        <label for="floatingInputGroup1">Raza:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-droplet"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="color" id="color" require>
                        <label for="floatingInputGroup1">Color:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-weight-scale"></i></span>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInputGroup1" placeholder="Username" name="peso" id="peso" step="0.01" require>
                        <label for="floatingInputGroup1">Peso:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInputGroup1" placeholder="Username" name="alt" id="alt" step="0.01" require>
                        <label for="floatingInputGroup1">Altura:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-venus-mars"></i></span>
                    <select name="sexo" id="sexo" class="form-select" aria-label="Default select example" require>
                        <option selected><label for="floatingInputGroup1">--Seleccione el sexo de la mascota--</label></option>
                        <option value="1">Macho</option>
                        <option value="2">Hembra</option>
                    </select>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGroup1" placeholder="Username" name="nacMas" id="nacMas" require>
                        <label for="floatingInputGroup1">Nacimiento de la Mascota:</label>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <select name="cliente_id" id="cliente_id" class="form-select" aria-label="Default select example" require>
                        <option selected><label for="floatingInputGroup1">--Seleccione el cliente--</label></option>
                        <?php
                        $host = 'localhost';
                        $dbname = 'veterinaria';
                        $usuario = 'root';
                        $password = '';
                        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

                        $consulta = "SELECT * FROM cliente";
                        $sql = $pdo->prepare($consulta);
                        $sql->execute();
                        //COnversion de informacion
                        $registros = $sql->fetchAll(PDO::FETCH_OBJ);

                        foreach ($registros as $clientes) :
                            echo '<option value="' . $clientes->id_cliente . '">' . $clientes->nombre . '</option>';
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <a href="Registro_mascota.php" id="btn6" class="btn btn-outline-warning" target="_blank">Registros</a>
                <button type="submit" class="btn btn-outline-success">Guardar Info</button>
            </div>

        </form>
        <br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>