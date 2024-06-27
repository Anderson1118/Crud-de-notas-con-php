<?php
include('base.php');
 
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query= "DELETE FROM notas_estudiantes_materias WHERE Codigo = $id";
    $result = mysqli_query($conexion, $query);
    if(!$result)
    {
        die("Error en la consulta");
    }
    header('location: GestionNotas.php');
}

?>