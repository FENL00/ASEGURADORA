<?php include_once 'menuadmin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $operacion->eliminarsesion($id);
    echo '<script language="javascript">alert("Se elimino correctamente");</script>';

}
?>
<div class="container">
    <br>
    <div class="card">
        <div class="card-header text-white bg-primary">
            <br>
            <div class="row">

                <div class="col">
                    <strong>Lista de Logeos</strong>
                </div>
                <div class="col">
                    <form class="row" action="listarsesionbuscar.php" method="GET">
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

            <table class="table">
                <thead>
                    <tr>
                        <th>No. Identificación</th>
                        <th>Nombres y Apellidos </th>
                        <th>IP</th>
                        <th>Fecha y Hora</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sesiones = $operacion->mostrarsesiones();
                        foreach ($sesiones as $dato) { ?>
                    <tr>
                        <td>
                            <?php echo $dato["u_identificacion"] ?>
                        </td>
                        <td>
                            <?php echo $dato["u_nombres"] . " " . $dato["u_apellidos"] ?>
                        </td>
                        <td>
                            <?php echo $dato["s_ip"] ?>
                        </td>
                        <td>
                            <?php echo $dato["s_fecha"] ?>
                        </td>

                        <td>
                            <form action="" method="POST"
                                onSubmit="return confirm('¿Desea eliminar la informacion de la Sesion?')">
                                <input type="hidden" class="form-control form-control-sm" name="id" id="id"
                                    value="<?php echo $dato["s_id"]; ?>">
                                <input type="submit" value="Eliminar" class="btn btn-danger">

                            </form>
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