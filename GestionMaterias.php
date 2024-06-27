<?php include ('includes/header.php') ?>
<?php include ('base.php')?>

<div class="container">
<br><br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar Nueva Materia
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario Registrar Materias</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<!-- cuerpo modal, formulario ventana emergente -->

      <form class="row g-3" action="GuardarMateria.php" method="POST"> 
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Codigo</label>
  <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Codigo">

  <label for="exampleFormControlInput1" class="form-label">Nombre de la Materia</label>
  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nombre">

 
   
  <div class="mb-3">
  <input type="submit" class="btn btn-primary" name="GuardarMateria" value="Registrar Materia">
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

  <?php if(isset( $_SESSION['mensaje_la_materia_ya_existe']))
    { ?>
      <div class ="alert alert-warning alert-dismissible fade show" role="alert">
       <?=$_SESSION['mensaje_la_materia_ya_existe']?>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php session_unset(); } ?>

  


  <table class="table table-hover"> 
    <thead class="table-succes table-striped">
    <tr> 
      <th>Codigo</th>
      <th>Nombre de la Materia</th>
      
    </tr>
  </thead>
  <tbody>

    <?php
    $sql= "SELECT * FROM materias";
    $query = mysqli_query($conexion,$sql);
    while($row = mysqli_fetch_array($query) )
    {
      ?>

      <tr>
        <th><?php echo $row ['Codigo'] ?></th>
        <th><?php echo $row ['NombreMateria'] ?></th>
        

        <th>
          <a class="btn btn-secondary" href="ActualizarMateria.php?id=<?php echo $row ['Codigo'] ?>" data-bs-toggle="modal" data-bs-target="#edipleModal" >Editar </a> 
          <a class="btn btn-danger" href="EliminarMateria.php?id=<?php echo $row ['Codigo'] ?>"> Eliminar </a>
        </th>
        

      </tr>
    <?php
    }
    ?>

  

  </tbody>

  </table>
</div>


<!--  formulario ventana emergente, para el boton editar de gestion materia-->

<div class="modal fade" id="edipleModal" tabindex="-1" aria-labelledby="ediModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ediModalLabel">Formulario de Ediccion Materias </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<!-- cuerpo modal -->

      <form class="row g-3" action="ActualizarMateria.php" method="POST"> 
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Codigo</label>
  <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Codigo">

  <label for="exampleFormControlInput1" class="form-label">Nombre</label>
  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nombre">

  
   
 <div class="mb-3">
  <input type="submit" class="btn btn-primary" name="ActualizarMateria" value="Actualizar Materia">
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