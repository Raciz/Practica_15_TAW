<?php

class mvcCarrera
{
    //Control para manejar el registro de una nueva carrera
    function agregarCarreraController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["siglas"]))
        {
            //se guardan la informacion de la carrera
            $data = array("siglas" => $_POST["siglas"],
                          "nombre" => $_POST["nombre"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDCarrera::agregarCarreraModel($data,"carrera");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "add";

                //nos redireccionara al listado de grupos
                echo "<script>
                        window.location.replace('index.php?section=careers&action=list');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }

    //Control para mostrar un listado de las carreras registrados en el sistema
    function listadoCarreraController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de las carreras
        $data = CRUDCarrera::listadoCarreraModel("carrera");

        //se imprime la informacion de cada uno de las carreras registradas
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada una de las carreras
            echo "<tr class='fondoTabla'>
                <td>".$row["siglas"]."</td>
                <td>".$row["nombre"]."</td>
                <td>
                    <center>
                        <button class='btn btn-rounded btn-danger' id='eliminar' data-toggle='modal' data-target='#delete-modal' onclick=idDel('".$row["siglas"]."')>Delete</button>
                        <a href='index.php?section=careers&action=list&edit=".$row["siglas"]."'>
                            <button class='btn btn-rounded btn-custom'>Edit</button>
                        </a>
                    </center>
                </td>
            </tr>";
        }
    }

    //Control para borrar una carrera del sistema
    public function eliminarGrupoController()
    {
        //se verifica si se envio el id de la carrera a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id de la carrera
            $data = $_POST["del"];

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDCarrera::eliminarCarreraModel($data,"alumno","carrera");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "delete";

                //nos redireccionara al listado de grupos
                #echo "<script>
                 #       window.location.replace('index.php?section=groups&action=list');
                  #    </script>";
            }
        }
    }

    //Control para poder mostrar la informacion de una carrera a editar
    public function editarCarreraController()
    {
        //se obtiene el id de la carrera a mostrar su informacion
        $data = $_GET["edit"];

        //se manda el id de la carrera y el nombre de la tabla donde esta almacenada
        $resp = CRUDCarrera::editarCarreraModel($data,"carrera");

        //se imprime la informacion de la carrera en inputs de un formulario
        echo "
                    <input type=hidden value=".$resp["siglas"]." name='siglas'>

                    <div class='form-group'>
                        <label class='control-label'>Name</label>
                        <input type='text' class='form-control' placeholder='Codigo' value=".$resp["siglas"]." readonly>
                    </div>

                    <div class='form-group'>
                        <label class='control-label'>Name</label>
                        <input type='text' name='nombre' class='form-control' placeholder='Nombre' value=".$resp["nombre"]." required>
                    </div>";
    }

    //Control para modificar la informacion de una carrera
    public function modificarCarreraController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["siglas"]))
        {
            //se guarda la información de la carrera
            $data = array("siglas" => $_POST["siglas"],
                          "nombre" => $_POST["nombre"]);

            //se manda la informacion de la carrera y la tabla en la que esta almacenada
            $resp = CRUDCarrera::modificarCarreraModel($data,"carrera");

            //en caso de que se haya editado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "edit";

                //nos redireccionara al listado de grupos
                echo "<script>
                        window.location.replace('index.php?section=careers&action=list');
                    </script>";
            }
        }
    }

     //Control para mostrar a las carrera en un select
    public function optionCarreraController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar su informacion
        $data = CRUDCarrera::optionCarreraModel("carrera");

        //mostramos el nombre de cada una de los teachers
        foreach($data as $rows => $row)
        {
            //se muestra cada una de los teachers en un option del select
            echo "<option value=".$row["siglas"].">".$row["nombre"]."</option>";
        }
    }
}
?>
