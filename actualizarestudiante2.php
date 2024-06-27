<?php include('includes/header.php');?>
<?php include('base.php'); ?>


<?php

if (isset($_GET['id']))
{
    $id = $_GET ['id'];
    $query = "SELECT * FROM estudiantes WHERE Codigo = $id";
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_array($result);
        $cod =$row['Codigo'];
        $nom =$row['Nombre'];
        $gro =$row['Grupo'];
    }

    if (isset($_POST['botonActualizar2']))
    {
        $id = $_GET['id'];
        $cod = $_POST['code'];
        $nom = $_POST['name'];
        $gro = $_POST ['group'];

        $query = "UPDATE estudiantes set Codigo = '$cod', Nombre = '$nom', Grupo ='$gro' WHERE Codigo = $id";
        $resultado = mysqli_query($conexion, $query);
        header("Location:GestionEstudiantes.php");
    }
}

?>

<div class="container">
    <form class="row g-3" action="actualizarestudiante2.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="col-auto">
            <label for="inputPassword2" class="visually-hidden">Codigo</label>
            <input value="<?php echo $cod; ?>" name='code' type="text" class="form-control" id="inputPassword2" placeholder="Codigo">
        </div>
        <div class="col-auto">
            <label for="inputPassword2" class="visually-hidden">Codigo</label>
            <input value="<?php echo $nom; ?>" name='name' type="text" class="form-control" id="inputPassword2" placeholder="Nombre">
        </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Codigo</label>
                <input value="<?php echo $gro; ?>" name='group' type="text" class="form-control" id="inputPassword2" placeholder="Grupo">
            </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3" name="botonActualizar2">Actualizar</button>
        </div>
       
    </form>
</div>

<?php include('includes/footer.php');?>