<?php

include('base.php');

if(isset($_POST['ActualizarMateria']))
{
    $code = $_POST ['code'];
    $name = $_POST ['name'];


    $consulta = " UPDATE materias SET NombreMateria='$name' where Codigo='$code'";
    $result = mysqli_query($conexion, $consulta);

    if(!$result) {

   die("Error en la Consulta.");

    }else{

      header('Location: GestionMaterias.php');
   }
    
}

?>
