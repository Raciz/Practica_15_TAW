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
            <a href="index.php?section=groups&action=my-groups"><button class="pull-right atras" style="margin-top: -10px">Back</button></a>
            <h4 class="m-t-0 header-title"><?php echo $_GET["group"]; ?></h4>
            <?php
            //creamos un objeto de mvcTeacher
            $list = new mvcTeacher();
          
            //mandamos a llamar al controller para mostrar a los alumnos de un grupo
            $list -> listadoAlumnoTeacherController();
            ?>
        </div>
    </div>
</div>