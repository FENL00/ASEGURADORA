<?php include_once 'menuadmin.php' ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fechanacimiento = $_POST["fechanacimiento"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $empresa = $_POST["empresa"];
    $cargo = $_POST["cargo"];
    $celularempresa = $_POST["celularempresa"];
    $ingreso = $_POST["ingreso"];
    $egreso = $_POST["egreso"];
    $tiposeguro = $_POST["tiposeguro"];
    $estadoseguro = 'INACTIVO';

    date_default_timezone_set('America/Bogota');

    $fecha_pc = date("Y-m-d");
    $fechaactual = date_create($fecha_pc);
    $fechanac = date_create($fechanacimiento);

    $contador = date_diff($fechaactual, $fechanac);
    $anos = $contador->format('%y');
    if ($anos < 18 || $anos > 64) {
        echo '<script language="javascript">alert("Edad no permitible para la aseguradora tiene ' . $anos . ' años");</script>';
    } else {

        $cantidad = $operacion->cantidadpersona($id_usuario);

        if ($cantidad == 0) { // insertar
            $operacion->nuevapersona($id_usuario, $fechanacimiento, $ciudad, $direccion, $empresa, $cargo, $celularempresa, $ingreso, $egreso, $tiposeguro, $estadoseguro);
            echo '<script language="javascript">alert("Se registro correctamente");</script>';
        } else { // actualizr  
            $id = $_POST["id"];
            $operacion->actualizarpersona($id_usuario, $fechanacimiento, $ciudad, $direccion, $empresa, $cargo, $celularempresa, $ingreso, $egreso, $tiposeguro, $estadoseguro, $id);
            echo '<script language="javascript">alert("Se actualizo correctamente");</script>';

        }

        $mensaje = "";
        $tiposeg = array("Muerte por cualquier causa", "Fallecimiento por enfermedad", "Perdida de capacidad física y/o mental");
        foreach ($tiposeg as $i => $valor) {

            if ($anos > 18 || $anos < 40) {
                if ($tiposeguro == $tiposeg[0]) {
                    $mensaje = "Su seguro de vida es de 60.000.000 Millones, pagando 35.200 mensuales, bajo Muerte por cualquier causa ";
                } elseif ($tiposeguro == $tiposeg[1]) {
                    $mensaje = "Su seguro de vida es de 40.000.000 Millones, pagando 35.200 mensuales, bajo Fallecimiento por enfermedad ";
                } elseif ($tiposeguro == $tiposeg[2]) {
                    $mensaje = "Su seguro de vida es de 30.000.000 Millones, pagando 35.200 mensuales, bajo Perdida de capacidad fisica y/o mental ";
                }

            } else {

                if ($tiposeguro == $tiposeg[0]) {
                    $mensaje = "Su seguro de vida es de 40.000.000 Millones, pagando 35.200 mensuales, bajo Muerte por cualquier causa ";
                } elseif ($tiposeguro == $tiposeg[1]) {
                    $mensaje = "Su seguro de vida es de 30.000.000 Millones, pagando 35.200 mensuales, bajo Fallecimiento por enfermedad ";
                } elseif ($tiposeguro == $tiposeg[2]) {
                    $mensaje = "Su seguro de vida es de 20.000.000 Millones, pagando 35.200 mensuales, bajo Perdida de capacidad fisica y/o mental ";
                }

            }

        }

        echo '<script language="javascript">alert("' . $mensaje . '");</script>';
        echo '<script language="javascript">alert("Se ingreso al sistema para evaluar");</script>';
    }

}
?>

