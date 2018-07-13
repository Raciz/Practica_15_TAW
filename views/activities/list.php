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
        //se muestra el sweet alert de agregar un usuario
        echo"<script>
                    swal
                    (
                        {
                            title: 'Success:',
                            text: 'se ha registrado una nueva carrera en el sistema',
                            type: 'success',
                            confirmButtonText: 'Continuar',
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
                        text: 'se ha eliminado una carrera del sistema',
                        type: 'warning',
                        confirmButtonText: 'Continuar',
                        confirmButtonColor: '#4fa7f3'
                    }
                )
            </script>";

    }
    //si session en mensaje es editar un usuario
    elseif ($_SESSION["mensaje"]=="edit")
    {
        //se muestra elsweet alert de editar un usuario
        echo"<script>
                swal
                (
                    {
                        title: 'Editado Exitoso',
                        text: 'se ha editado la informacion de una carrera',
                        type: 'success',
                        confirmButtonText: 'Continuar',
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
        <table id="datatable" class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <?php
              //creamos un objeto de mvcCarrera
              //$list = new mvcCarrera();

              //se manda a llamar el control para enlistar a las carreras
              //$list -> listadoCarreraController();
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
include_once "views/activities/add.php";
include_once "views/activities/edit.php";
include_once "views/activities/delete.php";
?>
