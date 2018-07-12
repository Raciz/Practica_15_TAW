<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
   //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe llamar al controller para agregar un nuevo usuario
if(isset($_GET["action"]) && $_GET["action"]=="add")
{
    //se crea un objeto de mvcUsuario
    $add = new mvcUsuario();

    //se manda a llamar el controller para agregar un nuevo usuario al sistema
    $add -> agregarUsuarioController();
}
?>

<!-- Modal para agregar una nueva carrera -->
<div id="agregar-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form action="index.php?section=students&action=add" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add a new student</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">ID</label>
                        <input type="text" class="form-control" name="id" placeholder="ID" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">First name</label>
                        <input type="text" class="form-control" name="nombre" placeholder="First name" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Last name</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Last name" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Group</label>
                        <select style="width:100%;" class="form-control select2" name="group" required>
                            <option value=""></option>
                            <option value="ENG-1">ENG-1</option>
                            <option value="ENG-2">ENG-2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Career</label>
                        <select style="width:100%;" class="form-control select2" name="career" required>
                            <option value=""></option>
                            <option value="ITI">ITI</option>
                            <option value="Meca">Meca</option>
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
