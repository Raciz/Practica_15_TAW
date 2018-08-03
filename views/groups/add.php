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
if(isset($_GET["action"]) && $_GET["action"]=="add")
{
    //se crea un objeto de mvcGrupo
    $add = new mvcGrupo();

    //se manda a llamar el controller para agregar un nuevo grupo al sistema 
    $add -> agregarGrupoController();
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
                    <h4 class="modal-title repairtext">Add a new group</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label repairtext">Code</label>
                        <input type="text" class="form-control" name="codigo" placeholder="Code" maxlength="7" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label repairtext">Level</label>
                        <select style="width:100%;" class="form-control select2" name="nivel" required>
                            <option value=""></option>
                            <?php
                            for($i = 1; $i <= 9; $i++)
                            {
                                echo "<option value=".$i.">Level ".$i."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label repairtext">Teacher</label>
                        <select style="width:100%;" class="form-control select2" name="teacher" required>
                            <option value=""></option>
                            <?php
                            //creamos un objeto de mvcUsuario
                            $option = new mvcUsuario();

                            //se manda a llamar el controller para enlistar todos los teachers en el select
                            $option -> optionUsuarioController();
                            ?>
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