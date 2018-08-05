<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}
//creamos un objeto de mvcTeacher
$info = new mvcTeacher();
?>

<div class="container">
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-sm-12">
            <h4 class="m-t-0 header-title">Student data</h4>
            <a href="index.php?section=groups&action=my-students&group=<?php echo $info->idGrupoAlumno(); ?>"><button class="pull-right atras" style="margin-top: -50px">Back</button></a>
            <div class="clearfix">
                <?php
                //mandamos a llamar el controller para obtener la informacion del alumno
                $info -> dataAlumnoController();
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div style="border-top: 20px solid #126C4A; margin-left: -15px; margin-right: -15px;"></div>
        <div class="col-sm-12" style="margin-top: 20px">
            <h4 class="m-t-0 header-title">CAI record</h4>
            <div class="table-responsive m-b-20">
                <!--tabla para mostrar las horas de cai realizadas por el alumno-->
                <table class="data table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Beginning hour</th>
                            <th>Ending hour</th>
                            <th>Activity</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //creamos un objeto de mvcTeacher
                        $list = new mvcTeacher();

                        //llamamos el controler para mostrar las horas de cai realizadas por el alumno
                        $list -> horasAlumnoController();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end container -->