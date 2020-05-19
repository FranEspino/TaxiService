<?php
session_start();
if (empty($_SESSION)) {
  header("location: ../index.php");
} else {
  $name_user =  $_SESSION['user'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('../headboard.php') ?>
  <title>Administración</title>
  <link rel="icon" href="../../resource/icon.png">
  <link rel="stylesheet" href="../flexboxgrid.min.css">
  <link rel="stylesheet" href="admin.css">
  <script src="js/chartJS/Chart.js"></script>
</head>

<body>

  <div class=" row">
      <nav id="menu-bar" class="menu-bar pt-1">
        <div class="scroll row middle-xs pt-2 center-xs">
          <h4 style="padding-left:2em; " class="center-xs col-xs-10">Taxi Service</h4>
          <span class="row pb-4 center-xs col-xs-2" style="
              font-size: 1em; color: #d9d9d9;">
            <a id='icon-menu' style=' text-decoration:none;
              color:#d9d9d9; outline-style: none; cursor:pointer;'>

              <i class="fas fa-bars"></i>
            </a>
          </span>
          <?php if ($name_user == 'FrapoDeveloper') : ?>
            <img style="width:5em;" src="../../resource/user_male.jpg" class="rounded-circle pt-3" title="Usuario">
          <?php elseif ($name_user == 'ZolanshJimenez') : ?>
            <img style="width:5em;" src="../../resource/user_female.jpg" class="rounded-circle pt-3" title="Usuario">
          <?php endif; ?>
          <!--Nombre de usuario traido desde el inicio de sesión -->
          <p style="font-size:13px;" class="col-xs-12"><?php echo "@" . $_SESSION['user']; ?></p>
          <div class="services">
            <a id="Home" class="py-2 item" style='text-decoration:none;
                  outline-style: none; cursor:pointer; display:flex;
                  justify-content:center; width:100%; '>
              <span style="font-size:1em;">
                <i class="fas fa-home"></i></span>
              <p class="pl-3">Principal</p>
            </a>

            <a href="../Report/js/chartJS/samples/line.php" class="py-2 item " style='text-decoration:none;
                  outline-style: none; cursor:pointer; display:flex; 
                  justify-content:center;  width:100%; color:#d9d9d9; '>
              <span style="font-size:1em;">
                <i class="fas fa-table"></i>
              </span>
              <p class="pl-3">Reportes</p>
            </a>

            <a id="Drivers" class="py-2 item" style='text-decoration:none;
                  outline-style: none; cursor:pointer; display:flex; 
                  justify-content:center; width:100%; '>
              <span style="font-size:1em;">
                <i class="fas fa-users"></i> </span>
              <p class="pl-3">Choferes</p>
            </a>


            <a class="py-2 item" style='text-decoration:none;
                  outline-style: none; cursor:pointer; display:flex; 
                  justify-content:center; width:100%; '>
              <span style="font-size:1em;">
                <i class="fas fa-clock"></i></span>

              <p class="pl-3">Pendientes</p>
            </a>

          </div>

        </div>
        <p style="font-size:13px;" class="pl-4 pt-2">Ajustes</p>
        <div style="font-size: 12px;" class="row end-xs Ajustes">

          <a class="item2" style='text-decoration:none;
              outline-style: none; cursor:pointer; padding-right:3em; width:100%; '>

            <span style="font-size:1em;">
              <i class="fas fa-moon"></i>

            </span>

            <p class="pl-3 ">Noche</p>
          </a>

          <a class="item2 " style='text-decoration:none; 
              outline-style: none; cursor:pointer;  color:#d9d9d9; 
              padding-right:3em;  width:100%; ' href="../../controller/getout.php">
            <span style="font-size:1em;">
              <i class="fas fa-sign-out-alt"></i>

            </span>

            <p class="pl-3 pb-4">Salir</p>
          </a>


        </div>

      </nav>
      <?php include('../header.php'); ?>

      <div id="Home_section" class="table col-md-12" style="margin-top:3.5em; z-index:10;">
        <nav>
          <table class="bg-primary  table table-bordered table-sm text-center">
            <!--tabla pequeña com borde-->
            <thead>
              <tr>
                <td style="font-family: sans-serif; font-size: 14px;"><strong>Fecha y Hora</strong></td>
                <td style="font-family: sans-serif;font-size: 14px;"><strong>Telefono</strong></td>
                <td style="font-family: sans-serif;font-size: 14px;"><strong>Cliente</strong></td>
                <td style="font-family: sans-serif;font-size: 14px;"><strong>Chofer</strong></td>
                <td style="font-family: sans-serif;font-size: 14px;"><strong>Importe</strong></td>
                <td style="font-family: sans-serif;font-size: 14px;"><strong>Estado</strong></td>

              </tr>
            </thead>

            <tbody id="clients" style="font-size:13px;">

            </tbody>
          </table>
        </nav>
      </div>

      <nav id="Drivers_section" style="width:100%; margin-top: 4em;" class="row">
        <div class="card col-md-4 col-xs-12">
                      <div class="card-body">
                          <form  method="post" id="drivers-form"  enctype="multipart/form-data">
                              
                              <label for="photo_driver" style="cursor: pointer;">
                                  <img  class="col-md-12"src="../../resource/defaunt_img.png" >
                              </label>
                              <div class="form-group" >
                                  <input id="photo_driver" "class="navbar text-center" type="file" name="photo_driver" 
                                   style="font-size:11px; outline: none;">
                              </div>
                              <div class="form-group">
                                  <input class="form-control" type="text" name="enrollment_driver"
                                  id="enrollment_driver" placeholder="Matrícula "  style="font-size:11px; ">
                              </div>
                              <div class="form-group">
                                  <input class="form-control" type="text" name="name_driver" 
                                  id="name_driver"  placeholder="Nombres completos "  style="font-size:11px; ">
                              </div>
                              <div class="form-group">
                                  <input class="form-control" type="number" step="any" name="dni_driver"  
                                  id="dni_driver" placeholder="Dni" style="font-size:11px; ">
                              </div>
                              <div class="form-group">
                                  <input class="form-control" type="text" name="phone_driver"   
                                  id="phone_driver" placeholder="Teléfono" style="font-size:11px; ">
                              </div>
                              <div class="form-group">
                                <input class="form-control" type="text" name="address_driver"  
                                id="address_driver" placeholder="Dirección" style="font-size:11px; ">
                              </div>
                              <div class="form-group">
                              <input type="submit" name="send_driver"  id="send_driver" value="Registrar" class="btn btn-primary text-center btn-block"> <!--Texto centrado y que ocupe toda el card-->
                              </div>
                          </form>
                      </div>
        </div>
    
        <div class="col-md-8 col-xs-12">
        
              <table  class="bg-info  table table-bordered table-sm text-center">
              <!--tabla pequeña com borde-->
              <thead >
                <tr>
                <td style="font-family: sans-serif; font-size: 14px;"><strong>Foto</strong></td>
                  <td style="font-family: sans-serif; font-size: 14px;"><strong>Matricula</strong></td>
                  <td style="font-family: sans-serif;font-size: 14px;"><strong>Nombres</strong></td>
                  <td style="font-family: sans-serif;font-size: 14px;"><strong>Dni</strong></td>
                  <td style="font-family: sans-serif;font-size: 14px;"><strong>Telefono</strong></td>

                </tr>
              </thead>
              <tbody id="drivers" style="font-size:14px;">
               
              </tbody>

            
        </div>

      </nav>
  
  </div>

  <script src="../../app/jquery.min.js"></script>
  <script src="menu.js"></script>
</body>
<style>
  input[type="file"] {
    color: transparent;
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
input[type=number] { -moz-appearance:textfield; }

  @media only screen and (max-width: 600px) {

  }
</style>

</html>