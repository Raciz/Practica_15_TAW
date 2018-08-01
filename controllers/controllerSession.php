<?php

class mvcSession
{
    //Control para poder mostrar la informacion de una asistencia
    public function mostrarSessionController($id, $actividad)
    {
        //se obtiene el id de la asistencia a mostrar su informacion
        $data = $id;

        //se manda el id de la asistencia y el nombre de la tabla donde esta almacenada
        $resp = CRUDSession::mostrarSessionModel($data,"alumno","carrera");
      
        //se imprime la informacion de la asistencia en inputs de un formulario
        echo "
              <input type=hidden value=".$actividad." name='actividad'>
              <img class='pull-left' width='400px' height='400px' src='".$resp[0]["img"]."'/>
              <div class='text-black' style='margin-left: 420px'>
                <p>
                    <b>ID:</b>
                    <br>
                    <input class='form-control' type='text' name='matricula' value='".$resp[0]["matricula"]."' readonly>
                  </p>
                  <p>
                    <b>Name:</b>
                    <br>
                    <input class='form-control' type='text' name='nombre' value='".$resp[0]["nombre"]." ".$resp[0]["apellido"]."' readonly>
                  </p>
                  <p>
                    <b>Group:</b>
                    <br>
                    <input class='form-control' type='text' name='grupo' value='".$resp[0]["grupo"]."' readonly>
                  </p>
                  <p>
                    <b>Career:</b>
                    <br>
                    <input class='form-control' type='text' name='carrera' value='".$resp[0]["carrera"]."' readonly>
                  </p>
                  </div>";
    }
    //al parecer ya no funciona para nada
    /*function todasHoras($horaActual)
    {
      //echo "hora: ".$horaActual."<br>";
      //horario de CAI
      $data = array("08:50:00","09:45:00","11:10:00","12:05:00","13:00:00","14:00:00","14:55:00",
                    "15:50:00","16:45:00","17:30:00");
      $valor = -1;
      
      for($i=0;$i<10;$i++)
      {
        $fecha1 = new DateTime($data[$i]);//fecha inicial
        $fecha2 = new DateTime($horaActual);//fecha de cierre

        $intervalo = $fecha1->diff($fecha2);
        $intervalo = $intervalo->format('%H:%I:%S');

        //echo $intervalo."<br>";
        //tolerancia de 10 minutos
        if($intervalo<="00:10:00")
        {
          $valor = $i;
          break;
        }
        else
        {
          $valor = -1;
        }
      }
      
      if($valor == -1)
      {
        return "Fuera";
      }
      else
      {
        return $data[$valor];
      }
    }*/

    //Control para manejar el registro de un nuevo alumno a la sesión
    function agregarSessionController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["matricula"]))
        {
            //se guardan la informacion del grupo
            $fecha = date("Y-m-d");
            $horaE = date("H:i:s");
            $unidad = CRUDSession::unidadesSessionModel($fecha,"unidad");
            $grupo = CRUDSession::grupoSessionModel($_POST["grupo"],"grupo","usuario");
            $data = array("matricula" => $_POST["matricula"],
                          "fecha" => $fecha,
                          "horaE" => $horaE,
                          "actividad" => $_POST["actividad"],
                          "unidad" => $unidad["id_unidad"],
                          "nivel" => $grupo["nivel"],
                          "teacher" => $grupo["teacher"],
                          "grupo" => $_POST["grupo"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDSession::agregarSessionModel($data,"asistencia");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "add";

                //nos redireccionara al listado de grupos
                echo "<script>
                        window.location.replace('index.php?section=sessions&action=actual');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }

    //funcion para saber la unidad
    function saberUnidad($fecha)
    {
      $unidad = CRUDSession::unidadesSessionModel($fecha,"unidad");
      $unidad = explode(" ", $unidad["nombre"]);
      return $unidad[1];
    }

    //Control para mostrar un listado de los alumnos registrados en la sesión
    function listadoSessionController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de la asistencia
        $data = CRUDSession::listadoSessionModel("asistencia","alumno","grupo","carrera","actividad");

        //se imprime la informacion de cada uno de las carreras registradas
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada una de las carreras
            echo "<tr class='fondoTabla'>
                <td>".$row["asistencia"]."</td>
                <td>".$row["nombre"]." ".$row["apellido"]."</td>
                <td>".$row["grupo"]."</td>
                <td>".$row["carrera"]."</td>
                <td>".$row["actividad"]."</td>
                <td>
                    <center>
                        <button class='btn btn-rounded btn-danger' id='eliminar' data-toggle='modal' data-target='#delete-modal' onclick=idDel('".$row["asistencia"]."')>Finish</button>
                    </center>
                </td>
            </tr>";
        }
    }

    //Control para editar la hora de salida de la asistencia del alumno
    public function finalizarSessionController()
    {
        //se verifica si se envio el id del grupo a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id del grupo
            $horaS = date("H:i:s");
            $horaE = CRUDSession::horasSessionModel($_POST["del"],"asistencia");
            $fecha1 = new DateTime($horaE["hora_entrada"]);//fecha inicial
            $fecha2 = new DateTime($horaS);//fecha de cierre

            $intervalo = $fecha1->diff($fecha2);
            $intervalo = $intervalo->format('%H %i %s');
            //si son mas de 45min se cuenta como hora
            if($intervalo>="00:45:00"){
              $completa = 1;
            }else{
              $completa = 0;
            }

            $data = array("asistencia" => $_POST["del"],
                          "horaS" => $horaS,
                          "completa" => $completa);

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDSession::finalizarSessionModel($data,"asistencia");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "delete";

                //nos redireccionara al listado de grupos
                echo "<script>
                        window.location.replace('index.php?section=sessions&action=actual');
                      </script>";
            }
        }
    }

    //Control para terminar la hora de salida de la asistencia del alumno
    public function terminarSessionController()
    {
        //se verifica si se envio el id del grupo a eliminar
            //de ser asi se guarda el id del grupo
            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $hora = date("H:i:s");
            $resp = CRUDSession::terminarSessionModel($hora,1,"asistencia");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "die";

                //nos redireccionara a la sesion actual
                echo "<script>
                        window.location.replace('index.php?section=sessions&action=actual');
                      </script>";
            }
    }
}
?>