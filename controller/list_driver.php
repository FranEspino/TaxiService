<?php 
include('../model/database_connect.php');
$mistakes = '';
$query = "SELECT foto_chofer,matricula_chofer,nombre_chofer,
dni_chofer,telefono_chofer FROM choferes";
$statement = $conn->prepare($query);
$resultado = $statement->execute();
$json = array();
while($row = $statement->fetch()){
    $json[] = array(
        'photo__driver_b' => $row['foto_chofer'],
        'enrollment_driver_b' => $row['matricula_chofer'],
        'name_driver_b' => $row['nombre_chofer'],
        'dni_driver_b'=>$row['dni_chofer'],
        'phone_driver_b'=> $row['telefono_chofer']

    );
}
$jsonString = json_encode($json);
echo $jsonString;





?>