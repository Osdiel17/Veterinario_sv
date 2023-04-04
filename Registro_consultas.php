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
<?php /*include('modal/consultas_modal.php');*/ ?>
<body>
    <div class="container shadow-lg p-3 mb-5 bg-white rounded">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="search" id="busqueda-consultas" class="form-control" placeholder="Buscar Consulta.." aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <table class="table table-striped table-hover" id="tabla-consultas">
            <thead>
                <tr>
                    <th scope="col">Id_mascota</th>
                    <th scope="col">Id_usuario</th>
                    <th scope="col">Examen fisico</th>
                    <th scope="col">Diagnostico</th>
                    <th scope="col">Medicamentos</th>
                    <th scope="col">Proxima cita</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/consultas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>