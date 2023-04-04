<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mx-auto" method="post" id="form_usuarios">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="usuario" id="usuario" require>
                                <label for="floatingInputGroup1">Username:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingInputGroup1" placeholder="Username" name="contra" id="contra" require>
                                <label for="floatingInputGroup1">Password:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="ema" id="ema" require>
                                <label for="floatingInputGroup1">Email:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                            <div class="form-floating">
                                <input type="number" class="form-control" id="floatingInputGroup1" placeholder="Username" name="telef" id="telef" require>
                                <label for="floatingInputGroup1">Telefono:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user-clock"></i></span>
                            <select name="status" id="status" class="form-select" aria-label="Default select example" require>
                                <option selected><label for="floatingInputGroup1">--Seleccione el status--</label></option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success">Guardar</button>
            </div>
            </form>

        </div>
    </div>
</div>