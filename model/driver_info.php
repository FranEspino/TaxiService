<?php 
   include('database_connect.php');
   $mistakes = '';
      $foto_d = $_FILES['photo_driver'];

      if(!empty($_POST['enrollment_driver'])){
         $matricula_d = $_POST['enrollment_driver'];
         $matricula_d = trim($matricula_d);
         $matricula_d = htmlspecialchars($matricula_d);
         $matricula_d = filter_var($matricula_d,FILTER_SANITIZE_STRING);
      }else{
         $mistakes .= 'Ingresar número de matricula. </br>';
      }
      
      if(!empty($_POST['name_driver'])){
         $name_d = $_POST['name_driver'];
         $name_d = trim($name_d);
         $name_d = htmlspecialchars($name_d);
         $name_d = filter_var($name_d,FILTER_SANITIZE_STRING);
      }else{
         $mistakes .= 'Ingresar nombres completos. </br>';
      }

      if(!empty($_POST['dni_driver'])){
         $dni_d = $_POST['dni_driver'];
         $dni_d = trim($dni_d);
         $dni_d = htmlspecialchars($dni_d);
         $dni_d = filter_var($dni_d,FILTER_SANITIZE_STRING);
      

      }else{
         $mistakes .= 'Ingresar dni. </br>';
      }

      if(!empty($_POST['phone_driver'])){
         $phone_d = $_POST['phone_driver'];
         $phone_d = trim($phone_d);
         $phone_d = htmlspecialchars($phone_d);
         $phone_d = filter_var($phone_d,FILTER_SANITIZE_STRING);
      }else{
         $mistakes .= 'Ingresar número telefónico. </br>';
      }

      if(!empty($_POST['address_driver'])){
         $address_d = $_POST['address_driver'];
         $address_d = trim($address_d);
         $address_d = htmlspecialchars($address_d);
         $address_d = filter_var($address_d,FILTER_SANITIZE_STRING);
      }else{
         $mistakes .= 'Ingresar dirección. </br>';
      }


if(empty($mistakes)){
      if($foto_d['type'] == 'image/jpg' or $foto_d['type'] == 'image/jpeg' 
      or $foto_d['type'] == 'image/png'){
         $name_encry = md5($foto_d['tmp_name']).".jpg";
         $ruta = "../resource/drivers_photo/".$name_encry;
         move_uploaded_file($foto_d["tmp_name"],$ruta);
         $query = "INSERT INTO choferes VALUES('$matricula_d','$name_d',
         $dni_d,'$phone_d','$address_d','$name_encry')";
         $statement = $conn->prepare($query);
         $resultado= $statement->execute();
        echo 'holaaa';
      }
}else{
   echo $mistakes;
}
  


?>