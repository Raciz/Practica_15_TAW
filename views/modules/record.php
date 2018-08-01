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
                    <label class="control-label text-white" style="margin-top: 10px;">Teacher</label>
                    <select style="width:100%;" class="form-control select2" name="teacher" id="teacher">
                        <option value=""></option>
                        <?php
                        //creamos un objeto de mvcUsuario
                        $option = new mvcUsuario();

                        //se manda a llamar el controller para enlistar todos los teachers
                        $option -> optionUsuarioController();
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label text-white">Group</label>
                    <select style="width:100%;" class="form-control select2" name="grupo" id="grupo"> 
                        <option value=""></option>
                        <?php
                        //creamos un objeto de mvcGrupo
                        $option = new mvcGrupo();

                        //se manda a llamar el controller para enlistar todos los grupos
                        $option -> optionGrupoController();
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label text-white">Student</label>
                    <select style="width:100%;" class="form-control select2" name="alumno" id="alumno">
                        <option value=""></option>
                        <?php
                        //creamos un objeto de mvcAlumno
                        $option = new mvcAlumno();

                        //se manda a llamar el controller para enlistar todos los alumnos
                        $option -> optionTodosAlumnosController();
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
            //verificamos si se ha utilizado el filtrado por maestro
            if(!empty($_POST["teacher"]))
            {
                //script para seleccionar al teacher que se utilizo para filtrar los resultados
                echo
                "
                <script>
                    var teacher = document.getElementById('teacher');

                    for(var i = 1; i < teacher.options.length; i++)
                    {
                        if(teacher.options[i].value ==".$_POST["teacher"].")
                        {
                            teacher.selectedIndex = i;
                        }
                    }
                </script>
                ";
            }

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
            if(!empty($_POST["alumno"]))
            {
                //script para seleccionar al alumno que se utilizo para filtrar los resultados
                echo
                "
                <script>
                    var alumno = document.getElementById('alumno');

                    for(var i = 1; i < alumno.options.length; i++)
                    {
                        if(alumno.options[i].value ==".$_POST["alumno"].")
                        {
                            alumno.selectedIndex = i;
                        }
                    }
                </script>
                ";
            }
        }
        ?>
        
        <div class="col-sm-12">
            <div class="table-responsive m-b-20">
                <!--Tabla para mostrar las horas de cai realizada por los alumnos-->
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Level</th>
                            <th>Date</th>
                            <th>Beginning hour</th>
                            <th>Ending hour</th>
                            <th>Activity</th>
                            <th>Unit</th>
                            <th>Teacher</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //creamos un objeto de mvcSession
                        $list = new mvcSession();

                        //se manda a llamar el control para enlistar todas las horas de cai realizadas por los alumnos 
                        $list -> historialSessionController();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end container -->
