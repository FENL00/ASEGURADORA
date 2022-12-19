<?php
require_once("configuracion/operacionesingleton.php");   
$operacion = new Operaciones;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$identificacion = $_POST["identificacion"];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$rol = 2;

 $cantidad = $operacion->validarusuario($identificacion);
 $tamanocedula = strlen($identificacion);

 if ($tamanocedula < 6 || $tamanocedula > 11) {
  echo '<script language="javascript">alert("Su cedula no tiene los cantidad de caracteres correspondientes");</script>';

} else{
    if ($cantidad != 0) {
        echo '<script language="javascript">alert("Cedula ya registrada");</script>';
    } else {

      $operacion->nuevousuario($identificacion,$nombres,$apellidos,$celular,$correo,$contrasena,$rol);
      echo '<script language="javascript">alert("Se registro correctamente");</script>';

    }
}
}

include_once('menuhead.php');
?>

        <div class="container">
            <br>
<div class="card">
      <div class="card-header bg-primary text-white">
    <strong>Bienvenidos a nuestra familia Aseguradora L & L</strong>
  </div>
  <div class="card-body">
      <form method="POST">
  <div class="mb-3">
    <label class="form-label">No. de Cedula:</label>
    <input type="number" class="form-control" name="identificacion" placeholder="Ingresar No. Cedula" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Nombres:</label>
    <input type="text" class="form-control" name="nombres" placeholder="Ingresar Nombres" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Apellidos:</label>
    <input type="text" class="form-control" name="apellidos" placeholder="Ingresar Apellidos" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Celular:</label>
    <input type="number" class="form-control" name="celular" placeholder="Ingresar No. Celular" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Correo:</label>
    <input type="email" class="form-control" name="correo" placeholder="Ingresar Correo Electronico" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="contrasena"  name="contrasena" placeholder="Ingresar Contraseña" required>

  </div>


  <button type="submit" class="btn btn-primary">Registrarme</button>
</form>
  </div>
</div>
           
                </div>


                <br/>
                <?php include_once 'footer.php'?>
                </body>
                </html>

