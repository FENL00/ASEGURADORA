<?php include_once 'menuadmin.php';
$idrul = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tipovivienda = $_POST["tipovivienda"];
    $numeroescritura = $_POST["numeroescritura"];
    $numeroescrituravieja = $_POST["numeroescrituravieja"];
    $zona = $_POST["zona"];
    $estrato = $_POST["estrato"];
    $departamento = $_POST["departamento"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $tiposeguro = $_POST["tiposeguro"];
    $estadoseguro = $_POST["estadoseguro"];
    $id = $_POST["id"];
    $id_usua = $_POST["id_usua"];

    $escrituraexiste = $operacion->validarvivienda($numeroescritura);

      if($numeroescritura == $numeroescrituravieja){
        $operacion->actualizarvivienda($id_usua, $tipovivienda, $numeroescrituravieja, $zona, $estrato, $departamento, $ciudad, $direccion, $tiposeguro, $estadoseguro, $id);
        echo '<script language="javascript">alert("Se actualizo correctamente");</script>';
      }else{
        if($escrituraexiste == 0){
            $operacion->actualizarvivienda($id_usua, $tipovivienda, $numeroescritura, $zona, $estrato, $departamento, $ciudad, $direccion, $tiposeguro, $estadoseguro, $id);
            echo '<script language="javascript">alert("Se actualizo correctamente 1");</script>';

        }else{
            echo '<script language="javascript">alert("La Escritura de la vivienda ya esta registrada");</script>';
        }
      }

    
}
?>
<body>

