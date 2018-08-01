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
          <h4 class="m-t-0 header-title">CAI sessions queries</h4>
      </div>

      <div class="col-md-4 col-md-offset-4">
        <h4 style="text-align: center">Search...</h4>
      </div>

        <div class="col-md-4 col-md-offset-4" style="margin-bottom: 30px; border-bottom: 1px solid #fff; border-top: 1px solid #fff;">
          <div class="form-group">
              <label class="control-label text-white" style="margin-top: 10px;">Teacher</label>
              <select style="width:100%;" class="form-control select2" name="matricula" required>
                  <option value=""></option>
                  <?php
                  //creamos un objeto de mvcAlumno
                  //$option = new mvcAlumno();

                  //se manda a llamar el controller para enlistar todos los alumnos sin grupos en el select
                  //$option -> optionAlumnoController();
                  ?>
              </select>
          </div>

          <div class="form-group">
              <label class="control-label text-white">Group</label>
              <select style="width:100%;" class="form-control select2" name="matricula" required>
                  <option value=""></option>
                  <?php
                  //creamos un objeto de mvcAlumno
                  //$option = new mvcAlumno();

                  //se manda a llamar el controller para enlistar todos los alumnos sin grupos en el select
                  //$option -> optionAlumnoController();
                  ?>
              </select>
          </div>

          <div class="form-group">
              <label class="control-label text-white">Student</label>
              <select style="width:100%;" class="form-control select2" name="matricula" required>
                  <option value=""></option>
                  <?php
                  //creamos un objeto de mvcAlumno
                  //$option = new mvcAlumno();

                  //se manda a llamar el controller para enlistar todos los alumnos sin grupos en el select
                  //$option -> optionAlumnoController();
                  ?>
              </select>
          </div>
        </div>


        <div class="col-sm-12">
            <div class="table-responsive m-b-20">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Level</th>
                            <th>Date</th>
                            <th>Beginning hour</th>
                            <th>Ending hour</th>
                            <th>Activity</th>
                            <th>Unit</th>
                            <th>Teacher</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //creamos un objeto de mvcSession
                        //$list = new mvcSession();

                        //se manda a llamar el control para enlistar a los alumnos de la sesión
                        //$list -> listadoSessionController();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end container -->
