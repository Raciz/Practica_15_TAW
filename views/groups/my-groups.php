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
            <h4 class="m-t-0 header-title">My Groups</h4>
            <div class="table-responsive m-b-20">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Level</th>
                            <th>Size</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr class='fondoTabla'>
                        <td>EN-203</td>
                        <td>9</td>
                        <td>1 student</td>
                        <td>
                          <button class="btn btn-rounded btn-warning" type="button" name="button">View Students</button>
                        </td>
                      </tr>
                        <?php
                        //creamos un objeto de mvcGrupo
                        //$list = new mvcGrupo();

                        //se manda a llamar el control para enlistar a los grupos
                        //$list -> listadoGrupoController();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end container -->
