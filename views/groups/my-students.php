<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
   //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="m-t-0 header-title"><?php echo $_GET["group"]; ?></h4>
            <?php
            $list = new mvcTeacher();
            $list -> listadoAlumnoTeacherController();
            ?>
        </div>
    </div>
</div>