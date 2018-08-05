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
    //si session en mensaje es agregar un alumno al grupo
    if($_SESSION["mensaje"]=="add")
    {
        //se muestra el sweet alert de agregar un alumno al grupo
        echo"<script>
                    swal
                    (
                        {
                            title: 'Successful registration:',
                            text: 'a new student has registered in the group',
                            type: 'success',
                            confirmButtonText: 'Continue',
                            confirmButtonColor: '#4fa7f3'
                        }
                    )
            </script>";
    }
    //si session en mensaje es eliminar un alumno al grupo
    elseif ($_SESSION["mensaje"]=="delete")
    {
        //se muestra el sweet alert de eliminar un alumno al grupo
        echo"<script>
                swal
                (
                    {
                        title: 'Warning:',
                        text: 'the student has been removed from the group',
                        type: 'warning',
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
            <h4 class="m-t-0 header-title"><?php echo $_GET["group"]; ?></h4>

            <a href="index.php?section=groups&action=list"><button class="pull-right atras" style="margin-top: -50px">Back</button></a>
            <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-alumno-modal">
                Add student
            </button>
            
            <div class="table-responsive m-b-20">
                <!--tabla para mostrar a los alumnos del grupo-->
                <table class="data table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Career</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //creamos un objeto de mvcGrupo
                        $list = new mvcAlumno();

                        //se manda a llamar el control para enlistar a los alumnos del grupo
                        $list -> listadoAlumnoGrupoController();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end container -->

<?php
//incluimos el archivo con el modal para agregar y eliminar grupos
include_once "views/groups/add-student.php";
include_once "views/groups/del-student.php";
?>
