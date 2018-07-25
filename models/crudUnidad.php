<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de unidades
class CRUDUnidad
{
    //modelo para registrar una unidad en la base de datos
    public static function agregarUnidadModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (nombre,fecha_inicio,fecha_fin) VALUES (:nombre,:inicio,:fin)");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":inicio",$data["inicio"],PDO::PARAM_STR);
        $stmt -> bindParam(":fin",$data["fin"],PDO::PARAM_STR);

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

    //modelo para obtener la informacion de las unidades registradas
    public static function listadoUnidadModel($tabla)
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
    

    //modelo para borrar una unidad de la base de datos
    public static function eliminarUnidadModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el Delete de la unidad
        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_unidad = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt -> bindParam(":id",$data,PDO::PARAM_INT);
        
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
    }

    //modelo para obtener la informacion de una unidad
    public static function editarUnidadModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_unidad = :id");

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
    public static function modificarUnidadModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, fecha_inicio = :inicio, fecha_fin = :fin WHERE id_unidad = :id");

        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":inicio",$data["inicio"],PDO::PARAM_STR);
        $stmt -> bindParam(":fin",$data["fin"],PDO::PARAM_STR);
        $stmt -> bindParam(":id",$data["id"],PDO::PARAM_INT);

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