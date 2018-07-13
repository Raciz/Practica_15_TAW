<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
   //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe llamar al controller para agregar un nuevo grupo
if(isset($_GET["action"]) && $_GET["action"]=="add-student")
{
    //se crea un objeto de mvcGrupo
    //$add = new mvcGrupo();

    //se manda a llamar el controller para agregar un nuevo grupo al sistema
    //$add -> agregarGrupoController();
}
?>

<!-- Modal para agregar un nuevo grupo-->
<div id="agregar-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <!--Formulario para agregar un nuevo grupo-->
        <form action="index.php?section=groups&action=add" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add a new student</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Student</label>
                        <select style="width:100%;" class="form-control select2" name="nivel" required>
                            <option value=""></option>
                            <option value="student 1"></option>
                            <option value="student 2"></option>
                            <option value="student 3"></option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-custom waves-effect waves-light">Save</button>
                </div>
                </form>
            </div>
    </div>
</div>
<!-- /.modal -->
