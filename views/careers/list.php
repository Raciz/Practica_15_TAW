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
    //si session en mensaje es agregar una carrera
    if($_SESSION["mensaje"]=="add")
    {
        //se muestra el sweet alert de agregar una carrera
        echo"<script>
                    swal
                    (
                        {
                            title: 'Successful registration:',
                            text: 'a new career has been registered in the system',
                            type: 'success',
                            confirmButtonText: 'continue',
                            confirmButtonColor: '#4fa7f3'
                        }
                    )
            </script>";
    }
    //si session en mensaje es eliminar una carrera
    elseif ($_SESSION["mensaje"]=="delete")
    {
        //se muestra el sweet alert de eliminar una carrera
        echo"<script>
                swal
                (
                    {
                        title: 'Warning:',
                        text: 'a career has been removed from the system',
                        type: 'warning',
                        confirmButtonText: 'continue',
                        confirmButtonColor: '#4fa7f3'
                    }
                )
            </script>";

    }
    //si session en mensaje es editar una carrera
    elseif ($_SESSION["mensaje"]=="edit")
    {
        //se muestra elsweet alert de editar una carrera
        echo"<script>
                swal
                (
                    {
                        title: 'Successful Edited:',
                        text: 'the information of a career has been edited',
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
      <h4 class="m-t-0 header-title">Careers</h4>
      <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add new</button>
      <div class="table-responsive m-b-20">
        <!--tabla para mostrar las carreras del sistema-->
        <table class="data table">
          <thead>
            <tr>
              <th>Key</th>
              <th>Name</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <?php
              //creamos un objeto de mvcCarrera
              $list = new mvcCarrera();

              //se manda a llamar el control para enlistar a las carreras
              $list -> listadoCarreraController();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- end container -->
<?php
//incluimos el archivo con el modal para agregar, editar y eliminar carreras
include_once "views/careers/add.php";
include_once "views/careers/edit.php";
include_once "views/careers/delete.php";
?>
