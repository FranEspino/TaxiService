<?php 
include('model/database_connect.php');
session_start();
$errores = '';
if(isset($_POST['f_send'])){
 
    if(!empty($_POST['f_user'])){
        $b_user = $_POST['f_user'];
        $b_user = filter_var($b_user,FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingresa tu nombre de usuario <br>';
    }
    if(!empty($_POST['f_password'])){
        $b_password = $_POST['f_password'];
     
    }else{
        $errores  .=  'Ingresa tu contraseña <br>';
    }

    if(empty($errores)){
        
        $query = "SELECT *FROM login_user WHERE name_user = :user
        AND password_user = :pass";
        $statement  = $conn->prepare($query);
        $statement->execute(array(
            ':user' => $b_user,
            ':pass' => $b_password
        ));
        $result = $statement->fetch();
        if($result){
            echo "entra";
            $_SESSION['user'] = $b_user;
            header("location: view/Home/menu.php");
        }else{
            $errores .= 'Nombre o contraseña incorrecta. <br>';
        }


    }





}




?>