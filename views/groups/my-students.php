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
                            text: 'se ha registrado un nuevo alumno en el grupo',
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
                        text: 'se ha eliminado al alumno del grupo',
                        type: 'warning',
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
            <h4 class="m-t-0 header-title">EN-209</h4>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingeniería en Tecnologías de la Información</h3>
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive m-b-20">
                          <table id="example1" class="table">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>First name</th>
                                      <th>Last name</th>
                                      <th>Options</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr class='fondoTabla'>
                                  <td>1530326</td>
                                  <td>Angela Judith</td>
                                  <td>Carrizales Pérez</td>
                                  <td>
                                    <button class="btn btn-rounded btn-warning" type="button" name="button">View CAI hours</button>
                                  </td>
                                </tr>
                                  <?php
                                  //creamos un objeto de mvcGrupo
                                  //$list = new mvcAlumno();

                                  //se manda a llamar el control para enlistar a los grupos
                                  //$list -> listadoAlumnoGrupoController();
                                  ?>
                              </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingeniería en Mecatrónica</h3>
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive m-b-20">
                          <table id="example1" class="table">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>First name</th>
                                      <th>Last name</th>
                                      <th>Career</th>
                                      <th>Options</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  //creamos un objeto de mvcGrupo
                                  //$list = new mvcAlumno();

                                  //se manda a llamar el control para enlistar a los grupos
                                  //$list -> listadoAlumnoGrupoController();
                                  ?>
                              </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end container -->

<?php
//incluimos el archivo con el modal para agregar, editar y eliminar grupos
include_once "views/groups/add-student.php";
include_once "views/groups/del-student.php";
?>
