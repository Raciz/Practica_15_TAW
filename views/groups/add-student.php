<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe llamar al controller para agregar un alumno al grupo
if(isset($_GET["action"]) && $_GET["action"]=="add-student")
{
    //se crea un objeto de mvcAlumno
    $add = new mvcAlumno();

    //se manda a llamar el controller para agregar un nuevo alumno al grupo grupo 
    $add -> agregarAlumnoGrupoController();
}
?>

<!-- Modal para agregar un nuevo alumno al grupo-->
<div id="agregar-alumno-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <!--Formulario para agregar un nuevo grupo-->
        <form action="index.php?section=groups&action=add-student" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title repairtext">Add student in the group</h4>
                </div>
                <div class="modal-body">
                    
                    <input type="hidden" name="grupo" value="<?php echo $_GET["group"]; ?>">
                    
                    <div class="form-group">
                        <label class="control-label repairtext">Student</label>
                        <select style="width:100%;" class="form-control select2" name="matricula" required>
                            <option value=""></option>
                            <?php
                            //creamos un objeto de mvcAlumno
                            $option = new mvcAlumno();

                            //se manda a llamar el controller para enlistar todos los alumnos sin grupos en el select
                            $option -> optionAlumnoController();
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