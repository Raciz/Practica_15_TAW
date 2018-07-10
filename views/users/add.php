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
        <form action="index.php?section=users&action=add" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add a new user</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Name" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>


                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>


                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <select class="form-control select2" name="tipo">
                            <option value="Teacher">Teacher</option>
                            <option value="Administrator">Administrator</option>
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