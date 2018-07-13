<?php

class mvcAlumno
{
    //Control para manejar el registro de un nuevo alumno
    function agregarAlumnoController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["matricula"]))
        {
            //se guardan la informacion del Alumno
            $data = array("matricula" => $_POST["matricula"],
                          "nombre" => $_POST["nombre"],
                          "apellido" => $_POST["apellido"],
                          "carrera" => $_POST["carrera"],
                          "grupo" => $_POST["grupo"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDAlumno::agregarAlumnoModel($data,"alumno");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "add";

                //nos redireccionara al listado de alumnos
                echo "<script>
                        window.location.replace('index.php?section=students&action=list');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }

    //Control para mostrar un listado de los Alumnos registrados en el sistema
    function listadoAlumnoController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los alumnos
        $data = CRUDAlumno::listadoAlumnoModel("alumno","grupo","carrera");

        //se imprime la informacion de cada uno de los Alumnos registrados
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los Alumnos
            echo "<tr class='fondoTabla'>
                <td>".$row["matricula"]."</td>
                <td>".$row["nombre"]."</td>
                <td>".$row["apellido"]."</td>
                <td>".$row["grupo"]."</td>
                <td>".$row["carrera"]."</td>
                <td>
                    <center>
                        <button class='btn btn-rounded btn-danger' id='eliminar' data-toggle='modal' data-target='#delete-modal' onclick=idDel('".$row["matricula"]."')>Delete</button>
                        <a href='index.php?section=students&action=list&edit=".$row["matricula"]."'>
                            <button class='btn btn-rounded btn-custom'>Edit</button>
                        </a>
                    </center>
                </td>
            </tr>";
        }
    }

    //Control para borrar un alumno del sistema
    public function eliminarAlumnoController()
    {
        //se verifica si se envio el id del alumno a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id del Alumno
            $data = $_POST["del"];

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDAlumno::eliminarAlumnoModel($data,"alumno");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "delete";

                //nos redireccionara al listado de Alumnos
                echo "<script>
                        window.location.replace('index.php?section=students&action=list');
                      </script>";
            }
        }
    }

    //Control para poder mostrar la informacion de un Alumno a editar
    public function editarAlumnoController()
    {
        //se obtiene el id del Alumno a mostrar su informacion
        $data = $_GET["edit"];

        //se manda el id del Alumno y el nombre de la tabla donde esta almacenada
        $resp = CRUDAlumno::editarAlumnoModel($data,"alumno");
        
        //se imprime la informacion del Alumno en inputs de un formulario
        echo "
                    <input type=hidden value=".$resp["matricula"]." name='matricula'>

                     <div class='form-group'>
                        <label class='control-label repairtext'>ID</label>
                        <input type='text' class='form-control' placeholder='Code' readonly value=".$resp["matricula"].">
                    </div>

                    <div class='form-group'>
                        <label class='control-label repairtext'>First name</label>
                        <input type='text' name='nombre' class='form-control' placeholder='Code' value='".$resp["nombre"]."' required>
                    </div>

                    <div class='form-group'>
                        <label class='control-label repairtext'>Last name</label>
                        <input type='text' name='apellido' class='form-control' placeholder='Code' value='".$resp["apellido"]."' required>
                    </div>";
                        
        echo "
                    <div class='form-group'>
                        <label class='control-label repairtext'>Career</label>
                        <select style='width:100%;' class='form-control select2' id='career' name='carrera' required>
                            <option value=''></option>";

                            //creamos un objeto de mvcCarrera
                            $option = new mvcCarrera();

                            //se manda a llamar el controller para enlistar todos las carreras en el select
                            $option -> optionCarreraController();

        echo "         </select>
                    </div>
                    
                    <div class='form-group'>
                        <label class='control-label repairtext'>Career</label>
                        <select style='width:100%;' class='form-control select2' id='grupo' name='grupo' required>
                            <option value=''></option>";
                            //creamos un objeto de mvcGrupo
                            $option = new mvcGrupo();

                            //se manda a llamar el controller para enlistar todos los grupos en el select
                            $option -> optionGrupoController();
         echo "         </select>
                    </div>";                   

        //script para seleccionar en el select el option de la carrera al que pertenece el Alumno
        echo "<script>
                var career = document.getElementById('career');
                var grupo = document.getElementById('grupo');

                for(var i = 1; i < career.options.length; i++)
                {
                    if(career.options[i].value =='".$resp["carrera"]."')
                    {
                        career.selectedIndex = i;
                    }
                }
                
                for(var i = 1; i < grupo.options.length; i++)
                {
                    if(grupo.options[i].value =='".$resp["grupo"]."')
                    {
                        grupo.selectedIndex = i;
                    }
                }
            </script>";

    }

    //Control para modificar la informacion de un Alumno
    public function modificarAlumnoController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["matricula"]))
        {
            //se guardan la informacion del usuario
            $data = array("matricula" => $_POST["matricula"],
                          "nombre" => $_POST["nombre"],
                          "apellido" => $_POST["apellido"],
                          "carrera" => $_POST["carrera"],
                          "grupo" => $_POST["grupo"]);

            //se manda la informacion del Alumno y la tabla en la que esta almacenada
            $resp = CRUDAlumno::modificarAlumnoModel($data,"alumno");

            //en caso de que se haya editado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "edit";

                //nos redireccionara al listado de Alumnos
                echo "<script>
                        window.location.replace('index.php?section=students&action=list');
                    </script>";
            }
        }
    }
