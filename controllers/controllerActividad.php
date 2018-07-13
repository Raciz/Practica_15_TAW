<?php

class mvcActividad
{
    //Control para manejar el registro de una nueva actividad
    function agregarActividadController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guardan la informacion de la actividad
            $data = array("nombre" => $_POST["nombre"],
                          "descripcion" => $_POST["descripcion"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDActividad::agregarActividadModel($data,"actividad");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "add";

                //nos redireccionara al listado de grupos
                echo "<script>
                        window.location.replace('index.php?section=activities&action=list');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }

    //Control para mostrar un listado de las actividades registradas en el sistema
    function listadoActividadController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de las actividades
        $data = CRUDActividad::listadoActividadModel("actividad");

        //se imprime la informacion de cada uno de las actividades registradas
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada una de las actividades
            echo "<tr class='fondoTabla'>
                <td>".$row["nombre"]."</td>
                <td>".$row["descripcion"]."</td>
                <td>
                    <center>
                        <button class='btn btn-rounded btn-danger' id='eliminar' data-toggle='modal' data-target='#delete-modal' onclick=idDel('".$row["id_actividad"]."')>Delete</button>
                        <a href='index.php?section=activities&action=list&edit=".$row["id_actividad"]."'>
                            <button class='btn btn-rounded btn-custom'>Edit</button>
                        </a>
                    </center>
                </td>
            </tr>";
        }
    }

    //Control para borrar una actividad del sistema
    public function eliminarActividadController()
    {
        //se verifica si se envio el id de la actividad a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id de la actividad
            $data = $_POST["del"];

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDActividad::eliminarActividadModel($data,"actividad");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "delete";

                //nos redireccionara al listado de actividades
                echo "<script>
                        window.location.replace('index.php?section=activities&action=list');
                      </script>";
            }
        }
    }

    //Control para poder mostrar la informacion de una actividad a editar
    public function editarActividadController()
    {
        //se obtiene el id de la actividad a mostrar su informacion
        $data = $_GET["edit"];

        //se manda el id de la actividad y el nombre de la tabla donde esta almacenada
        $resp = CRUDActividad::editarActividadModel($data,"actividad");

        //se imprime la informacion de la actividad en inputs de un formulario
        echo "
                    <input type=hidden value=".$resp["id_actividad"]." name='id_actividad'>

                    <div class='form-group'>
                        <label class='control-label repairtext'>ID</label>
                        <input type='text' class='form-control' placeholder='ID' value=".$resp["id_actividad"]." readonly>
                    </div>

                    <div class='form-group'>
                        <label class='control-label repairtext'>Name</label>
                        <input type='text' name='nombre' class='form-control' placeholder='Name' value='".$resp["nombre"]."' required>
                    </div>

                    <div class='form-group'>
                        <label class='control-label repairtext'>Description</label>
                        <input type='text' name='descripcion' class='form-control' placeholder='Description' value='".$resp["descripcion"]."' required>
                    </div>";
    }

    //Control para modificar la informacion de una actividad
    public function modificarActividadController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guarda la información de la actividad
            $data = array("id_actividad" => $_POST["id_actividad"],
            			  "nombre" => $_POST["nombre"],
                          "descripcion" => $_POST["descripcion"]);

            //se manda la informacion de la actividad y la tabla en la que esta almacenada
            $resp = CRUDActividad::modificarActividadModel($data,"actividad");

            //en caso de que se haya editado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "edit";

                //nos redireccionara al listado de actividades
                echo "<script>
                        window.location.replace('index.php?section=activities&action=list');
                    </script>";
            }
        }
    }

     //Control para mostrar a las actividades en un select
    public function optionActividadController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar su informacion
        $data = CRUDActividad::optionActividadModel("actividad");

        //mostramos el nombre de cada una de las actividades
        foreach($data as $rows => $row)
        {
            //se muestra cada una de la actividades en un option del select
            echo "<option value='".$row["id_actividad"]."'>".$row["nombre"]."</option>";
        }
    }
}
?>
