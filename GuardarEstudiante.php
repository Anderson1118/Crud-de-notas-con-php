<?php

include('base.php');

    $estudiante = $_POST ['code'];
    $nombre = $_POST ['name'];
    $grupo = $_POST ['group'];

    $consulta ="SELECT * FROM estudiantes WHERE Codigo ='$estudiante'"; 
    $sql = mysqli_query($conexion,$consulta);
    $row= mysqli_fetch_array($sql);

    if(mysqli_num_rows($sql)==1)
    {
        $_SESSION['mensaje_el_estudiante_ya_existe']='Estudiante existente';
        $_SESSION['mensaje_type']='success';
        header('Location: GestionEstudiantes.php');
    }
    else
    {
        if(isset($_POST['GuardarEstudiante']))
        {
            $code = $_POST ['code'];
            $name = $_POST ['name'];
            $grupo = $_POST ['group'];
            $consulta = "INSERT INTO estudiantes(Codigo,Nombre,Grupo) values ('$code','$name','$grupo')";
            $result = mysqli_query($conexion, $consulta);
            if(!$result)
            {
                die("Error en la Consulta.");
            }else{

                header('Location: GestionEstudiantes.php');
            }
            
        }
    }




?>