<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mx-auto" method="post" id="form_consultas">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-paw"></i></span>
                            <select name="mascota_id" id="mascota_id" class="form-select" aria-label="Default select example" require>
                                <option selected><label for="floatingInputGroup1">--Seleccione la mascota--</label></option>
                                <?php
                                $host = 'localhost';
                                $dbname = 'veterinaria';
                                $usuario = 'root';
                                $password = '';
                                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

                                $consulta = "SELECT * FROM mascotas";
                                $sql = $pdo->prepare($consulta);
                                $sql->execute();
                                //COnversion de informacion
                                $registros = $sql->fetchAll(PDO::FETCH_OBJ);

                                foreach ($registros as $clientes) :
                                    echo '<option value="' . $clientes->id_mascotas . '">' . $clientes->nombre . '</option>';
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
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

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-shield-dog"></i> <i class="fa-solid fa-shield-cat"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="exaFis" id="exaFis" require>
                                <label for="floatingInputGroup1">Examen fisico:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-file-medical"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="diagnostic" id="diagnostic" require>
                                <label for="floatingInputGroup1">Diagnostico:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-pills"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="medi" id="medi" require>
                                <label for="floatingInputGroup1">Medicamentos:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                            <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInputGroup1" placeholder="Username" name="citaProxi" id="citaProxi" require>
                                <label for="floatingInputGroup1">Proxima cita:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-money-check-dollar"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="totPag" id="totPag" require>
                                <label for="floatingInputGroup1">Total a Pagar:</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success">Guardar</button>
            </div>
            </form>

        </div>
    </div>
</div>