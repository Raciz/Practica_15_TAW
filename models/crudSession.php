<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de asistencia
class CRUDSession
{
    //modelo para mostrar informacion del alumno
    public static function mostrarSessionModel($data,$tabla, $tabla2)
    {
        //se prepara la sentencia para realizar la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT a.img, a.matricula as matricula, a.nombre as nombre,
                                                a.apellido as apellido, a.grupo as grupo,
                                                 c.nombre as carrera
                                                        FROM $tabla as a 
                                                        JOIN $tabla2 as c on c.siglas = a.carrera 
                                                        WHERE matricula = :id");

        //se realiza la asignacion de los datos a buscar
        $stmt -> bindParam(":id",$data,PDO::PARAM_INT);  

        //se ejecuta la sentencia
        $stmt -> execute();

        //retornamos los datos
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para obtener a la unidad a la que pertenece la hora de cai
    public static function unidadesSessionModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE :fecha >= fecha_inicio AND :fecha <= fecha_fin");

        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":fecha",$data, PDO::PARAM_STR);  

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }

    //modelo para obtener el nivel y el teacher del grupo del alumno
    public static function grupoSessionModel($data,$tabla1,$tabla2)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT g.nivel as nivel, u.nombre as teacher 
                                            FROM $tabla1 as g 
                                            JOIN $tabla2 as u on u.num_empleado = g.teacher 
                                            WHERE codigo = :id");

        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":id",$data, PDO::PARAM_STR);  

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }

    //modelo para registrar una asistencia en la base de datos
    public static function agregarSessionModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(id_asistencia,fecha,hora_entrada,alumno,actividad,unidad,nivel,teacher,grupo) 
            VALUES (NULL,:fecha,:horaE,:alumno,:actividad,:unidad,:nivel,:teacher,:grupo)");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":fecha",$data["fecha"],PDO::PARAM_STR);
        $stmt -> bindParam(":horaE",$data["horaE"],PDO::PARAM_STR);
        $stmt -> bindParam(":alumno",$data["matricula"],PDO::PARAM_INT);
        $stmt -> bindParam(":actividad",$data["actividad"],PDO::PARAM_INT);
        $stmt -> bindParam(":unidad",$data["unidad"],PDO::PARAM_INT);
        $stmt -> bindParam(":nivel",$data["nivel"],PDO::PARAM_INT);
        $stmt -> bindParam(":teacher",$data["teacher"],PDO::PARAM_STR);
        $stmt -> bindParam(":grupo",$data["grupo"],PDO::PARAM_STR);

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

    //modelo para mostrar informacion de la asistencia
    public static function listadoSessionModel($tabla1,$tabla2, $tabla3, $tabla4, $tabla5)
    {
        //se prepara la sentencia para realizar la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT asi.id_asistencia as asistencia, a.nombre as nombre, a.apellido as apellido, g.codigo as grupo, c.nombre as carrera, act.nombre as actividad, asi.hora_entrada
                                                        FROM $tabla1 as asi
                                                        JOIN $tabla2 as a on a.matricula = asi.alumno
                                                        JOIN $tabla3 as g on g.codigo = asi.grupo
                                                        JOIN $tabla4 as c on c.siglas = a.carrera
                                                        JOIN $tabla5 as act on act.id_actividad = asi.actividad WHERE hora_salida IS NULL");

        //se ejecuta la sentencia
        $stmt -> execute();

        //retornamos las filas obtenidas
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para 
    public static function horasSessionModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_asistencia = :id");

        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":id",$data, PDO::PARAM_INT);  

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }

    //modelo para finalizar la asistencia del alumno
    public static function finalizarSessionModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET hora_salida = :horaS, hora_completa = :completa WHERE id_asistencia = :id");

        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":id", $data["asistencia"], PDO::PARAM_INT);
        $stmt -> bindParam(":horaS", $data["horaS"], PDO::PARAM_STR);
        $stmt -> bindParam(":completa", $data["completa"], PDO::PARAM_INT);

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

    //modelo para terminar la asistencia del alumno
    public static function terminarSessionModel($hora,$c, $tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET hora_salida = :horaS, hora_completa = :completa WHERE hora_completa IS NULL");

        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":horaS", $hora, PDO::PARAM_STR);
        $stmt -> bindParam(":completa", $c, PDO::PARAM_INT);

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


    //modelo para obtener la las horas de cai realizadas por los alumnos
    public static function historialSessionModel($data,$tabla1,$tabla2,$tabla3,$tabla4)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT a.matricula, a.nombre, a.apellido, u.nombre as teacher, g.codigo as grupo, g.nivel
                                                 FROM $tabla1 as u
                                                 JOIN $tabla2 as t on t.teacher = u.num_empleado  
                                                 JOIN $tabla3 as g on g.teacher = t.teacher
                                                 JOIN $tabla4 as a on a.grupo = g.codigo
                                                 WHERE g.codigo = '".$data["grupo"]."'");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para obtener las horas de cai del alumno
    public static function horasCAIModel($student,$group,$unit,$tabla1,$tabla2,$tabla3,$tabla4)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT al.nombre, al.apellido, a.fecha, a.hora_entrada, a.hora_salida, u.nombre as unidad, ac.nombre as actividad 
                                                 FROM $tabla1 as a
                                                 JOIN $tabla2 as u on u.id_unidad = a.unidad
                                                 JOIN $tabla3 as ac on ac.id_actividad = a.actividad
                                                 JOIN $tabla4 as al on al.matricula = a.alumno
                                                 WHERE a.alumno = :matricula && u.id_unidad = :unidad && a.hora_completa = 1 && a.grupo = :grupo");

        //asignamos los datos para el select
        $stmt -> bindParam(":matricula",$student,PDO::PARAM_INT);
        $stmt -> bindParam(":grupo",$group,PDO::PARAM_STR);
        $stmt -> bindParam(":unidad",$unit,PDO::PARAM_INT);

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para obtener el total de horas de cai del alumno
    public static function horasModel($student,$unit,$tabla1,$tabla2)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT COUNT(*) as horas
                                                 FROM $tabla1 as a
                                                 JOIN $tabla2 as u on u.id_unidad = a.unidad
                                                 WHERE a.alumno = :matricula && unidad = :unidad && hora_completa = 1");

        //asignamos los datos para el select
        $stmt -> bindParam(":matricula",$student,PDO::PARAM_INT);
        $stmt -> bindParam(":unidad",$unit,PDO::PARAM_INT);

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetch();

        //cerramos la conexion
        $stmt -> close();
    }

    public static function terminar()
    {
        $hora = Date("H:i:s");
        $completa = 1;

        $stmt = Conexion::conectar()->prepare("UPDATE asistencia SET hora_salida = :horaS, hora_completa = :completa WHERE hora_salida IS NULL");

        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":horaS", $hora, PDO::PARAM_STR);
        $stmt -> bindParam(":completa",$completa, PDO::PARAM_INT);

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