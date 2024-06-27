<?php

include('base.php');

    $materia = $_POST ['code'];
    $nombre = $_POST ['name'];
    

    $consulta ="SELECT * FROM materias WHERE Codigo ='$materia'"; 
    $sql = mysqli_query($conexion,$consulta);
    $row= mysqli_fetch_array($sql);

    if(mysqli_num_rows($sql)==1)
    {
        $_SESSION['mensaje_la_materia_ya_existe']='Materia existente';
        $_SESSION['mensaje_type']='success';
        header('Location: GestionMaterias.php');
    }
    else
    {
        if(isset($_POST['GuardarMateria']))
        {
            $code = $_POST ['code'];
            $name = $_POST ['name'];
            
            $consulta = "INSERT INTO materias(Codigo,NombreMateria) values ('$code','$name')";
            $result = mysqli_query($conexion, $consulta);
            if(!$result)
            {
                die("Error en la Consulta.");
            }else{

                header('Location: GestionMaterias.php');
            }
            
        }
    }




?>