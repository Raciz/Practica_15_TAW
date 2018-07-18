<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redireccionara al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe mandar a llamar el controller para eliminar una actividad del sistema
if(isset($_GET["action"]) && $_GET["action"]=="delete")
{
    //se crea un objeto de mvcActividad
    $delete = new mvcActividad();

    //se manda a llamar el controller para eliminar una actividad
    $delete -> eliminarActividadController();
}
?>

<!-- Modal para eliminar una actividad del sistema -->
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="formDel" action="index.php?section=activities&action=delete" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title repairtext">Delete Activity?</h4>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="del" name="del">

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

    //funcion para obtener el id de la carrera a eliminar
    function idDel(del)
    {
        //obtenemos el objeto del input hidden
        var input = document.getElementById("del");

        //le asignamos a value del que es el id de la carrera a eliminar 
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
                        text: 'Contraseña Incorrecta',
                        type: 'error',
                        confirmButtonText: 'Continuar',
                        confirmButtonColor: '#4fa7f3'
                    }
                )
            }   
        }

        //asignamos un addeventlistener al form para ejecutar la funcion validar cuando se inicie el evento submit
        form.addEventListener("submit",validarDel);
    })();

</script>
