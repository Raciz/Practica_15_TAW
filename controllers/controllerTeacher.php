<?php

class mvcTeacher
{
    //Control para mostrar un listado de los grupos que le pertenecen al teacher
    function listadoGrupoTeacherController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los grupos del teacher
        $data = CRUDTeacher::listadoGrupoTeacherModel($_SESSION["empleado"],"grupo");

        //se imprime la informacion de cada uno de los grupos del teacher
        foreach($data as $rows => $row)
        {
            $size = CRUDAlumno::listadoAlumnoGrupoModel($row["codigo"],"alumno");

            //e imprimimos la informacion de cada uno de los grupos
            echo "<tr class='fondoTabla'>
                <td>".$row["codigo"]."</td>
                <td>Level ".$row["nivel"]."</td>
                <td>".count($size)." Student(s)</td>
                <td>
                    <center>
                        <a href='index.php?section=groups&action=my-students&group=".$row["codigo"]."'><button class='btn btn-rounded btn-warning' type='button' name='button'>
                            View Students
                        </button></a>
                    </center>
                </td>
            </tr>";
        }
    }

    //Control para mostrar un listado de los grupos que le pertenecen al teacher
    function listadoAlumnoTeacherController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los grupos del teacher
        $data = CRUDTeacher::listadoAlumnoTeacherModel($_GET["group"],"alumno");
        
        //se obtienen las diferentes carreras a las que pertecene los alumnos del grupo
        $careers = [];
        for($i = 0; $i < count($data); $i++)
        {
            $careers[] = $data[$i]["carrera"];
        }
      
        //se eliminan las repeticiones de los grupos
        $careers = array_unique($careers);

        //se imprime la informacion de los alumnos del grupo separados por carrera
        foreach($careers as $rows => $row)
        {      
            //se obtiene el nombre completo de la carrera
            $name = CRUDTeacher::nombreCarreraModel($row,"carrera");
          
            //e imprimimos la informacion de cada uno de los grupos
            echo
                "
            <div class='col-lg-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <h3 class='panel-title'>".$name["nombre"]."</h3>
                    </div>
                    <div class='panel-body'>
                      <div class='table-responsive m-b-20'>
                          <table class='table data'>
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>First name</th>
                                      <th>Last name</th>
                                      <th>Options</th>
                                  </tr>
                              </thead>
                              <tbody>";
            foreach($data as $rows2 => $row2)
            {
                if($row2["carrera"] == $row)
                {
                    echo
                        "
                                        <tr class='fondoTabla'>
                                            <td>".$row2["matricula"]."</td>
                                            <td>".$row2["nombre"]."</td>
                                            <td>".$row2["apellido"]."</td>
                                            <td>
                                                <a href='index.php?section=groups&action=student-record&student=".$row2["matricula"]."'>
                                                    <button class='btn btn-rounded btn-warning' type='button' name='button'>View CAI hours</button>
                                                </a>
                                            </td>
                                        </tr>
                                        ";   
                }                                    
            }
            echo "                          
                              </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>
            ";
        }
    }

    //Control para mostrar la informacion de un alumno
    function dataAlumnoController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion del alumno
        $data = CRUDTeacher::dataAlumnoModel($_GET["student"],"alumno");
        
        //se obtiene el nombre completo de la carrera
        $name = CRUDTeacher::nombreCarreraModel($data["carrera"],"carrera");
        
        //se imprime la informacion del alumno
        echo
            "
        <img class='pull-left' width='400px' height='400px' src='".$data["img"]."'>
        <div class='text-white' style='margin-left: 420px'>
            <p>
                <b>ID:</b><br>".$data["matricula"]."
            </p>
            <p>
                <b>Name:</b><br>".$data["nombre"]." ".$data["apellido"]."
            </p>
            <p>
                <b>Group:</b><br>".$data["grupo"]."
            </p>
            <p>
                <b>Career:</b><br>".$name["nombre"]."
            </p>
        </div>
        ";
    }

    //Control para mostrar las horas de cai del alumno
    function horasAlumnoController()
    {
        //se le manda al modelo para obtener las hora de cai del alumno
        $data = CRUDTeacher::horasAlumnoModel($_GET["student"],"asistencia","unidad","actividad");

        foreach($data as $rows => $row)
        {
            //se imprime la informacion de las horas de cai
            echo
            "
            <tr class='fondoTabla'>
                <td>".$row["fecha"]."</td>
                <td>".$row["hora_entrada"]."</td>
                <td>".$row["hora_salida"]."</td>
                <td>".$row["actividad"]."</td>
                <td>".$row["unidad"]."</td>
            </tr>
            ";
        }
    }
}
?>