<div class="container">
        <div class="card ">
            <div class="card-header text-white bg-primary" >
                <strong>Si dese Contitzar complete este formulario: Aseguradora de Vivienda</strong>
                <p>* Los datos ser&aacute;n almacenados en nuestra base de datos</p>
                <?php if ($id_rol == 1) {
    ?>
                <a href="viviendalistar.php" class="btn btn-primary bg-info">Lista de Seguro de Vivienda</a></div>
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
$usuario = $operacion->buscarusuario($idrul);
foreach ($usuario as $dato) {?>

                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">No. de Cedula:</label>
                            <input type="number" class="form-control" id="identificacion"  name="identificacion" value="<?php echo $dato['u_identificacion'] ?>" placeholder="Número de Identificacion" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombres:</label>
                            <input type="text" class="form-control" name="nombres" placeholder="Ingresar Nombres" value="<?php echo $dato['u_nombres'] ?>"disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Ingresar Apellidos" value="<?php echo $dato['u_apellidos'] ?>" disabled>
                        </div>
                        <?php
}
?>
                    <?php
$dat = $operacion->buscarvivienda($idrul);
?>
                            <input type="hidden" class="form-control" id="id" name="id"  value = "<?php echo !empty($dat['vi_id']) ? $dat['vi_id'] : ''; ?>"  >
                            <input type="hidden" class="form-control" id="id_usua" name="id_usua"  value = "<?php echo !empty($dat['vi_usuario']) ? $dat['vi_usuario'] : ''; ?>"  >

  <div class="mb-3">
                            <label for="exampleInput" class="form-label">Tipo de Vehiculo</label>

                            <select class="form-select" id="tipovivienda" name="tipovivienda">
                            <?php
                           $tipoveh = array("Casa","Apartamento", "Local", "Lote","Oficina","Bodega"); 
                            if($dat['vi_tipovivienda']==''){
                                foreach ($tipoveh as $i => $valor) {
                                        ?>
                                        <option value="<?php echo $tipoveh[$i] ?>"> <?php echo $tipoveh[$i] ?></option>
                                       <?php
                                           }
                            }else{
                               foreach ($tipoveh as $i => $valor) {
                                    if ($tipoveh[$i] == $dat['vi_tipovivienda']) {
                                        ?>
                                            <option value="<?php echo $tipoveh[$i] ?>" selected> <?php echo $tipoveh[$i] ?></option>
                                           <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $tipoveh[$i] ?>"> <?php echo $tipoveh[$i] ?></option>
                                            <?php
                                        }
                                    }
    
                            }
                            ?> 

                            </select>
                        </div>



                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Número de Escritura:</label>
                            <input type="text" class="form-control" id="numeroescritura" name="numeroescritura" value = "<?php echo !empty($dat['vi_escritura']) ? $dat['vi_escritura'] : ''; ?>"  placeholder="Numero de Escritura" required>
                            <input type="hidden" class="form-control" id="numeroescrituravieja" name="numeroescrituravieja" value = "<?php echo !empty($dat['vi_escritura']) ? $dat['vi_escritura'] : ''; ?>"  placeholder="Numero de Escritura" required>

                        </div>

                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Seleccionar Zona</label>
                            <select class="form-select" id="zona" name="zona">
                            <?php
                           $zon = array("Urbana", "Rural"); 
                            if($dat['vi_zona']==''){
                               
                                foreach ($zon as $i => $val) {
                                        ?>
                                        <option value="<?php echo $zon[$i] ?>"> <?php echo $zon[$i] ?></option>
                                       <?php
                                           }
                            }else{
                               foreach ($zon as $i => $val) {
                                    if ($zon[$i] == $dat['vi_zona']) {
                                        ?>
                                            <option value="<?php echo $zon[$i] ?>" selected> <?php echo $zon[$i] ?></option>
                                           <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $zon[$i] ?>"> <?php echo $zon[$i] ?></option>
                                            <?php
                                        }
                                    }
    
                            }
                            ?>                             
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Estrato de la Vivienda:</label>
                            <input type="text" class="form-control" id="estrato" name="estrato" value = "<?php echo !empty($dat['vi_estrato']) ? $dat['vi_estrato'] : ''; ?>"   placeholder="Estrato de la Vivienda" required>
                        </div>
                          
                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Departamento:</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" value = "<?php echo !empty($dat['vi_departamento']) ? $dat['vi_departamento'] : ''; ?>"  placeholder="Escriba Departamento" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Ciudad:</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" value = "<?php echo !empty($dat['vi_ciudad']) ? $dat['vi_ciudad'] : ''; ?>"  placeholder="Escriba Ciudad" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value = "<?php echo !empty($dat['vi_direccion']) ? $dat['vi_direccion'] : ''; ?>"  placeholder="Escriba Dirección" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Tipo de Seguro</label>

                            <select class="form-select" id="tiposeguro" name="tiposeguro">
                            <?php
                           $tiposeg = array("Contra Robo y Desastres","Contra Desastres", "Contra Robo"); 
                            if($dat['vi_tiposeguro']==''){
                                foreach ($tiposeg as $i => $valor) {
                                        ?>
                                        <option value="<?php echo $tiposeg[$i] ?>"> <?php echo $tiposeg[$i] ?></option>
                                       <?php
                                           }
                            }else{
                               foreach ($tiposeg as $i => $valor) {
                                    if ($tiposeg[$i] == $dat['vi_tiposeguro']) {
                                        ?>
                                            <option value="<?php echo $tiposeg[$i] ?>" selected> <?php echo $tiposeg[$i] ?></option>
                                           <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $tiposeg[$i] ?>"> <?php echo $tiposeg[$i] ?></option>
                                            <?php
                                        }
                                    }
    
                            }
                            ?> 

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Tipo de Seguro</label>

                            <select class="form-select" id="estadoseguro" name="estadoseguro">
                            <?php
                           $estseg = array("ACTIVO","INACTIVO"); 
                            if($dat['vi_estadoseguro']==''){
                                foreach ($estseg as $i => $valor) {
                                        ?>
                                        <option value="<?php echo $estseg[$i] ?>"> <?php echo $estseg[$i] ?></option>
                                       <?php
                                           }
                            }else{
                               foreach ($estseg as $i => $valor) {
                                    if ($estseg[$i] == $dat['vi_estadoseguro']) {
                                        ?>
                                            <option value="<?php echo $estseg[$i] ?>" selected> <?php echo $estseg[$i] ?></option>
                                           <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $estseg[$i] ?>"> <?php echo $estseg[$i] ?></option>
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

        <br/>

        </body>
        <?php include_once 'footer.php'?>
</html>
