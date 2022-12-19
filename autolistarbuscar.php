<?php include_once 'menuadmin.php';
$identificacionurl = $_GET['identificacion'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $identificacion = $_POST["identificacion"];
    $identificacionvieja = $_POST["identificacionvieja"];

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    $accion = $_POST['accion'];


    if ($accion == 'actualizar') {
        $id = $_POST['id_us'];
        $cantidad = $operacion->validarusuario($identificacion);
        $tamanocedula = strlen($identificacion);
        if ($tamanocedula < 6 || $tamanocedula > 11) {
            echo '<script language="javascript">alert("Su cedula no tiene los cantidad de caracteres correspondientes");</script>';

        } else {
            if ($identificacionvieja == $identificacion) {
                $operacion->actualizarusuario($identificacion, $nombres, $apellidos, $celular, $correo, $contrasena, $rol, $id);
                echo '<script language="javascript">alert("Se actualizo correctamente");</script>';
            } else {
                if ($cantidad != 0) {
                    echo '<script language="javascript">alert("Cedula ya registrada");</script>';
                } else {

                    $operacion->actualizarusuario($identificacion, $nombres, $apellidos, $celular, $correo, $contrasena, $rol, $id);
                    echo '<script language="javascript">alert("Se actualizo correctamente");</script>';

                }
            }

        }

    } elseif ($accion == 'eliminar') {
        $id = $_POST['id_auto'];
        $operacion->eliminarvehiculo($id);
        echo '<script language="javascript">alert("Se elimino correctamente");</script>';

    }

}
?>
<div class="container">
    <br>
    <div class="card">
        <div class="card-header text-white bg-primary">
            <br>
            <div class="row">

                <div class="col">
                    <strong>Lista de Vehiculos Asegurados</strong>
                </div>
                <div class="col">
                    <form class="row" action="autolistarbuscar.php" method="GET">
                        <div class="col-9">
                            <input type="number" class="form-control form-control-sm" id="identificacion"
                                name="identificacion" placeholder="Ingrese la Identificación">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. Identificación</th>
                            <th>Nombres y Apellidos </th>
                            <th>Uso</th>
                            <th>Placa</th>
                            <th>Tipo Vehiculo</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Tipo de Seguro</th>
                            <th>Estado Seguro</th>
                            <th>Datos Cliente</th>

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $vehiculo = $operacion->mostrarvehiculidentificacion($identificacionurl);
                    foreach ($vehiculo as $dato) { ?>
                        <tr>
                            <td>
                                <?php echo $dato["u_identificacion"] ?>
                            </td>
                            <td>
                                <?php echo $dato["u_nombres"] . " " . $dato["u_apellidos"] ?>
                            </td>
                            <td>
                                <?php echo $dato["v_uso"] ?>
                            </td>

                            <td>
                                <?php echo $dato["v_placa"] ?>
                            </td>
                            <td>
                                <?php echo $dato["v_tipovehiculo"] ?>
                            </td>
                            <td>
                                <?php echo $dato["v_modelo"] ?>
                            </td>
                            <td>
                                <?php echo $dato["v_marca"] ?>
                            </td>
                            <td>
                                <?php echo $dato["v_tiposeguro"] ?>
                            </td>
                            <td>
                                <?php echo $dato["v_estadoseguro"] ?>
                            </td>
                            <td>
                                <center>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#actualizar<?php echo $dato['v_id'] ?>">
                                        Ver
                                    </button>

                                </center>
                                <div class="modal fade" id="actualizar<?php echo $dato['v_id'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header text-white bg-primary">
                                                <h5 class="modal-title">Actualizar Cliente</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form ROLE="FORM" METHOD="POST" ACTION="">

                                                    <input type="hidden" class="form-control" id="accion" name="accion"
                                                        value="actualizar">
                                                    <input type="hidden" class="form-control" id="id_us" name="id_us"
                                                        value="<?php echo !empty($dato['u_id']) ? $dato['u_id'] : ''; ?>"
                                                        required>

                                                    <div class="mb-3">
                                                        <label class="form-label">No. de Cedula:</label>
                                                        <input type="number" class="form-control" name="identificacion"
                                                            placeholder="Ingresar No. Cedula"
                                                            value="<?php echo !empty($dato['u_identificacion']) ? $dato['u_identificacion'] : ''; ?>"
                                                            required>
                                                        <input type="hidden" class="form-control"
                                                            name="identificacionvieja"
                                                            value="<?php echo !empty($dato['u_identificacion']) ? $dato['u_identificacion'] : ''; ?>">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Nombres:</label>
                                                        <input type="text" class="form-control" name="nombres"
                                                            placeholder="Ingresar Nombres"
                                                            value="<?php echo !empty($dato['u_nombres']) ? $dato['u_nombres'] : ''; ?>"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Apellidos:</label>
                                                        <input type="text" class="form-control" name="apellidos"
                                                            placeholder="Ingresar Apellidos"
                                                            value="<?php echo !empty($dato['u_apellidos']) ? $dato['u_apellidos'] : ''; ?>"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Celular:</label>
                                                        <input type="number" class="form-control" name="celular"
                                                            placeholder="Ingresar No. Celular"
                                                            value="<?php echo !empty($dato['u_celular']) ? $dato['u_celular'] : ''; ?>"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Correo:</label>
                                                        <input type="email" class="form-control" name="correo"
                                                            placeholder="Ingresar Correo Electronico"
                                                            value="<?php echo !empty($dato['u_correo']) ? $dato['u_correo'] : ''; ?>"
                                                            required>
                                                    </div>
                                                    <input type="hidden" class="form-control" name="rol"
                                                        value="<?php echo !empty($dato['u_rol']) ? $dato['u_rol'] : ''; ?>"
                                                        required>

                                                    <div class="mb-3">
                                                        <label class="form-label">Contraseña</label>
                                                        <input type="password" class="form-control" id="contrasena"
                                                            name="contrasena" placeholder="Ingresar Contraseña"
                                                            value="<?php echo !empty($dato['u_contrasena']) ? $dato['u_contrasena'] : ''; ?>"
                                                            required>

                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit"
                                                            class="btn btn-success">Actualizar</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!--ELIMINAR-->


                            <td>
                                <form action="" method="POST"
                                    onSubmit="return confirm('¿Desea eliminar la informacion del Cliente?')">
                                    <input type="hidden" class="form-control" id="accion" name="accion"
                                        value="eliminar">
                                    <input type="hidden" class="form-control form-control-sm" name="id_auto"
                                        id="id_auto" value="<?php echo $dato["v_id"]; ?>">
                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                </form>
                            </td>


                            <td>
                                <a href="autoactualizar.php?id=<?php echo $dato["u_id"] ?>"
                                    class="btn btn-success">Actualizar</a>
                            </td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <br>




</div>
<br />
<?php include_once 'footer.php' ?>
</body>

</html>