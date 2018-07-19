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
    $add = new mvcAlumno();

    //se manda a llamar el controller para agregar un nuevo usuario al sistema
    $add -> agregarAlumnoController();
}
?>

<!-- Modal para agregar una nueva carrera -->
<div id="agregar-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form enctype="multipart/form-data" action="index.php?section=students&action=add" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    <h4 class="modal-title repairtext">Add a new student</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label repairtext">ID</label>
                        <input type="text" class="form-control" name="matricula" placeholder="ID" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label repairtext">First name</label>
                        <input type="text" class="form-control" name="nombre" placeholder="First Name" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label repairtext">Last name</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Last Name" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label repairtext">Career</label>
                        <select style="width:100%;" class="form-control select2" name="carrera" required>
                            <option value=""></option>
                            <?php
                            //creamos un objeto de mvcUsuario
                            $option = new mvcCarrera();

                            //se manda a llamar el controller para enlistar todos los teachers en el select
                            $option -> optionCarreraController();
                            ?>
                        </select>
                    </div>

                    <!--<div class="form-group">
                        <label class="control-label repairtext">Group</label>
                        <select style="width:100%;" class="form-control select2" name="grupo">
                            <option value=""></option>
                            <?php
                            //creamos un objeto de mvcGrupo
                            //$option = new mvcGrupo();

                            //se manda a llamar el controller para enlistar todos los grupo en el select
                            //$option -> optionGrupoController();
                            ?>
                        </select>
                    </div>-->

                    <div class="form-group">
                        <label class="repairtext">Imagen (tamaño maximo: 5 MB)</label>
                        <input class="repairtext" type="file" name="img" accept="image/jpeg, image/png" required>
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
