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
            //e imprimimos la informacion de cada uno de los grupos
            echo "<tr class='fondoTabla'>
                <td>".$row["codigo"]."</td>
                <td>".$row["nivel"]."</td>
                <td>".$row["tamaño"]."</td>
                <td>
                    <center>
                        <a href='index.php?section=groups&action=my-students'><button class='btn btn-rounded btn-warning' type='button' name='button'>
                            View Students
                        </button></a>
                    </center>
                </td>
            </tr>";
        }
    }
}
?>
