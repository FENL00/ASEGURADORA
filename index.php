<?php
require_once "configuracion/operacionesingleton.php";
$operacion = new Operaciones;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start(); // allows us to retrieve our key form the session

        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $cantidad = $operacion->validarsesion($usuario, $contrasena);

        if ($cantidad == 0) {
                echo '<script language="javascript">alert("Usuario y/o contrasena incorrectos");</script>';
        } else {
                $usuarioid = $operacion->sesionID($usuario, $contrasena);
                $id = '';
                $rol = '';
                foreach ($usuarioid as $dato) {
                        $id = $dato['u_id'];
                        $rol = $dato['u_rol'];

                }
                date_default_timezone_set("America/Bogota");
                $fecha_hora = date("Y-m-d H:i:s");

                $ip = empty($_SERVER["REMOTE_ADDR"]) ? "Desconocida" : $_SERVER["REMOTE_ADDR"];
                $operacion->nuevasesion($id, $ip, $fecha_hora);

                $_SESSION['permitido'] = 'SI';
                $_SESSION['usuario'] = $id;
                $_SESSION['rol'] = $rol;
                if ($rol == 1) { // adminstrador
                        header('Location: admin.php');
                } else {
                        header('Location: cliente.php');

                }
        }
}

include_once 'menuhead.php';
?>

<body>
        <br />
        <br />
        <div class="container">

                <div class="row">

                        <div class="col-6">
                                <center>
                                        <img src="imagen/logo.png" alt="" class="img-fluid" style="width: 20rem;">
                                </center>
                        </div>

                        <div class="col-6">
                                <center>
                                        <div class="card" style="width: 18rem;">
                                                <div class="card-header bg-primary text-white">
                                                        Iniciar Sesi&oacute;n
                                                </div>
                                                <div class="card-body">
                                                        <form method="POST">
                                                                <div class="mb-3">
                                                                        <label class="form-label">Usuario:</label>
                                                                        <input type="text" class="form-control"
                                                                                id="usuario" name="usuario"
                                                                                placeholder="Ingresar Usuario" required>
                                                                        <div lass="form-text">Ingresar Usuario.</div>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label class="form-label">Contraseña</label>
                                                                        <input type="password" class="form-control"
                                                                                id="contrasena" name="contrasena"
                                                                                placeholder="Ingresar Contraseña"
                                                                                required>
                                                                        <div lass="form-text">Ingresar contraseña.</div>

                                                                </div>


                                                                <button type="submit"
                                                                        class="btn btn-primary">Iniciar</button>
                                                        </form>
                                                </div>
                                        </div>

                        </div>
                        </center>

                </div>


                <br />
                <br />
                <br />
        </div>
        <?php include_once 'footer.php' ?>
</body>

</html>