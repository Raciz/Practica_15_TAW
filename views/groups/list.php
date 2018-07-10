<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
   //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
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
#include_once "views/groups/delete.php";
?>
