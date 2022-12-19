<?php include_once 'menuadmin.php';
$idrul = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uso = $_POST["uso"];
    $matricula = $_POST["matricula"];
    $placa = $_POST["placa"];
    $placavieja = $_POST["placavieja"];
    $matricula = $_POST["matricula"];
    $tipovehiculo = $_POST["tipovehiculo"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $licencia = $_POST["licencia"];
    $tiposeguro = $_POST["tiposeguro"];
    $estadoseguro = $_POST["estadoseguro"];
    $id = $_POST["id"];
    $id_usua = $_POST["id_usua"];

    $placaexiste = $operacion->validarvehiculo($placa);

      if($placa == $placavieja){
        $operacion->actualizarvehiculo($id_usua, $uso, $placavieja, $matricula, $tipovehiculo, $marca, $modelo, $licencia, $tiposeguro, $estadoseguro,$id);
        echo '<script language="javascript">alert("Se actualizo correctamente");</script>';
      }else{
        if($placaexiste == 0){
            $operacion->actualizarvehiculo($id_usua, $uso, $placa, $matricula, $tipovehiculo, $marca, $modelo, $licencia, $tiposeguro, $estadoseguro,$id);
            echo '<script language="javascript">alert("Se actualizo correctamente 1");</script>';

        }else{
            echo '<script language="javascript">alert("La placa de este auto ya esta registrada");</script>';
        }
      

    }

}
?>
<body>
    

<div class="container">
        <div class="card ">
            <div class="card-header text-white bg-primary" >
                <strong>Si dese Contitzar complete este formulario: Aseguradora de Vehiculo</strong>
                <p>* Los datos ser&aacute;n almacenados en nuestra base de datos</p>
                <?php if ($id_rol == 1) {
    ?>
                <a href="autolistar.php" class="btn btn-primary bg-info">Lista de Seguro de Autos</a></div>
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
$dat = $operacion->buscarvehiculo($idrul);
?>

                 <input type="hidden" class="form-control" id="id" name="id"  value = "<?php echo !empty($dat['v_id']) ? $dat['v_id'] : ''; ?>"  >
                            <input type="hidden" class="form-control" id="id_usua" name="id_usua"  value = "<?php echo !empty($dat['v_usuario']) ? $dat['v_usuario'] : ''; ?>"  >

                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Seleccionar tipo uso</label>
                            <select class="form-select" id="uso" name="uso">
                            <?php
                           $uso = array("Servicio Personal", "Servicio Publico"); 
                            if($dat['v_uso']==''){
                               
                                foreach ($uso as $i => $val) {
                                        ?>
                                        <option value="<?php echo $uso[$i] ?>"> <?php echo $uso[$i] ?></option>
                                       <?php
                                           }
                            }else{
                               foreach ($uso as $i => $val) {
                                    if ($uso[$i] == $dat['v_uso']) {
                                        ?>
                                            <option value="<?php echo $uso[$i] ?>" selected> <?php echo $uso[$i] ?></option>
                                           <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $uso[$i] ?>"> <?php echo $uso[$i] ?></option>
                                            <?php
                                        }
                                    }
    
                            }
                            ?>                             
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Placa:</label>
                            <input type="text" class="form-control" id="placa" name="placa" placeholder="No. Placa"  value = "<?php echo !empty($dat['v_placa']) ? $dat['v_placa'] : ''; ?>" required>
                            <input type="hidden" class="form-control" id="placavieja" name="placavieja" placeholder="No. Placa"  value = "<?php echo !empty($dat['v_placa']) ? $dat['v_placa'] : ''; ?>" required>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Número de Matricula:</label>
                            <input type="text" class="form-control" id="matricula" name="matricula"  placeholder="Numero de Matricula"  value = "<?php echo !empty($dat['v_matricula']) ? $dat['v_matricula'] : ''; ?>"  required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Tipo de Vehiculo</label>

                            <select class="form-select" id="tipovehiculo" name="tipovehiculo">
                            <?php
                           $tipoveh = array("Turismos","Furgoneta", "Camion", "Motocicleta","Ciclomotor"); 
                            if($dat['v_tipovehiculo']==''){
                                foreach ($tipoveh as $i => $valor) {
                                        ?>
                                        <option value="<?php echo $tipoveh[$i] ?>"> <?php echo $tipoveh[$i] ?></option>
                                       <?php
                                           }
                            }else{
                               foreach ($tipoveh as $i => $valor) {
                                    if ($tipoveh[$i] == $dat['v_tipovehiculo']) {
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
                            <label for="exampleInput" class="form-label">Marca:</label>
                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca del Vehiculo" value = "<?php echo !empty($dat['v_marca']) ? $dat['v_marca'] : ''; ?>"  required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Modelo:</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo del Vehiculo" value = "<?php echo !empty($dat['v_modelo']) ? $dat['v_modelo'] : ''; ?>"  required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Licencia de Conducción:</label>
                            <input type="text" class="form-control" id="licencia"  name="licencia" placeholder="Numero de Licencia de Conducción" value = "<?php echo !empty($dat['v_licencia']) ? $dat['v_licencia'] : ''; ?>"  required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInput" class="form-label">Tipo de Seguro</label>

                            <select class="form-select" id="tiposeguro" name="tiposeguro">
                            <?php
                           $tiposeg = array("Contra Robo y Accidente","Contra Accidente", "Contra Robo"); 
                            if($dat['v_tiposeguro']==''){
                                foreach ($tiposeg as $i => $valor) {
                                        ?>
                                        <option value="<?php echo $tiposeg[$i] ?>"> <?php echo $tiposeg[$i] ?></option>
                                       <?php
                                           }
                            }else{
                               foreach ($tiposeg as $i => $valor) {
                                    if ($tiposeg[$i] == $dat['v_tiposeguro']) {
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
                            if($dat['v_estadoseguro']==''){
                                foreach ($estseg as $i => $valor) {
                                        ?>
                                        <option value="<?php echo $estseg[$i] ?>"> <?php echo $estseg[$i] ?></option>
                                       <?php
                                           }
                            }else{
                               foreach ($estseg as $i => $valor) {
                                    if ($estseg[$i] == $dat['v_estadoseguro']) {
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
        <br/>
        </div>

        </body>
        <?php include_once 'footer.php'?>
</html>

