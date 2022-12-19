<?php
include_once 'menuadmin.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $identificacion = $_POST["identificacion"];
    $identificacionvieja = $_POST["identificacionvieja"];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    $id = $_POST['id'];

    $cantidad = $operacion->validarusuario($identificacion);
        $tamanocedula = strlen($identificacion);
        if ($tamanocedula < 6 || $tamanocedula > 11) {
            echo '<script language="javascript">alert("Su cedula no tiene los cantidad de caracteres correspondientes");</script>';
          
          } else{
        if($identificacionvieja == $identificacion){
            $operacion->actualizarusuario($identificacion,$nombres,$apellidos,$celular,$correo,$contrasena,$rol, $id);
            echo '<script language="javascript">alert("Se actualizo correctamente");</script>';
        }else{
            if ($cantidad != 0) {
                echo '<script language="javascript">alert("Cedula ya registrada");</script>';
            } else {
        
              $operacion->actualizarusuario($identificacion,$nombres,$apellidos,$celular,$correo,$contrasena,$rol, $id);
              echo '<script language="javascript">alert("Se actualizo correctamente");</script>';
        
            }
        }
               
       }
}


?>

        <div class="container">
            <br>
<div class="card">
      <div class="card-header bg-primary text-white">
    <strong>Configurar mi Cuenta</strong>
  </div>
  <div class="card-body">
      <form method="POST">
      <?php
$usuario = $operacion->buscarusuario($id_usuario);
foreach ($usuario as $dato) {?>
                                            <input type="hidden" class="form-control" id="id" name="id" value = "<?php echo !empty($dato['u_id']) ? $dato['u_id'] : ''; ?>"  required>

                                            <div class="mb-3">
    <label class="form-label">No. de Cedula:</label>
    <input type="number" class="form-control" name="identificacion" placeholder="Ingresar No. Cedula" value = "<?php echo !empty($dato['u_identificacion']) ? $dato['u_identificacion'] : ''; ?>" required>
    <input type="hidden" class="form-control" name="identificacionvieja"  value = "<?php echo !empty($dato['u_identificacion']) ? $dato['u_identificacion'] : ''; ?>" >

</div>
  <div class="mb-3">
    <label class="form-label">Nombres:</label>
    <input type="text" class="form-control" name="nombres" placeholder="Ingresar Nombres"  value = "<?php echo !empty($dato['u_nombres']) ? $dato['u_nombres'] : ''; ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Apellidos:</label>
    <input type="text" class="form-control" name="apellidos" placeholder="Ingresar Apellidos"  value = "<?php echo !empty($dato['u_apellidos']) ? $dato['u_apellidos'] : ''; ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Celular:</label>
    <input type="number" class="form-control" name="celular" placeholder="Ingresar No. Celular"  value = "<?php echo !empty($dato['u_celular']) ? $dato['u_celular'] : ''; ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Correo:</label>
    <input type="email" class="form-control" name="correo" placeholder="Ingresar Correo Electronico"  value = "<?php echo !empty($dato['u_correo']) ? $dato['u_correo'] : ''; ?>" required>
  </div>
  <input type="hidden" class="form-control" name="rol"  value = "<?php echo !empty($dato['u_rol']) ? $dato['u_rol'] : ''; ?>" required>

  <div class="mb-3">
    <label class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="contrasena"  name="contrasena" placeholder="Ingresar Contraseña"  value = "<?php echo !empty($dato['u_contrasena']) ? $dato['u_contrasena'] : ''; ?>" required>

  </div>
  <?php
}
?>

  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
  </div>
</div>

                </div>


                <br/>
                <?php include_once 'footer.php'?>
                </body>
                </html>

