<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos
class CRUD
{
    //modelo para obtener la informacion para el login
    public static function loginModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE username = :id");	

        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":id", $data["usuario"], PDO::PARAM_STR);

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }

    //modelo para obtener diferente informacion acerca del sistema 
    public static function dashModel($tabla)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla"); 

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }
}