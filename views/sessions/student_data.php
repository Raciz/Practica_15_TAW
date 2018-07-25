<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe mandar a llamar el controller para agregar el usuario a la sesión
if(isset($_GET["action"]) && $_GET["action"]=="student_data")
{
    //creamos un objeto de mvcSession
    $add = new mvcSession();

    //se manda a llamar el controller para agregar al alumno a la sesión
    $add -> agregarSessionController();
}

if(!empty($_GET["student_data"]))
{
?>
<!--  Modal para agregar al alumno a la sesion -->
<div id="agregar-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block; padding-right: 15px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a href="index.php?section=sessions&action=actual">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </a>
                <h4 class="modal-title" id="myLargeModalLabel">Student data</h4>
            </div>
            <form method="post" action="index.php?section=sessions&action=student_data" autocomplete="off">
            <div class="modal-body">
                <div class="clearfix">
                    <?php
                    //creamos un objeto de mvcSession
                    $edit = new mvcSession();

                    //mandamos a llamar a el controller para obtener la informacion del alumno
                    $edit -> mostrarSessionController($_POST["alumno"], $_POST["actividad"]);
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <a href="index.php?section=sessions&action=actual">
                    <button type="button" class="btn btn-default waves-effect">Close</button>
                </a>
                <button type="submit" class="btn btn-custom waves-effect waves-light">Add Student</button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php 
} 
?>