<?php

class mvcUsuario
{
    //Control para manejar el registro de un nuevo usuario
    function agregarUsuarioController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guardan la informacion del usuario
            $data = array("nombre" => $_POST["nombre"],
                          "username" => $_POST["username"],
                          "password" => $_POST["password"],
                          "email" => $_POST["email"],
                          "tipo" => $_POST["tipo"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDUsuario::agregarUsuarioModel($data,"usuario","teacher");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //nos redireccionara al listado deusuarios
                echo "<script>
                        window.location.replace('index.php?section=users&action=list');
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
            echo "<tr class='fondoTabla'>
                <td>".$row["num_empleado"]."</td>
                <td>".$row["nombre"]."</td>
                <td>".$row["username"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["tipo"]."</td>
                <td>
                    <center>
                        <button class='btn btn-rounded btn-danger' id='eliminar' data-toggle='modal' data-target='#eliminar-modal'>Delete</button>
                        <a href='index.php?section=users&action=list&edit=".$row["num_empleado"]."'><button class='btn btn-rounded btn-custom'>Edit</button></a>
                    </center>
                </td>
                </tr>";
        }
    }

    /*/Control para borrar un usuario del sistema
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
    }*/

    //Control para poder mostrar la informacion de un Usuario a editar
    public function editarUsuarioController()
    {
        //se obtiene el id del usuario a mostrar su informacion
        $data = $_GET["edit"];

        //se manda el id del usuario y el nombre de la tabla donde esta almacenada
        $resp = CRUDUsuario::editarUsuarioModel($data,"usuario");

        //se imprime la informacion del usuario en inputs de un formulario
        echo 
        "
                    <input type='hidden' name='id' value=".$data.">
                    <div class='form-group'>
                        <label class='control-label'>Name</label>
                        <input type='text' class='form-control' name='nombre' placeholder='Name' value='".$resp["nombre"]."' required>
                    </div>

                    <div class='form-group'>
                        <label class='control-label'>Username</label>
                        <input type='text' class='form-control' name='username' placeholder='Username' value='".$resp["username"]."' required>
                    </div>


                    <div class='form-group'>
                        <label class='control-label'>Password</label>
                        <input type='password' class='form-control' name='password' placeholder='Password' value='".$resp["password"]."' required>
                    </div>


                    <div class='form-group'>
                        <label class='control-label'>Email</label>
                        <input type='email' class='form-control' name='email' placeholder='Email' value='".$resp["email"]."'>
                    </div>
        ";
    }

    //Control para modificar la informacion de un usuario
    public function modificarUsuarioController()
    {
        
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["id"]))
        {
            //se guardan la informacion del usuario
            $data = array("id" => $_POST["id"],
                          "nombre" => $_POST["nombre"],
                          "username" => $_POST["username"],
                          "password" => $_POST["password"],
                          "email" => $_POST["email"]);

            //se manda la informacion del usuario y la tabla en la que esta almacenada
            $resp = CRUDUsuario::modificarUsuarioModel($data,"usuario");

            //en caso de que se haya editado correctamente 
            if($resp == "success")
            {
                //nos redireccionara al listado de usuarios
                echo "<script>
                window.location.replace('index.php?section=users&action=list');
            </script>";
            }
        }
    }
    
    //Control para mostrar a los teachers en un select
    public function optionUsuarioController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar su informacion
        $data = CRUDUsuario::optionUsuarioModel("usuario","teacher");

        //mostramos el nombre de cada una de los teachers
        foreach($data as $rows => $row)
        {
            //se muestra cada una de los teachers en un option del select
            echo "<option value=".$row["num_empleado"].">".$row["nombre"]."</option>";
        }
    }
}
?>


