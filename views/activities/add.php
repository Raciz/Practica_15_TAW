<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
   //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe llamar al controller para agregar un nueva actividad
if(isset($_GET["action"]) && $_GET["action"]=="add")
{
    //se crea un objeto de mvcActividad
    $add = new mvcActividad();

    //se manda a llamar el controller para agregar una nueva actividad al sistema
    $add -> agregarActividadController();
}
?>

<!-- Modal para agregar una nueva actividad -->
<div id="agregar-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <!--Formulario para agregar una nueva actividad-->
        <form action="index.php?section=activities&action=add" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title repairtext">Add a new activity</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label repairtext">Name</label>
                            <input type="text" name="nombre" class="form-control" id="field-3" placeholder="Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label repairtext">Description</label>
                            <input type="text" name="descripcion" class="form-control" id="field-3" placeholder="Name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-custom waves-effect waves-light">Save</button>
            </div>
        </div>
    </form>
    </div>
</div>
<!-- /.modal -->
