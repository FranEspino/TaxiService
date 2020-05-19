<?php 
session_start();
session_unset(); //eliminar la sesion
session_destroy();
header("location: ../index.php");
?>