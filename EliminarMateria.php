<?php
include('base.php');
 
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query= "DELETE FROM materias WHERE Codigo = $id";
    $result = mysqli_query($conexion, $query);
    if(!$result)
    {
        die("Error en la consulta");
    }
    header('location: GestionMaterias.php');
}

?>