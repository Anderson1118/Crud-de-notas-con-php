<?php

include('base.php');

    $codigo = $_POST ['code'];
    $puntaje = $_POST ['qualification'];

    $consulta ="SELECT * FROM notas_estudiantes_materias WHERE Codigo ='$codigo'"; 
    $sql = mysqli_query($conexion,$consulta);
    $row= mysqli_fetch_array($sql);

    if(mysqli_num_rows($sql)==1)
    {
        $_SESSION['mensaje_la_calificación_ya_existe']='Calificación existente';
        $_SESSION['mensaje_type']='success';
        header('Location: GestionNotas.php');
    }
    else
    {
        if(isset($_POST['GuardarNota']))
        {
            $codigo = $_POST ['code'];
            $codigo_e= $_POST ['code'];
            $codigo_m= $_POST ['code'];
            $puntaje = $_POST ['qualification'];

            $consulta = "INSERT INTO notas_estudiantes_materias(Codigo,Codigo_estudiantes,Codigo_materias,puntaje) values ('$codigo','$codigo_e','$codigo_m','$puntaje')";
            $result = mysqli_query($conexion, $consulta);
            if(!$result)
            {
                die("Error en la Consulta.");
            }else{

                header('Location: GestionNotas.php');
            }
            
        }
    }




?>