<?php

class mvcUsuario
{
    //Control para manejar el registro de un nuevo usuario
    function agregarUsuarioController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["num_empleado"]))
        {
            //se guardan la informacion del usuario
            $data = array("num_empleado" => $_POST["num_empleado"],
                          "nombre" => $_POST["nombre"],
                          "username" => $_POST["username"],
                          "password" => $_POST["password"],
                          "email" => $_POST["email"],
                          "tipo" => $_POST["tipo"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDUsuario::agregarUsuarioModel($data,"usuario");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //nos redireccionara al listado deusuarios
                echo "<script>
                        window.location.replace('index.php?section=usuario&action=listado');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }

    //Control para mostrar un listado de los usuarios registrados en el sistema
    function listadoUsuarioController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los usuarios
        $data = CRUDUsuario::listadoUsuarioModel("usuario");

        //se imprime la informacion de cada uno de los usuarios registrados
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los usuarios
            echo "<tr>
                <td>".$row["num_empleado"]."</td>
                <td>".$row["nombre"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["tipo"]."</td>
                <td>
                    <center>
                        <button title='Eliminar Usuario' class='btn btn-icon btn-danger'><i class='fa fa-trash'></i></button>
                        <button title='Editar Usuario' class='btn btn-icon btn-warning'><i class='fa fa-edit'></i></button>
                    </center>
                </td>
            </tr>";
        }
    }

    //Control para borrar un usuario del sistema
    public function eliminarUsuarioController()
    {
        //se verifica si se envio el id del usuario a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id del usuario
            $data = $_POST["del"];

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDUsuario::eliminarUsuarioModel($data,"usuario");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //nos redireccionara al listado deusuarios
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


                    <div class='form-group'>
                        <label>Fecha de Nacimiento</label>

                        <div class='input-group date'>
                            <div class='input-group-addon'>
                                <i class='fa fa-calendar'></i>
                            </div>
                            <input name='fecha' type='text' class='form-control pull-right' id='datepicker2' value='".$resp["fechaNac"]."'>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label>Grupo</label>
                        <select name='grupo' id='grupo' class='form-control select2' style='width: 100%;' required>";

        //creamos un objeto de mvcGrupo
        $option = new mvcGrupo();

        //se manda a llamar al control para traer a los grupos en options
        $option -> optionGrupoController();

        echo"           </select>
                    </div>";
        
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

    //Control para modificar la informacion de un usuario
    public function modificarUsuarioController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guardan la informacion del usuario
            $data = array("id" => $_POST["id"],
                          "nombre" => $_POST["nombre"],
                          "username" => $_POST["username"],
                          "password" => $_POST["password"],
                          "email" => $_POST["email"],
                          "tipo" => $_POST["tipo"]);

            //se manda la informacion del usuario y la tabla en la que esta almacenada
            $resp = CRUDUsuario::modificarUsuarioModel($data,"usuario");

            //en caso de que se haya editado correctamente 
            if($resp == "success")
            {
                //nos redireccionara al listado de usuarios
                echo "<script>
                        window.location.replace('index.php?section=alumno&action=listado');
                    </script>";
            }
        }
    }
    */
}
?>