<body>
    <div class="container">
        <div class="card ">
            <div class="card-header text-white bg-primary">
                <strong>Si dese Contitzar complete este formulario: Aseguradora de Personas</strong>
                <p>* Los datos ser&aacute;n almacenados en nuestra base de datos</p>
                <?php if ($id_rol == 1) {
                ?>
                <a href="listarpersona.php" class="btn btn-primary bg-info">lista de seguro de persona</a>
            </div>
            <?php
                } else {
                     ?>
            <?php
                }
                        ?>
        </div>
        <div class="card-body">
            <h5 class="card-title">Información del Cliente</h5>

            <form ROLE="FORM" METHOD="POST" ACTION="">
                <?php
                    $usuario = $operacion->buscarusuario($id_usuario);
                    foreach ($usuario as $dato) { ?>

                <div class="mb-3">
                    <label for="exampleInput" class="form-label">No. de Cedula:</label>
                    <input type="number" class="form-control" id="identificacion" name="identificacion"
                        value="<?php echo $dato['u_identificacion'] ?>" placeholder="Número de Identificacion" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombres:</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Ingresar Nombres"
                        value="<?php echo $dato['u_nombres'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingresar Apellidos"
                        value="<?php echo $dato['u_apellidos'] ?>" disabled>
                </div>
                <?php
                    }
                        ?>
                <?php
                    $pers = $operacion->buscarpersona($id_usuario);
                    ?>
                <input type="hidden" class="form-control" id="id" name="id"
                    value="<?php echo !empty($pers['p_id']) ? $pers['p_id'] : ''; ?>">


                <div class="mb-3">
                    <label class="form-label">Fecja Naicmiento:</label>
                    <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento"
                        value="<?php echo !empty($pers['p_fechanacimiento']) ? $pers['p_fechanacimiento'] : ''; ?>"
                        placeholder="Ciudad" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ciudad:</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad"
                        value="<?php echo !empty($pers['p_ciudad']) ? $pers['p_ciudad'] : ''; ?>" placeholder="Ciudad"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion"
                        value="<?php echo !empty($pers['p_direccion']) ? $pers['p_direccion'] : ''; ?>"
                        placeholder="Dirección" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Empresa Labora:</label>
                    <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa"
                        value="<?php echo !empty($pers['p_empresa']) ? $pers['p_empresa'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cargo:</label>
                    <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo en la Empresa"
                        value="<?php echo !empty($pers['p_cargo']) ? $pers['p_cargo'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Celular de la Empresa:</label>
                    <input type="number" class="form-control" id="celularempresa" name="celularempresa"
                        placeholder="Celular de Empresa"
                        value="<?php echo !empty($pers['p_celularempresa']) ? $pers['p_celularempresa'] : ''; ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ingreso:</label>
                    <input type="number" class="form-control" id="ingreso" name="ingreso"
                        placeholder="Ingreso Mensuales"                         value="<?php echo !empty($pers['p_ingreso']) ? $pers['p_ingreso'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Egreso:</label>
                    <input type="number" class="form-control" id="egreso" name="egreso" placeholder="Ingreso Mensuales"
                        value="<?php echo !empty($pers['p_egreso']) ? $pers['p_egreso'] : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInput" class="form-label">Tipo de Seguro</label>

                    <select class="form-select" id="tiposeguro" name="tiposeguro">
                        <?php
                            $tiposeg = array("Muerte por cualquier causa", "Fallecimiento por enfermedad", "Perdida de capacidad física y/o mental");
                            if ($pers['p_tiposeguro'] == '') {
                                foreach ($tiposeg as $i => $valor) {
                            ?>
                        <option value="<?php echo $tiposeg[$i] ?>">
                            <?php echo $tiposeg[$i] ?>
                        </option>
                        <?php
                                }
                            } else {
                                foreach ($tiposeg as $i => $valor) {
                                    if ($tiposeg[$i] == $pers['p_tiposeguro']) {
                                       ?>
                        <option value="<?php echo $tiposeg[$i] ?>" selected>
                            <?php echo $tiposeg[$i] ?>
                        </option>
                        <?php
                                    } else {
                                           ?>
                        <option value="<?php echo $tiposeg[$i] ?>">
                            <?php echo $tiposeg[$i] ?>
                        </option>
                        <?php
                                    }
                                }

                            }
                                            ?>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cotizar</button>

            </form>



        </div>
    </div>

    </div>

</body>
<?php include_once 'footer.php' ?>

</body>

</html>