<?php
include('base.php');
 
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query= "DELETE FROM estudiantes WHERE Codigo = $id";
    $result = mysqli_query($conexion, $query);
    if(!$result)
    {
        die("Error en la consulta");
    }
    header('location: GestionEstudiantes.php');
}

?>