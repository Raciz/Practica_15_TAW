<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="m-t-0 header-title">CAI sessions queries</h4>
        </div>

        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align: center">Search</h4>
        </div>

        <div class="col-md-4 col-md-offset-4" style="margin-bottom: 30px; border-bottom: 1px solid #fff; border-top: 1px solid #fff;">
            <!--Formulario para filtrar las horas de cai mostradas en la tabla de horas de cai-->
            <form action="index.php?section=record" method="post">
                <div class="form-group">
                    <label class="control-label text-white">Group</label>
                    <select style="width:100%;" class="form-control select2" name="grupo" id="grupo" required> 
                        <option value=""></option>
                        <?php
                        //creamos un objeto de mvcGrupo
                        $option = new mvcGrupo();
                        //se manda a llamar el controller para enlistar todos los grupos
                        $option -> optionGrupoTeacherController();
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label text-white">Unit</label>
                    <select style="width:100%;" class="form-control select2" name="unidad" id="unidad" required>
                        <option value=""></option>
                        <?php
                        //creamos un objeto de mvcAlumno
                        $option = new mvcUnidad();
                        //se manda a llamar el controller para enlistar todos los alumnos
                        $option -> optionUnidadController();
                        ?>
                    </select>
                </div>
                <center>
                    <button class='btn btn-rounded btn-success' type='submit' name='button'>Search</button>
                </center>
            </form>
        </div>

        <?php

        //scripts para seleccionar en los select los filtro de busqueda que se han 
        //utilizados para los datos mostrados en la tabla de horas
        if(isset($_POST))
        {
            //verificamos si se ha utilizado el filtrado por grupo
            if(!empty($_POST["grupo"]))
            {
                //script para seleccionar al grupo que se utilizo para filtrar los resultados
                echo
                    "
                <script>
                    var grupo = document.getElementById('grupo');
                    for(var i = 1; i < grupo.options.length; i++)
                    {
                        if(grupo.options[i].value =='".$_POST["grupo"]."')
                        {
                            grupo.selectedIndex = i;
                        }
                    }
                </script>
                ";
            }
            //verificamos si se ha utilizado el filtrado por alumno
            if(!empty($_POST["unidad"]))
            {
                //script para seleccionar al alumno que se utilizo para filtrar los resultados
                echo
                    "
                <script>
                    var unidad = document.getElementById('unidad');
                    for(var i = 1; i < unidad.options.length; i++)
                    {
                        if(unidad.options[i].value ==".$_POST["unidad"].")
                        {
                            unidad.selectedIndex = i;
                        }
                    }
                </script>
                ";
            }
        }
        ?>

        <?php
        if(!empty($_GET["student"]) && !empty($_GET["group"]) && !empty($_GET["unit"]))
        {
        ?>

        <script>
            //script para seleccionar al grupo que se utilizo para filtrar los resultados
            var grupo = document.getElementById('grupo');
            for(var i = 1; i < grupo.options.length; i++)
            {
                if(grupo.options[i].value =='<?php echo $_GET["group"]; ?>')
                {
                    grupo.selectedIndex = i;
                }
            }

            //script para seleccionar al alumno que se utilizo para filtrar los resultados
            var unidad = document.getElementById('unidad');
            for(var i = 1; i < unidad.options.length; i++)
            {
                if(unidad.options[i].value ==<?php echo $_GET["unit"]; ?>)
                {
                    unidad.selectedIndex = i;
                }
            }
        </script>

        <div class="col-sm-12">
            <div class="table-responsive m-b-20">
                <!--Tabla para mostrar las horas de cai realizada por los alumnos-->
                <table class="data table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Date</th>
                            <th>Beginning Hour</th>
                            <th>Ending Hour</th>
                            <th>Activity</th>
                            <th>Unidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

            //creamos un objeto de mvcSession
            $list = new mvcSession();

            //se manda a llamar el control para enlistar todas las horas de cai realizadas por los alumnos 
            $list -> horasCAIController();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        }
        else
        {
        ?>
        <div class="col-sm-12">
            <div class="table-responsive m-b-20">
                <!--Tabla para mostrar las horas de cai realizada por los alumnos-->
                <table class="data table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Level</th>
                            <th>Teacher</th>
                            <th>CAI Hours</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            if(!empty($_POST))
            {
                //creamos un objeto de mvcSession
                $list = new mvcSession();
                //se manda a llamar el control para enlistar todas las horas de cai realizadas por los alumnos 
                $list -> historialSessionController();
            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        }
        ?>

    </div>
</div>
<!-- end container -->