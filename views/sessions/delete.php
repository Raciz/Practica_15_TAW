<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redireccionara al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe mandar a llamar el controller para finalizar una session
if(isset($_GET["action"]) && $_GET["action"]=="delete")
{
    //se crea un objeto de mvcSession
    $delete = new mvcSession();

    //se manda a llamar el controller para eliminar una session
    $delete -> finalizarSessionController();
}
?>

<!-- Modal para eliminar una session-->
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="formDel" action="index.php?section=sessions&action=delete" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title repairtext">End time?</h4>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="del" name="del">
                    <input type="hidden" id="completa" name="completa">
                    <input type="hidden" id="salida" name="salida">

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

    //funcion para obtener el id de la session a terminar
    function idDel(del,horaE)
    {
        //obtenemos el objeto del input hidden
        var input = document.getElementById("del");

        //le asignamos a value del que es el id de la session a terminar 
        input.setAttribute("value",del);

        //ejecutamos la funcion para saber si es hora completa
        horaCompleta(horaE);
    }

    function horaCompleta(horaE)
    {
        var fecha = new Date(); //Date contiene fecha y hora
        var segundos = 0; //variable para almacenar los segundos
        var minutos = 0; //variable para almacenar los minutos
        var horas = 0; //variable para almacenar las horas

        //se obtienen los segundos y se es menor que dos digitos se antepone un 0
        if(fecha.getSeconds()<10)
        {
            segundos = '0'+fecha.getSeconds();
        }
        else
        {
            segundos = fecha.getSeconds();
        }

        //se obtienen los minutos y se es menor que dos digitos se antepone un 0
        if(fecha.getMinutes()<10)
        {
            minutos = '0'+fecha.getMinutes();
        }
        else
        {
            minutos = fecha.getMinutes();
        }

        //se obtienen las horas y se es menor que dos digitos se antepone un 0
        if(fecha.getHours()<10)
        {
            horas = '0'+fecha.getHours();
        }
        else
        {
            horas = fecha.getHours();
        }

        var hora2 = horaE.split(':');

        var t1 = new Date();
        var t2 = new Date();
        t1.setHours(horas, minutos, segundos);
        t2.setHours(hora2[0], hora2[1], hora2[2]);


        //se obtiene la diferencia entre las dos horas
        t1.setHours(t1.getHours() - t2.getHours(), t1.getMinutes() - t2.getMinutes(), t1.getSeconds() - t2.getSeconds());

        var completa = 0;

        if(t1.getMinutes()>=45 || t1.getHours() >= 1)
        {
            completa = 1;
        }

        //obtenemos el objeto del input hidden
        var inputCompleta = document.getElementById("completa");

        //le asignamos a value completa si es hora completa
        inputCompleta.setAttribute("value",completa);

        //obtenemos el objeto del input hidden
        var inputCompleta = document.getElementById("salida");

        //le asignamos a value salida la hora de salida 
        inputCompleta.setAttribute("value",horas+":"+minutos+":"+segundos);
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
