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
    //si session en mensaje es agregar un usuario a la sesion
    if($_SESSION["mensaje"]=="add")
    {
        $_SESSION["tiempo"] = date("H:i:s");
        //se muestra el sweet alert de agregar un usuario a la sesion
        echo"<script>
                    swal
                    (
                        {
                            title: 'Successful registration:',
                            text: 'a new student has registered in the session',
                            type: 'success',
                            confirmButtonText: 'Continue',
                            confirmButtonColor: '#4fa7f3'
                        }
                    )
            </script>";
    }
    //si session en mensaje es finalizacion de la hora
    elseif ($_SESSION["mensaje"]=="delete")
    {
        //se muestra el sweet alert de finalizacion de la hora
        echo"<script>
                swal
                (
                    {
                        title: 'Warning:',
                        text: 'The CAI hour of the student has ended',
                        type: 'warning',
                        confirmButtonText: 'Continue',
                        confirmButtonColor: '#4fa7f3'
                    }
                )
            </script>";

    }
    elseif ($_SESSION["mensaje"]=="die")
    {

        echo"<script>
                swal
                (
                    {
                        title: 'Terminated:',
                        text: 'Hour finished',
                        type: 'success',
                        confirmButtonText: 'Continue',
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
            <h4 class="m-t-0 header-title">Actual session</h4>
            <div class="pull-right" style="margin-top: -56px">
              <b>Unit: </b> 
                <?php
                    //creamos un objeto de mvcSession
                    $list = new mvcSession();
                    $unidad = $list->saberUnidad(date("Y-m-d")); //se obtiene la unidad
                    echo $unidad; //se imprime la unidad
                    echo "<br>";
                ?>
                <label id="hora"></label>
                <script type="text/javascript">
                    function mostrarhora(){ 
                        var fecha = new Date(); //Date contiene fecha y hora
                        var segundos = 0; //variable para almacenar los segundos
                        var minutos = 0; //variable para almacenar los minutos
                        var horas = 0; //variable para almacenar las horas

                        //se obtienen los segundos y se es menor que dos digitos se antepone un 0
                        if(fecha.getSeconds()<10){
                            segundos = "0"+fecha.getSeconds();
                        }else{
                            segundos = fecha.getSeconds();
                        }

                        //se obtienen los minutos y se es menor que dos digitos se antepone un 0
                        if(fecha.getMinutes()<10){
                            minutos = "0"+fecha.getMinutes();
                        }else{
                            minutos = fecha.getMinutes();
                        }

                        //se obtienen las horas y se es menor que dos digitos se antepone un 0
                        if(fecha.getHours()<10){
                            horas = "0"+fecha.getHours();
                        }else{
                            horas = fecha.getHours();
                        }

                        cad=horas+":"+minutos+":"+segundos; 
                        var elementoHora = document.getElementById("hora");
                        var elementoBoton = document.getElementById("agregarStudent");
                        elementoHora.innerHTML = cad;

                        //horario de CAI
                        var data = ["08:50:00","09:45:00","11:10:00","12:05:00","13:00:00",
                        "14:00:00","14:55:00","15:50:00","16:45:00","17:30:00"];
                        var valor = -1;
      
                        //aqui se busca obtener la diferencia que hay entre la hora actual y el
                        //horario de CAI para saber si es una hora valida en la que el alumno
                        //puede hacer una hora de CAI
                        for(var i=0;i<10;i++){
                            var hora1 = cad.split(":"); //hora actual 
                            var hora2 = data[i].split(":"); //horario de CAI
                            var t1 = new Date();
                            var t2 = new Date();
                            t1.setHours(hora1[0], hora1[1], hora1[2]);
                            t2.setHours(hora2[0], hora2[1], hora2[2]);

                            //se obtiene la diferencia entre las dos horas
                            t1.setHours(t1.getHours() - t2.getHours(), 
                            t1.getMinutes() - t2.getMinutes(), t1.getSeconds() - t2.getSeconds());
                            //tolerancia de 10 minutos
                            if(t1.getMinutes()<=10 && t1.getHours()==0){
                                valor = i;
                                break;
                            }else{
                                valor = -1;
                            }
                        }
                        
                        //si no es una hora valida se deshabilita el boton para agregar
                        if(valor==-1){
                            elementoBoton.disabled = true;
                        }else{
                            elementoBoton.disabled = false; //y si es una hora valida se habilita
                        }
                        setTimeout(mostrarhora,1000);
                    }
                    setTimeout(mostrarhora,0);
                </script>
            <br>
            </div>
            <button id="agregarStudent" class="btn btn-rounded btn-success" style="margin-bottom: 10px"
             data-toggle="modal" data-target="#agregar-modal">Add student</button>
            <div class="table-responsive m-b-20">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Career</th>
                            <th>Activity</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //creamos un objeto de mvcSession
                        $list = new mvcSession();

                        //se manda a llamar el control para enlistar a los alumnos de la sesión
                        $list -> listadoSessionController();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end container -->

<?php
//incluimos el archivo para agregar, eliminar y mostrar los datos de un alumno en la session
include_once "views/sessions/add.php";
include_once "views/sessions/student_data.php";
include_once "views/sessions/delete.php";
?>
