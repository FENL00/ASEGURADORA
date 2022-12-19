<?php include_once 'menuadmin.php' ?>
<div class="container">
    <br><br>

    <div class="row">
        <div class="col-4">
            <div class="card">
                <?php if ($id_rol == 1) {
                        ?>
                <a href="personalistar.php"><img src="imagen/1.png" class="card-img-top" alt="..."></a>
                <?php
                        } else {
                        ?>
                <a href="personaconsultar.php"><img src="imagen/1.png" class="card-img-top" alt="..."></a>
                <?php
                        }
                        ?>
                <div class="card-body">
                    <center>
                        <p class="card-text">Seguro de Persona</p>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">

                <?php if ($id_rol == 1) {
                    ?>
                <a href="autolistar.php"><img src="imagen/2.png" class="card-img-top" alt="..."></a>
                <?php
                    } else {
                     ?>
                <a href="autoconsultar.php"><img src="imagen/2.png" class="card-img-top" alt="..."></a>
                <?php
                    }
                        ?>

                <div class="card-body">
                    <center>
                        <p class="card-text">Seguro de Vehiculo</p>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <?php if ($id_rol == 1) {
                               ?>
                <a href="viviendalistar.php"><img src="imagen/3.png" class="card-img-top" alt="..."></a>
                <?php
                               } else {
                               ?>
                <a href="viviendaconsultar.php"><img src="imagen/3.png" class="card-img-top" alt="..."></a>
                <?php
                               }
                               ?>
                <div class="card-body">
                    <center>
                        <p class="card-text">Seguro de Vivienda</p>
                    </center>
                </div>
            </div>
        </div>

    </div>
</div>

<!--Footer-->
<br /><br>
<footer class="text-white bg-primary">
    <center>
        Derecho reservados de Autor <br />
        <strong>&copy; 2022 Aseguradora</strong>
    </center>

</footer>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>