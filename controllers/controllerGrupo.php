<?php

class mvcGrupo
{
    //Control para manejar el registro de un nuevo grupo
    function agregarGrupoController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["codigo"]))
        {
            //se guardan la informacion del grupo
            $data = array("codigo" => $_POST["codigo"],
                          "nivel" => $_POST["nivel"],
                          "teacher" => $_POST["teacher"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDGrupo::agregarGrupoModel($data,"grupo");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //nos redireccionara al listado de grupos
                echo "<script>
                        window.location.replace('index.php?section=grupo&action=listado');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }

    //Control para mostrar un listado de los grupos registrados en el sistema
    function listadoGrupoController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los grupos
        $data = CRUDGrupo::listadoGrupoModel("grupo","teacher","usuario");

        //se imprime la informacion de cada uno de los usuarios registrados
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los grupos
            echo "<tr>
                <td>".$row["codigo"]."</td>
                <td>".$row["nivel"]."</td>
                <td>".$row["teacher"]."</td>
                <td>
                    <center>
                        <button title='Eliminar Grupo' class='btn btn-icon btn-danger'><i class='fa fa-trash'></i></button>
                        <button title='Editar Grupo' class='btn btn-icon btn-warning'><i class='fa fa-edit'></i></button>
                    </center>
                </td>
            </tr>";
        }
    }

    //Control para borrar un grupo del sistema
    public function eliminarGrupoController()
    {
        //se verifica si se envio el id del grupo a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id del grupo
            $data = $_POST["del"];

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDGrupo::eliminarGrupoModel($data,"alumno","grupo");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //nos redireccionara al listado de grupos
                echo "<script>
                        window.location.replace('index.php?section=usuario&action=listado');
                      </script>";
            }
        }
    }

    /*/Control para poder mostrar la informacion de un alumno a editar
    public function editarAlumnoController()
    {
        //se obtiene el id del alumno a mostrar su informacion
        $data = $_POST["edit"];

        //se manda el id del alumno y el nombre de la tabla donde esta almacenada
        $resp = CRUDAlumno::editarAlumnoModel($data,"Alumna");

        //se imprime la informacion del grupo en inputs de un formulario
        echo "
                <input type=hidden value=".$resp["id_alumna"]." name='id'>

                <div class='form-group'>
                        <label>Nombre</label>
                        <input type='text' value='".$resp["nombre"]."' class='form-control' name='nombre' placeholder='Ingrese Nombre' required>
                    </div>

                    <div class='form-group'>
                        <label>Apellido</label>
                        <input type='text' value='".$resp["apellido"]."' class='form-control' name='apellido' placeholder='Ingrese Apellido' required>
                    </div>
 
        //script para seleccionar en el select el option de la categoria al que pertenece el producto
        echo "<script>
                var grupo = document.getElementById('grupo');

                for(var i = 1; i < grupo.options.length; i++)
                {
                    if(grupo.options[i].value ==".$resp["grupo"].")
                    {
                        grupo.selectedIndex = i;
                    }
                }
                </script>";
        
    }*/

    //Control para modificar la informacion de un grupo
    public function modificarGrupoController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["id"]))
        {
            //se guardan la informacion del usuario
            $data = array("id" => $_POST["id"],
                          "nivel" => $_POST["nivel"],
                          "teacher" => $_POST["teacher"]);

            //se manda la informacion del grupo y la tabla en la que esta almacenada
            $resp = CRUDGrupo::modificarGrupoModel($data,"grupo");

            //en caso de que se haya editado correctamente 
            if($resp == "success")
            {
                //nos redireccionara al listado de grupos
                echo "<script>
                        window.location.replace('index.php?section=grupo&action=listado');
                    </script>";
            }
        }
    }
}
?>


