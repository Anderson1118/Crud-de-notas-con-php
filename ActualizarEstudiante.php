<?php

include('base.php');

if(isset($_POST['ActualizarEstudiante']))
{
    $code = $_POST ['code'];
    $name = $_POST ['name'];
    $group = $_POST ['group'];


    $consulta = " UPDATE estudiantes SET Nombre='$name', Grupo='$group' where Codigo='$code'";
    $result = mysqli_query($conexion, $consulta);

    if(!$result) {

   die("Error en la Consulta.");

    }else{

      header('Location: GestionEstudiantes.php');
   }
    
}

?>
