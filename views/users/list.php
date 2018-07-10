<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo sacamos a la seccion publica
    echo "<script>
            window.location.replace('index.php');
          </script>";
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="m-t-0 header-title">Careers</h4>
            <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add new</button>
            <div class="table-responsive m-b-20">
                <table id="example1" class="table">
                    <thead>
                        <tr class="fondoTabla">
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
#include_once "views/users/delete.php";
?>




