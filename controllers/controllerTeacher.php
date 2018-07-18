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
                <td>".$row["nivel"]."</td>
                <td>".count($size)." Students</td>
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

        $careers = [];
        for($i = 0; $i < count($data); $i++)
        {
            $careers[] = $data[$i]["carrera"];
        }
        $careers = array_unique($careers);
    
        //se imprime la informacion de los alumnos del grupo separados por carrera
        foreach($careers as $rows => $row)
        {            
            //e imprimimos la informacion de cada uno de los grupos
            echo
            "
            <div class='col-lg-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <h3 class='panel-title'>".$row."</h3>
                    </div>
                    <div class='panel-body'>
                      <div class='table-responsive m-b-20'>
                          <table class='datatable' class='table'>
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
                                                <a href='index.php?section=groups&action=student-record'><button class='btn btn-rounded btn-warning' type='button' name='button'>View CAI hours</button></a>
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
}
?>
