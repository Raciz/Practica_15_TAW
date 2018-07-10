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
                            title: 'Registro Exitoso:',
                            text: 'se ha registrado un nuevo grupo en el sistema',
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
                        text: 'se ha eliminado un grupo del sistema',
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
                        text: 'se ha editado la informacion de un grupo',
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
            <h4 class="m-t-0 header-title">Groups</h4>
            <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add new</button>
            <div class="table-responsive m-b-20">
                <table id="example1" class="table">
                    <thead>
                        <tr class="fondoTabla">
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
