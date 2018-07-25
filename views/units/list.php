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
    //si session en mensaje es agregar una unidad
    if($_SESSION["mensaje"]=="add")
    {
        //se muestra el sweet alert de agregar una unidad
        echo"<script>
                    swal
                    (
                        {
                            title: 'Successful registration:',
                            text: 'a new unit has been registered in the system',
                            type: 'success',
                            confirmButtonText: 'Continue',
                            confirmButtonColor: '#4fa7f3'
                        }
                    )
            </script>";
    }
    //si session en mensaje es eliminar una unidad
    elseif ($_SESSION["mensaje"]=="delete")
    {
        //se muestra el sweet alert de eliminar una unidad
        echo"<script>
                swal
                (
                    {
                        title: 'Warning:',
                        text: 'a unit of the system has been removed',
                        type: 'warning',
                        confirmButtonText: 'Continue',
                        confirmButtonColor: '#4fa7f3'
                    }
                )
            </script>";

    }
    //si session en mensaje es editar una unidad
    elseif ($_SESSION["mensaje"]=="edit")
    {
        //se muestra el sweet alert de editar una unidad
        echo"<script>
                swal
                (
                    {
                        title: 'Successful Edited:',
                        text: 'the information of a unit has been edited',
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
      <h4 class="m-t-0 header-title">Units</h4>
      <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add new</button>
      <div class="table-responsive m-b-20">
        <!--tabla para mostrar la informacion de las unidades registradas-->
        <table id="example1" class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Beginning date</th>
              <th>Finishing date</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <?php
              //creamos un objeto de mvcUnidad
              $list = new mvcUnidad();

              //se manda a llamar el control para enlistar a las Unidades
              $list -> listadoUnidadController();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- end container -->
<?php
//incluimos el archivo con el modal para agregar, editar y eliminar unidades
include_once "views/units/add.php";
include_once "views/units/edit.php";
include_once "views/units/delete.php";
?>
