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
                        window.location.replace('index.php?section=groups&action=list');
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

        //se imprime la informacion de cada uno de los grupos registrados
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los grupos
            echo "<tr class='fondoTabla'>
                <td>".$row["codigo"]."</td>
                <td>".$row["nivel"]."</td>
                <td>".$row["teacher"]."</td>
                <td>
                    <center>
                        <button class='btn btn-rounded btn-danger' id='eliminar' data-toggle='modal' data-target='#eliminar-modal'>Delete</button>
                        <a href='index.php?section=groups&action=list&edit=".$row["codigo"]."'>
                            <button class='btn btn-rounded btn-custom'>Edit</button>
                        </a>
                    </center>
                </td>
            </tr>";
        }
    }

    /*/Control para borrar un grupo del sistema
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
                        window.location.replace('index.php?section=usuari&action=listado');
                      </script>";
            }
        }
    }*/

    //Control para poder mostrar la informacion de un grupo a editar
    public function editarGrupoController()
    {
        //se obtiene el id del grupo a mostrar su informacion
        $data = $_GET["edit"];

        //se manda el id del grupo y el nombre de la tabla donde esta almacenada
        $resp = CRUDGrupo::editarGrupoModel($data,"grupo","teacher","usuario");

        //se imprime la informacion del grupo en inputs de un formulario
        echo "
                    <input type=hidden value=".$resp["codigo"]." name='id'>
                    
                     <div class='form-group'>
                        <label class='control-label'>Code</label>
                        <input type='text' class='form-control' placeholder='Code' value=".$resp["codigo"]." readonly>
                    </div>
                    
                    <div class='form-group'>
                        <label class='control-label'>Level</label>
                        <select style='width:100%;' class='form-control select2' id='level' name='nivel' required>
                            <option value=''></option>";
                            for($i = 1; $i <= 9; $i++)
                            {
                                echo "<option value=".$i.">Level ".$i."</option>";
                            }
        echo "          </select>
                    </div>

                    <div class='form-group'>
                        <label class='control-label'>Teacher</label>
                        <option></option>
                        <select style='width:100%;' class='form-control select2' id='teacher' name='teacher' required>
                            <option value=''></option>";
                            
                            //creamos un objeto de mvcUsuario
                            $option = new mvcUsuario();

                            //se manda a llamar el controller para enlistar todos los teachers en el select
                            $option -> optionUsuarioController();
                            
        echo "          </select>
                    </div>
             ";
 
        //script para seleccionar en el select el option del teacher al que pertenece el grupo
        echo "<script>
                var teacher = document.getElementById('teacher');
                var level = document.getElementById('level');

                for(var i = 1; i < teacher.options.length; i++)
                {
                    if(teacher.options[i].value ==".$resp["id"].")
                    {
                        teacher.selectedIndex = i;
                    }
                }
                
                for(var i = 1; i < level.options.length; i++)
                {
                    if(level.options[i].value ==".$resp["nivel"].")
                    {
                        level.selectedIndex = i;
                    }
                }
                </script>";
        
    }

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
                        window.location.replace('index.php?section=groups&action=list');
                    </script>";
            }
        }
    }
}
?>