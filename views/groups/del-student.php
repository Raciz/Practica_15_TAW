<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redireccionara al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe mandar a llamar el controller para eliminar un alumno del grupo 
if(isset($_GET["action"]) && $_GET["action"]=="del-student")
{
    //se crea un objeto de mvcAlumno
    $delete = new mvcAlumno();

    //se manda a llamar el controller para eliminar un alumno del grupo
    $delete -> eliminarAlumnoGrupoController();
}
?>

<!-- Modal para eliminar un alumno del grupo-->
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <!--Formulario para confirmar el borrado del alumno del grupo-->
        <form id="formDel" action="index.php?section=groups&action=del-student" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title repairtext">Delete student of the group?</h4>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="del" name="del">
                    <input type="hidden" name="grupo" value="<?php echo $_GET["group"]; ?>">

                    <div class="form-group">
                        <label class="control-label repairtext">Password</label>
                        <input type="Password" class="form-control" id="passDel" placeholder="Password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-custom waves-effect waves-light">Save</button>
                </div>
                </form>
            </div>
    </div>
</div>
<!-- /.modal -->


<script>

    //variable para modificar el formulario
    var form = document.getElementById("formDel");

    //funcion para obtener el id del alumno a eliminar del grupo
    function idDel(del)
    {
        //obtenemos el objeto del input hidden
        var input = document.getElementById("del");

        //le asignamos a value del que es el id del alumno a eliminar del grupo 
        input.setAttribute("value",del);
    }

    (function()
     {
        //funcion para validar que la contraseña ingresada coincida con la contraseña del usuario logeado
        function validarDel(e)
        {
            //obtenemos la contraseña ingresada en el input
            var pass = document.getElementById("passDel").value;

            //verificamos si coinciden las contraseñas
            if('<?php echo $_SESSION["password"]?>' != pass)
            {
                //si son diferentes se detiene el evento submit
                e.preventDefault();

                //sweet alert para decirle al usuario que la contraseña no se ingreso correctamente
                swal
                (
                    {
                        title: 'Error:',
                        text: 'Incorrect password',
                        type: 'error',
                        confirmButtonText: 'Continue',
                        confirmButtonColor: '#4fa7f3'
                    }
                )
            }   
        }

        //asignamos un addeventlistener al form para ejecutar la funcion validar cuando se inicie el evento submit
        form.addEventListener("submit",validarDel);
    })();

</script>
