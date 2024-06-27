<?php include ('includes/header.php') ?>
<?php include ('base.php')?>

<div class="container">
<br><br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Nuevo Estudiante
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario Registrar Estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<!-- cuerpo modal, formulario ventana emergente -->

      <form class="row g-3" action="GuardarEstudiante.php" method="POST"> 
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Codigo</label>
  <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Codigo">

  <label for="exampleFormControlInput1" class="form-label">Nombre</label>
  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nombre">

  <label for="exampleFormControlInput1" class="form-label">Grupo</label>
  <input type="text" name="group" class="form-control" id="exampleFormControlInput1" placeholder="Grupo">
   
  <div class="mb-3">
  <input type="submit" class="btn btn-primary" name="GuardarEstudiante" value="Registrar Estudiante">
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

  <?php if(isset( $_SESSION['mensaje_el_estudiante_ya_existe']))
    { ?>
      <div class ="alert alert-warning alert-dismissible fade show" role="alert">
       <?=$_SESSION['mensaje_el_estudiante_ya_existe']?>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php session_unset(); } ?>

  


  <table class="table table-hover"> 
    <thead class="table-succes table-striped">
    <tr> 
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Grupo</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $sql= "SELECT * FROM estudiantes";
    $query = mysqli_query($conexion,$sql);
    while($row = mysqli_fetch_array($query) )
    {
      ?>

      <tr>
        <th><?php echo $row ['Codigo'] ?></th>
        <th><?php echo $row ['Nombre'] ?></th>
        <th><?php echo $row ['Grupo'] ?></th>

        <th>
          <a class="btn btn-secondary" href="actualizarestudiante2.php?id=<?php echo $row ['Codigo'] ?>" >Editar </a> 
          <a class="btn btn-danger" href="EliminarEstudiante.php?id=<?php echo $row ['Codigo'] ?>"> Eliminar </a>

        </th>
        

      </tr>
    <?php
    }
    ?>

  

  </tbody>

  </table>
</div>

<!--  formulario ventana emergente, para el boton editar de gestion estudiante-->

<div class="modal fade" id="edipleModal" tabindex="-1" aria-labelledby="ediModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ediModalLabel">Formulario de Ediccion Estudiantes </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<!-- cuerpo modal -->

      <form class="row g-3" action="ActualizarEstudiante.php" method="POST"> 
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Codigo</label>
  <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Codigo">

  <label for="exampleFormControlInput1" class="form-label">Nombre</label>
  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nombre">

  <label for="exampleFormControlInput1" class="form-label"> Grupo</label>
  <input type="text" name="group" class="form-control" id="exampleFormControlInput1" placeholder="Grupo">
   
 <div class="mb-3">
  <input type="submit" class="btn btn-primary" name="ActualizarEstudiante" value="Actualizar Estudiante">
  </div>
</div>
</form>
<!-- ####################################################  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

</div>

<?php include ('includes/footer.php') ?>
