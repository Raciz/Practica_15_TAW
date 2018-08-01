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
    
    //modelo para obtener la informacion de un alumno
    public static function dataAlumnoModel($student,$tabla)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE matricula = :matricula");
        
        //asignamos los datos para el select
        $stmt -> bindParam(":matricula",$student,PDO::PARAM_INT);
        
        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetch();

        //cerramos la conexion
        $stmt -> close();
    }
    
    //modelo para obtener las horas de cai del alumno
    public static function horasAlumnoModel($student,$group,$tabla1,$tabla2,$tabla3)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT a.fecha, a.hora_entrada, a.hora_salida, u.nombre as unidad, ac.nombre as actividad 
                                                 FROM $tabla1 as a
                                                 JOIN $tabla2 as u on u.id_unidad = a.unidad
                                                 JOIN $tabla3 as ac on ac.id_actividad = a.actividad
                                                 WHERE a.alumno = :matricula && a.hora_completa = 1 && grupo = :grupo");
        
        //asignamos los datos para el select
        $stmt -> bindParam(":matricula",$student,PDO::PARAM_INT);
        $stmt -> bindParam(":grupo",$group,PDO::PARAM_STR);
        
        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
    
    //modelo para obtener el nombre de la carrera
    public static function nombreCarreraModel($carrera,$tabla)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT nombre FROM $tabla WHERE siglas = :siglas");
        
        //asignamos los datos para el select
        $stmt -> bindParam(":siglas",$carrera,PDO::PARAM_STR);
        
        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetch();

        //cerramos la conexion
        $stmt -> close();
    }
}
?>