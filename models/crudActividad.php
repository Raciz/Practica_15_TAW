<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de actividad
class CRUDActividad
{
    //modelo para registrar una actividad en la base de datos
    public static function agregarActividadModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (id_actividad,nombre,descripcion) VALUES (2,:nombre,:descripcion)");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion",$data["descripcion"],PDO::PARAM_STR);   

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

    //modelo para obtener la informacion de las actividades registradas
    public static function listadoActividadModel($tabla1)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT id_actividad, nombre, descripcion FROM $tabla1");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para borrar una actividad de la base de datos
    public static function eliminarActividadModel($data,$tabla1)
    {
        //preparamos la sentencia para realizar un delete para eliminar la actividad
        $stmt1 = Conexion::conectar() -> prepare("DELETE FROM $tabla1 WHERE id_actividad = :id");

        //se realiza la asignacion de los datos a actualizar
        $stmt1 -> bindParam(":id",$data,PDO::PARAM_STR);

        //se ejecuta las sentencias
        if($stmt1 -> execute())
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

    //modelo para obtener la informacion de una actividad
    public static function editarActividadModel($data,$tabla1)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT id_actividad, nombre, descripcion FROM $tabla1 WHERE id_actividad = :id");

        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":id",$data, PDO::PARAM_STR);	

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }

    //modelo para modificar la informacion de una actividad registrada en la base de datos
    public static function modificarActividadModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion WHERE id_actividad = :id");
        
        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":id", $data["id_actividad"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion", $data["descripcion"], PDO::PARAM_STR);

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

    //modelo para obtener la informacion de las actividades registradas
    public static function optionActividadModel($tabla1)
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