//------------------------------------------------------------------------------------- 
    //Control para mostrar a los alumnos sin grupo en un select
    public function optionAlumnoController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar su informacion
        $data = CRUDAlumno::optionAlumnoModel("alumno");

        //mostramos el nombre de cada uno de los alumnos
        foreach($data as $rows => $row)
        {
            //se muestra cada una de los alumnos en un option del select
            echo "<option class='repairtext' value=".$row["matricula"].">".$row["nombre"]."</option>";
        }
    }
    
    //Control para manejar el ingreso del alumno al grupo
    function agregarAlumnoGrupoController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["matricula"]))
        {
            //se guardan la informacion del grupo y alumno
            $data = array("matricula" => $_POST["matricula"],
                          "grupo" => $_POST["grupo"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDAlumno::agregarAlumnoGrupoModel($data,"alumno");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "add";
                
                //nos redireccionara al listado de alumnos del grupo
                echo "<script>
                        window.location.replace('index.php?section=groups&action=students&group=".$data["grupo"]."');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }
    
    //Control para mostrar un listado de los Alumnos en el grupo
    function listadoAlumnoGrupoController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los alumnos del grupo
        $data = CRUDAlumno::listadoAlumnoGrupoModel($_GET["group"],"alumno");

        //se imprime la informacion de cada uno de los Alumnos en el grupo
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los Alumnos
            echo "<tr class='fondoTabla'>
                <td>".$row["matricula"]."</td>
                <td>".$row["nombre"]."</td>
                <td>".$row["apellido"]."</td>
                <td>".$row["carrera"]."</td>
                <td>
                    <center>
                        <button class='btn btn-rounded btn-danger' id='eliminar' data-toggle='modal' data-target='#delete-modal' onclick=idDel('".$row["matricula"]."')>Delete</button>
                    </center>
                </td>
            </tr>";
        }
    }
    
    //Control para borrar un alumno del grupo
    public function eliminarAlumnoGrupoController()
    {
        //se verifica si se envio el id del alumno a eliminar del grupo
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda la informacion
            $data = array ("matricula" => $_POST["del"],
                           "grupo" => $_POST["grupo"]);

            //y se manda al modelo el informacio y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDAlumno::eliminarAlumnoGrupoModel($data,"alumno");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "delete";

                //nos redireccionara al listado de Alumnos del grupo
                echo "<script>
                        window.location.replace('index.php?section=groups&action=students&group=".$data["grupo"]."');
                      </script>";
            }
        }
    }
}
?>
