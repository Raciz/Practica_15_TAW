<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe mandar a llamar el controller para modificar una carrera
if(isset($_GET["action"]) && $_GET["action"]=="student_data")
{
    //creamos un objeto de mvcCarrera
    $edit = new mvcCarrera();

    //se manda a llamar el controller para modificar la informacion de una carrera
    $edit -> modificarCarreraController();
}

if(!empty($_GET["student_data"]))
{
?>
<!--  Modal content for the above example -->
<div id="agregar-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block; padding-right: 15px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <a href="index.php?section=sessions&action=actual">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </a>
                <h4 class="modal-title" id="myLargeModalLabel">Student data</h4>
            </div>
            <div class="modal-body">
                <div class="clearfix">
                    <img class="pull-left" width="400px" height="400px" src="views/media/images/users/1530326.jpeg"/>
                    <div class="text-black" style="margin-left: 420px">
                        <?php
                        //creamos un objeto de mvcUsuario
                        $edit = new mvcSession();

                        //mandamos a llamar a el controller para obtener la informacion del usuario
                        $edit -> mostrarSessionController($_POST["alumno"]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="index.php?section=sessions&action=actual">
                    <button type="button" class="btn btn-custom waves-effect">Close</button>
                </a>            
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php 
} 
?>