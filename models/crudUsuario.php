<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de usuario
class CRUDUsuario
{
    //modelo para registrar un usuario en la base de datos
    public static function agregarUsuarioModel($data,$tabla1,$tabla2)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla1 (nombre,username,password,email,tipo) VALUES (:nombre,:username,:password,:email,:tipo)");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":username",$data["username"],PDO::PARAM_STR);
        $stmt -> bindParam(":password",$data["password"],PDO::PARAM_STR);
        $stmt -> bindParam(":email",$data["email"],PDO::PARAM_STR);
        $stmt -> bindParam(":tipo",$data["tipo"],PDO::PARAM_STR);

        //se ejecuta la sentencia
        if($stmt -> execute())
        {
            //se verifica si el nuevo usuario es un teacher
            if($data["tipo"] == "Teacher")
            {
                //obtenemos el id del usuario recien registrado
                $stmt = Conexion::conectar() -> prepare("SELECT MAX(num_empleado) as id FROM $tabla1");
                //ejecutamos la sentencia
                $stmt -> execute();
                //obtenemos el id del ultimo usuario registrado
                $id = $stmt -> fetch();
                //y la guardamos
                $id = $id["id"];

                //se prepara la sentencia para realizar el insert
                $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla2 (teacher) VALUES (:id)");
                //se realiza la asignacion de los datos a insertar
                $stmt -> bindParam(":id",$id,PDO::PARAM_INT);
                //ejecutamos la sentencia
                $stmt -> execute();
            }

            //si se ejecuto correctamente nos retorna success
            return "success";
        }
        else
        {
            print_r($stmt -> errorInfo());
            //en caso de no ser asi nos retorna fail
            return "fail";
        }

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para obtener la informacion de losusuarios registrados
    public static function listadoUsuarioModel($tabla)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
    //modelo para obtener la informacion de los teachers registrados
    public static function optionUsuarioModel($tabla1,$tabla2)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla1 as u JOIN $tabla2 as t on t.teacher = u.num_empleado");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    /*/modelo para borrar un usuario de la base de datos
    public static function eliminarUsuarioModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el Delete
        $stmt1 = Conexion::conectar() -> prepare("DELETE FROM $tabla1 WHERE alumna = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt1 -> bindParam(":id",$data,PDO::PARAM_INT);

        //se ejecuta las sentencias
        if($stmt -> execute())
        {
            //si se ejecuto correctamente nos retorna success
            return "success";
        }
        else
        {
            //en caso de no ser asi nos retorna fail
            return "fail";
        }

        //cerramos la conexion
        $stmt -> close();
    }*/

    //modelo para obtener la informacion de un usuario
    public static function editarUsuarioModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE num_empleado = :id");

        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":id",$data, PDO::PARAM_INT);	

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }

    //modelo para modificar la informacion de un usuario registrada en la base de datos
    public static function modificarUsuarioModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, username = :username, password = :password, email = :email WHERE num_empleado = :id");

        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":username",$data["username"],PDO::PARAM_STR);
        $stmt -> bindParam(":password",$data["password"],PDO::PARAM_STR);
        $stmt -> bindParam(":email",$data["email"],PDO::PARAM_STR);

        //se ejecuta la sentencia
        if($stmt -> execute())
        {
            //si se ejecuto correctamente nos retorna success
            return "success";
        }
        else
        {
            //en caso de no ser asi nos retorna fail
            return "fail";
        }

        //cerramos la conexion
        $stmt->close();
    }
}
?>