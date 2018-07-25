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
    //si session en mensaje es agregar un grupo
    if($_SESSION["mensaje"]=="add")
    {
        //se muestra el sweet alert de agregar un grupo
        echo"<script>
                    swal
                    (
                        {
                            title: 'Successful registration:',
                            text: 'a new group has been registered in the system',
                            type: 'success',
                            confirmButtonText: 'Continue',
                            confirmButtonColor: '#4fa7f3'
                        }
                    )
            </script>";
    }
    //si session en mensaje es eliminar un grupo
    elseif ($_SESSION["mensaje"]=="delete")
    {
        //se muestra el sweet alert de eliminar un grupo
        echo"<script>
                swal
                (
                    {
                        title: 'Warning:',
                        text: 'a group has been removed from the system',
                        type: 'warning',
                        confirmButtonText: 'Continue',
                        confirmButtonColor: '#4fa7f3'
                    }
                )
            </script>";

    }
    //si session en mensaje es editar un grupo
    elseif ($_SESSION["mensaje"]=="edit")
    {
        //se muestra elsweet alert de editar un grupo
        echo"<script>
                swal
                (
                    {
                        title: 'Successful Edited:',
                        text: 'the information of a group has been edited',
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
            <h4 class="m-t-0 header-title">Groups</h4>
            <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add new</button>
            <div class="table-responsive m-b-20">
              <!--tabla para mostrar los grupos del sistema-->  
              <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Level</th>
                            <th>Teacher</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //creamos un objeto de mvcGrupo
                        $list = new mvcGrupo();

                        //se manda a llamar el control para enlistar a los grupos
                        $list -> listadoGrupoController();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end container -->

<?php
//incluimos el archivo con el modal para agregar, editar y eliminar grupos
include_once "views/groups/add.php";
include_once "views/groups/edit.php";
include_once "views/groups/delete.php";
?>
