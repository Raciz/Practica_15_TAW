<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de grupo
class CRUDTeacher
{
    //modelo para obtener la informacion de los grupos registrados
    public static function listadoGrupoModel($teacher,$tabla)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE teacher = :teacher");
        
        //asignamos los datos para el select
        $stmt -> bindParam(":teacher",$teacher,PDO::PARAM_INT);
        
        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
}
?>