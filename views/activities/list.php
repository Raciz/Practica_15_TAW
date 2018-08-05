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
    //si session en mensaje es agregar una actividad
    if($_SESSION["mensaje"]=="add")
    {
        //se muestra el sweet alert de agregar una actividad
        echo"<script>
                    swal
                    (
                        {
                            title: 'Successful registration:',
                            text: 'a new activity has been registered in the system',
                            type: 'success',
                            confirmButtonText: 'continue',
                            confirmButtonColor: '#4fa7f3'
                        }
                    )
            </script>";
    }
    //si session en mensaje es eliminar una actividad
    elseif ($_SESSION["mensaje"]=="delete")
    {
        //se muestra el sweet alert de eliminar una actividad
        echo"<script>
                swal
                (
                    {
                        title: 'Warning:',
                        text: 'a activity has been removed from the system',
                        type: 'warning',
                        confirmButtonText: 'continue',
                        confirmButtonColor: '#4fa7f3'
                    }
                )
            </script>";

    }
    //si session en mensaje es editar una actividad
    elseif ($_SESSION["mensaje"]=="edit")
    {
        //se muestra elsweet alert de editar una actividad
        echo"<script>
                swal
                (
                    {
                        title: 'Successful Edited',
                        text: 'the information of an activity has been edited',
                        type: 'success',
                        confirmButtonText: 'continue',
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
      <h4 class="m-t-0 header-title">Activities</h4>
      <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add new</button>
      <div class="table-responsive m-b-20">
        <!--tabla para mostrar las actividades del sistema-->
        <table class="data table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <?php
              //creamos un objeto de mvcActividad
              $list = new mvcActividad();

              //se manda a llamar el control para enlistar a las actividades
              $list -> listadoActividadController();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- end container -->
<?php
//incluimos el archivo con el modal para agregar, editar y eliminar actividades
include_once "views/activities/add.php";
include_once "views/activities/edit.php";
include_once "views/activities/delete.php";
?>
