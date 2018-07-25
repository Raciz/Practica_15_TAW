<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se va a mostrar un mensaje de aviso al realizar alguna operacion de crud
if(!empty($_SESSION["mensaje"]))
{
    //si session en mensaje es agregar un usuario
    if($_SESSION["mensaje"]=="add")
    {
        $_SESSION["tiempo"] = date("H:i:s");
        //se muestra el sweet alert de agregar un usuario
        echo"<script>
                    swal
                    (
                        {
                            title: 'Registro Exitoso:',
                            text: 'se ha registrado un nuevo alumno en la session',
                            type: 'success',
                            confirmButtonText: 'Continue',
                            confirmButtonColor: '#4fa7f3'
                        }
                    )
            </script>";
    }
    //si session en mensaje es eliminar un usuario
    elseif ($_SESSION["mensaje"]=="delete")
    {
        //se muestra el sweet alert de eliminar un usuario
        echo"<script>
                swal
                (
                    {
                        title: 'Advertencia:',
                        text: 'se ha finalizado la hora de CAI del alumno',
                        type: 'warning',
                        confirmButtonText: 'Continue',
                        confirmButtonColor: '#4fa7f3'
                    }
                )
            </script>";

    }
    elseif ($_SESSION["mensaje"]=="die")
    {
        //se muestra elsweet alert de editar un usuario
        echo"<script>
                swal
                (
                    {
                        title: 'Finalizado',
                        text: 'Hora terminada',
                        type: 'success',
                        confirmButtonText: 'Continue',
                        confirmButtonColor: '#4fa7f3'
                    }
                )
            </script>";
    }
    //se elimina el contenido de session en mensaje
    $_SESSION["mensaje"]="";
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="m-t-0 header-title">Actual session</h4>
            <div class="pull-right" style="margin-top: -56px">
              <!--<b>Unit: </b> 1-->
                <?php
                //creamos un objeto de mvcSession
                $list = new mvcSession();
                //se manda a llamar el control para enlistar a los alumnos de la sesión
                $r = $list -> todasHoras(date("H:i:s"));
                echo date("H:i:s");
                ?>
              <br>
            </div>
            <?php if($r!="Fuera"){ ?><button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add student</button><?php } ?>
            <div class="table-responsive m-b-20">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Career</th>
                            <th>Activity</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //creamos un objeto de mvcSession
                        $list = new mvcSession();

                        //se manda a llamar el control para enlistar a los alumnos de la sesión
                        $list -> listadoSessionController();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end container -->

<?php
//incluimos el archivo para agregar, eliminar y mostrar los datos de un alumno en la session
include_once "views/sessions/add.php";
include_once "views/sessions/student_data.php";
include_once "views/sessions/delete.php";
?>
