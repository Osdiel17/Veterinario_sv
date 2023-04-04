<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mx-auto" method="post" id="form_mascotas">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-paw"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="nomMasc" id="nomMasc" require>
                                <label for="floatingInputGroup1">Nombre de la mascota:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-sharp fa-solid fa-mars-and-venus"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="raza" id="raza" require>
                                <label for="floatingInputGroup1">Raza:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-droplet"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="color" id="color" require>
                                <label for="floatingInputGroup1">Color:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-weight-scale"></i></span>
                            <div class="form-floating">
                                <input type="number" class="form-control" id="floatingInputGroup1" placeholder="Username" name="peso" id="peso" step="0.01" require>
                                <label for="floatingInputGroup1">Peso:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                            <div class="form-floating">
                                <input type="number" class="form-control" id="floatingInputGroup1" placeholder="Username" name="alt" id="alt" step="0.01" require>
                                <label for="floatingInputGroup1">Altura:</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-venus-mars"></i></span>
                            <select name="sexo" id="sexo" class="form-select" aria-label="Default select example" require>
                                <option selected><label for="floatingInputGroup1">--Seleccione el sexo de la mascota--</label></option>
                                <option value="1">Macho</option>
                                <option value="2">Hembra</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                            <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInputGroup1" placeholder="Username" name="nacMas" id="nacMas" require>
                                <label for="floatingInputGroup1">Nacimiento de la Mascota:</label>
                            </div>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success">Guardar</button>
            </div>
            </form>

        </div>
    </div>
</div>