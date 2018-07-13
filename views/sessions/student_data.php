<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
   //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe llamar al controller para agregar un nuevo grupo
if(isset($_GET["action"]) && $_GET["action"]=="add")
{
    //se crea un objeto de mvcGrupo
    $add = new mvcGrupo();

    //se manda a llamar el controller para agregar un nuevo grupo al sistema
    $add -> agregarGrupoController();
}
?>

<!--  Modal content for the above example -->
<div id="datos-alumno" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Student data</h4>
            </div>
            <div class="modal-body">
              <div class="clearfix">
                <img class="pull-left" width="400px" height="400px" src="views/media/images/users/1530326.jpeg"/>
                <div class="text-black" style="margin-left: 420px">
                  <p>
                    <b>ID:</b>
                    <br>
                    1530326
                  </p>
                  <p>
                    <b>Name:</b>
                    <br>
                    Angy Carreón Peréz
                  </p>
                  <p>
                    <b>Group:</b>
                    <br>
                    ENG-9A
                  </p>
                  <p>
                    <b>Career:</b>
                    <br>
                    Ingeniería en Tecnologías de la Información
                  </p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-custom waves-effect">Add student</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
