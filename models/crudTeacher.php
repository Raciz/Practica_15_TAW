<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de teacher
class CRUDTeacher
{
    //modelo para obtener la informacion de los grupos del teacher
    public static function listadoGrupoTeacherModel($teacher,$tabla)
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
    
    //modelo para obtener la informacion de los alumnos de un grupo del teacher
    public static function listadoAlumnoTeacherModel($group,$tabla)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE grupo = :grupo ORDER BY carrera");
        
        //asignamos los datos para el select
        $stmt -> bindParam(":grupo",$group,PDO::PARAM_STR);
        
        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
}
?>