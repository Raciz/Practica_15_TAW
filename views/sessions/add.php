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

<!-- Modal para agregar un nuevo alumno a la session-->
<div id="agregar-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <!--Formulario para agregar un nuevo alumno a la session-->
        <form action="index.php?section=sessions&action=actual&student_data=1" method="post" id="formulario">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title repairtext">Add a student to actual session</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label repairtext">Student</label>
                        <select style="width:100%;" class="form-control select2" id="alumno" name="alumno" required>
                            <option value=""></option>
                            <?php
                            //creamos un objeto de mvcAlumno
                            $option1 = new mvcAlumno();

                            //se manda a llamar el controller para enlistar todos los alumnos en el select
                            $option1 -> optionAlumnosController();
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label repairtext">Activity</label>
                        <select style="width:100%;" class="form-control select2" id="actividad" name="actividad" required>
                            <option value=""></option>
                            <?php
                            //creamos un objeto de mvcActividad
                            $option2 = new mvcActividad();

                            //se manda a llamar el controller para enlistar todas las actividades en el select
                            $option2 -> optionActividadController();
                            ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-custom waves-effect waves-light">Continue</button>
                </div>
            </div>
        </form>
    </div>
</div>
