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
                            title: 'Successful registration:',
                            text: 'a new user has been registered in the system',
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
                        title: 'Warning:',
                        text: 'a user has been removed from the system',
                        type: 'warning',
                        confirmButtonText: 'Continue',
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
                        title: 'Successful Edited',
                        text: 'a user´s information has been edited',
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
            <h4 class="m-t-0 header-title">Users</h4>
            <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add new</button>
            <div class="table-responsive m-b-20">
                <!--tabla para mostrar a los usuarios registrados en el sistema-->
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>e-mail</th>
                            <th>Type</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //creamos un objeto de mvcUsuario
                        $list = new mvcUsuario();

                        //se manda a llamar el control para enlistar a los usuarios
                        $list -> listadoUsuarioController();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end container -->

<?php
//incluimos el archivo con el modal para agregar, editar y eliminar usuarios
include_once "views/users/add.php";
include_once "views/users/edit.php";
include_once "views/users/delete.php";
?>
