<?php include_once 'menuadmin.php' ?>
<div class="container">
   <div class="card ">
      <div class="card-header text-white bg-primary">
         <strong>BINEVENIDO (A)</strong>
      </div>
      <div class="card-body">
         <center>
            <div class="card" style="width: 18rem;">
               <img src="imagen/logo.png" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title" style="color:green;">
                     <?php echo $perfil['u_nombres'] . " " . $perfil['u_apellidos'] . "" ?>
                  </h5>
                  <h5 class="card-title">
                     CLIENTE
                  </h5>
               </div>
            </div>
         </center>

      </div>
   </div>
</div>
<br>
<!--Footer-->
<?php include_once 'footer.php' ?>
</body>

</html>