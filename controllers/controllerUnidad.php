<?php

class mvcUnidad
{
    //Control para manejar el registro de una nueva unidad
    function agregarUnidadController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guardan la informacion de la unidad
            $data = array("nombre" => $_POST["nombre"],
                          "inicio" => $_POST["inicio"],
                          "fin" => $_POST["fin"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDUnidad::agregarUnidadModel($data,"unidad");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "add";

                //nos redireccionara al listado de unidades
                echo "<script>
                        window.location.replace('index.php?section=units&action=list');
                      </script>";
            }
        }
    }

    //Control para mostrar un listado de las unidades registradas en el sistema
    function listadoUnidadController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de las unidades
        $data = CRUDUnidad::listadoUnidadModel("unidad");

        //se imprime la informacion de cada uno de los usuarios registrados
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los usuarios
            echo "<tr class='fondoTabla'>
                <td>".$row["nombre"]."</td>
                <td>".$row["fecha_inicio"]."</td>
                <td>".$row["fecha_fin"]."</td>
                <td>
                    <center>
                        <button class='btn btn-rounded btn-danger' data-toggle='modal' data-target='#delete-modal' onclick='idDel(".$row["id_unidad"].")'> Delete </button>

                        <a href='index.php?section=units&action=list&edit=".$row["id_unidad"]."'>
                            <button class='btn btn-rounded btn-custom'>Edit</button>
                        </a>
                    </center>
                </td>
                </tr>";
        }
    }

    //Control para borrar una unidad del sistema
    public function eliminarUnidadController()
    {
        //se verifica si se envio el id de la unidad a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id de la unidad
            $data = $_POST["del"];

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDUnidad::eliminarUnidadModel($data,"asistencia","unidad");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "delete";

                //nos redireccionara al listado de unidades
                echo "<script>
                        window.location.replace('index.php?section=units&action=list');
                      </script>";
            }
        }
    }

    //Control para poder mostrar la informacion de una unidad a editar
    public function editarUnidadController()
    {
        //se obtiene el id del unidad a mostrar su informacion
        $data = $_GET["edit"];

        //se manda el id de la unidad y el nombre de la tabla donde esta almacenada
        $resp = CRUDUnidad::editarUnidadModel($data,"unidad");

        //se imprime la informacion de la unidad en inputs de un formulario
        echo 
            "
                <input type='hidden' name='id' value=".$resp["id_unidad"].">
                
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='form-group'>
                            <label class='control-label repairtext'>Name</label>
                            <input type='text' name='nombre' class='form-control' value='".$resp["nombre"]."' placeholder='Name'>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='form-group'>
                            <label class='control-label repairtext'>Beginning date</label>
                            <input type='date' name='inicio' class='form-control' value=".$resp["fecha_inicio"].">
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='form-group'>
                            <label class='control-label repairtext'>Finishing date</label>
                            <input type='date' name='fin' class='form-control' value=".$resp["fecha_fin"].">
                        </div>
                    </div>
                </div>
        ";
    }

    //Control para modificar la informacion de una unidad
    public function modificarUnidadController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["id"]))
        {
            //se guardan la informacion de la unidad
            $data = array("id" => $_POST["id"],
                          "nombre" => $_POST["nombre"],
                          "inicio" => $_POST["inicio"],
                          "fin" => $_POST["fin"]);

            //se manda la informacion de la unidad y la tabla en la que esta almacenada
            $resp = CRUDUnidad::modificarUnidadModel($data,"unidad");

            //en caso de que se haya editado correctamente 
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "edit";

                //nos redireccionara al listado de unidades
                echo "<script>
                        window.location.replace('index.php?section=units&action=list');
                      </script>";
            }
        }
    }
}
?>