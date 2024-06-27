<?php include ('includes/header.php') ?>
<?php include ('base.php')?>

<div class="container">
<br><br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Nueva Calificación
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario Registrar Calificación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<!-- cuerpo modal, formulario ventana emergente -->

      <form class="row g-3" action="GuardarNota.php" method="POST"> 
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Codigo</label>
  <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Codigo">

  <label for="exampleFormControlInput1" class="form-label">Calificación</label>
  <input type="int" name="qualification" class="form-control" id="exampleFormControlInput1" placeholder="calificación">
   
  <div class="mb-3">
  <input type="submit" class="btn btn-primary" name="GuardarNota" value="Registrar Calificación">
  </div>
</div>
</form>


</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Registro</button>
      </div>
    </div>
  </div>
</div>

</div>

<?php include ('includes/footer.php') ?>


<!-- Tabla que muestra los registros de la base de datos-->

<br>
<div class="container">

  <?php if(isset( $_SESSION['mensaje_la_calificación_ya_existe']))
    { ?>
      <div class ="alert alert-warning alert-dismissible fade show" role="alert">
       <?=$_SESSION['mensaje_la_calificación_ya_existe']?>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php session_unset(); } ?>

  


  <table class="table table-hover"> 
    <thead class="table-succes table-striped">
    <tr> 
      <th>Estudiante</th>
      <th>Materia</th>
      <th>Calificacion</th>
    </tr>
  </thead>
  <tbody>

    <!--_____________________________-->


    

    
    <?php

    $sql= "SELECT e.Nombre ,m.NombreMateria ,n.puntaje,n.Codigo  from estudiantes e 
    JOIN notas_estudiantes_materias n on(e.Codigo=n.Codigo_estudiantes) 
    join materias m on(m.Codigo=n.Codigo_materias);";
    
    
    $query = mysqli_query($conexion,$sql);

    while($row = mysqli_fetch_array($query) )
    {
      ?>

      <tr>

        <th><?php echo $row ['Nombre'] ?></th>
        <th><?php echo $row ['NombreMateria'] ?></th>
        <th><?php echo $row ['puntaje'] ?></th>
        
        <th>
          <a class="btn btn-secondary" href="ActualizarNota.php?id=<?php echo $row ['Codigo'] ?>" data-bs-toggle="modal" data-bs-target="#edipleModal" >Editar </a> 
          <a class="btn btn-danger" href="EliminarNota.php?id=<?php echo $row ['Codigo'] ?>"> Eliminar </a>
        </th>
        
      </tr>


    <?php
    }
    ?>

    
  </tbody>

  </table>
</div>

<!--  formulario ventana emergente, para el boton editar de gestion mnotas-->

<div class="modal fade" id="edipleModal" tabindex="-1" aria-labelledby="ediModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ediModalLabel">Formulario de Ediccion notas </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<!-- cuerpo modal -->

      <form class="row g-3" action="ActualizarNota.php" method="POST"> 
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Codigo</label>
  <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Codigo">

  <label for="exampleFormControlInput1" class="form-label"> puntage</label>
  <input type="text" name="puntaje" class="form-control" id="exampleFormControlInput1" placeholder="puntaje">
  

  
   
 <div class="mb-3">
  <input type="submit" class="btn btn-primary" name="ActualizarNota" value="Actualizar Nota">
  </div>
</div>
</form>
<!-- ####################################################  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Registro</button>
      </div>
    </div>
  </div>
</div>

</div>

<?php include ('includes/footer.php') ?>