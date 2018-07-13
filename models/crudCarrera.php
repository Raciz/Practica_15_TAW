<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de carrera
class CRUDCarrera
{
    //modelo para registrar un grupo en la base de datos
    public static function agregarCarreraModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (siglas,nombre) VALUES (:siglas,:nombre)");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":siglas",$data["siglas"],PDO::PARAM_STR);
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);   

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
        $stmt -> close();
    }

    //modelo para obtener la informacion de las carreras registrados
    public static function listadoCarreraModel($tabla1)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT siglas, nombre FROM $tabla1");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para borrar una carrera de la base de datos
    public static function eliminarGrupoModel($data,$tabla1,$tabla2)
    {
        //preparamos la sentencia para realizar un update para quitar a los alumnos de la carrera a eliminar
        $stmt1 = Conexion::conectar() -> prepare("DELETE FROM $tabla1 WHERE carrera = :id");

        //se realiza la asignacion de los datos a actualizar
        $stmt1 -> bindParam(":id",$data,PDO::PARAM_STR);
        //-----------------------------------------
        //preparamos la sentencia para realizar el Delete para eliminar la carrera
        $stmt2 = Conexion::conectar() -> prepare("DELETE FROM $tabla2 WHERE siglas = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt2 -> bindParam(":id",$data,PDO::PARAM_STR);

        //se ejecuta las sentencias
        if($stmt1 -> execute() && $stmt2 -> execute())
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
        $stmt1 -> close();
        $stmt2 -> close();
    }

    //modelo para obtener la informacion de una carrera
    public static function editarCarreraModel($data,$tabla1)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT siglas, nombre FROM $tabla1 WHERE siglas = :id");

        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":id",$data, PDO::PARAM_STR);	

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }

    //modelo para modificar la informacion de una carrera registrada en la base de datos
    public static function modificarCarreraModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE siglas = :id");
        
        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":id", $data["siglas"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);

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

    //modelo para obtener la informacion de los teachers registrados
    public static function optionCarreraModel($tabla1)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla1");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
}
?>