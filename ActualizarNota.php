<?php

include('base.php');

if(isset($_POST['ActualizarNota']))
{
    $code = $_POST ['code'];
    $puntaje = $_POST ['puntaje'];


    $consulta = " UPDATE notas_estudiantes_materias SET puntaje='$puntaje' where Codigo='$code'";
    $result = mysqli_query($conexion, $consulta);

    if(!$result) {

   die("Error en la Consulta.");

    }else{

      header('Location: GestionNotas.php');
   }
    
}

?>