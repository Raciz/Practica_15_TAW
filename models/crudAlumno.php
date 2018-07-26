<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de alumno
class CRUDAlumno
{
    //modelo para registrar un alumno en la base de datos
    public static function agregarAlumnoModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (matricula,nombre,apellido,carrera,img) VALUES (:matricula,:nombre,:apellido,:carrera,:img)");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":matricula",$data["matricula"],PDO::PARAM_INT);
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":apellido",$data["apellido"],PDO::PARAM_STR);
        $stmt -> bindParam(":carrera",$data["carrera"],PDO::PARAM_STR);
        $stmt -> bindParam(":img",$data["img"],PDO::PARAM_STR);

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

    //modelo para obtener la informacion de los alumnos registrados
    public static function listadoAlumnoModel($tabla1,$tabla2,$tabla3)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT a.matricula as matricula , a.nombre as nombre, a.apellido as apellido, a.grupo as grupo, c.nombre as carrera
                                                 FROM $tabla1 as a 
                                                 JOIN $tabla3 as c on c.siglas = a.carrera");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para borrar un alumno de la base de datos
    public static function eliminarAlumnoModel($data,$tabla1,$tabla2)
    {
        //preparamos la sentencia para realizar el Delete para eliminar las asistencias de ese alumno
        $stmt1 = Conexion::conectar() -> prepare("DELETE FROM $tabla1 WHERE alumno = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt1 -> bindParam(":id",$data,PDO::PARAM_INT);
        
        //--------------------------
        
        //preparamos la sentencia para realizar el Delete para eliminar el alumno
        $stmt2 = Conexion::conectar() -> prepare("DELETE FROM $tabla2 WHERE matricula = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt2 -> bindParam(":id",$data,PDO::PARAM_INT);

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
        $stmt -> close();
    }

    //modelo para obtener la informacion de un grupo
    public static function editarAlumnoModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT matricula, nombre, apellido, carrera, grupo
                                               FROM $tabla 
                                               WHERE matricula = :id");

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
    public static function modificarAlumnoModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, carrera = :carrera, grupo = :grupo WHERE matricula = :id");
        
        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":id", $data["matricula"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellido", $data["apellido"], PDO::PARAM_STR);
        $stmt -> bindParam(":carrera", $data["carrera"], PDO::PARAM_STR);
        $stmt -> bindParam(":grupo", $data["grupo"], PDO::PARAM_STR);

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
    
    //----------------------------------------------------------------------------------------
    
    //modelo para obtener la informacion de los alumnos sin grupos
    public static function optionAlumnoModel($tabla)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE grupo is NULL");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
    
    //modelo para registrar un alumno al grupo en la base de datos
    public static function agregarAlumnoGrupoModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el update
        $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET grupo = :grupo WHERE matricula = :matricula");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":matricula",$data["matricula"],PDO::PARAM_INT);
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
    
    //modelo para obtener la informacion de los alumnos en el grupos
    public static function listadoAlumnoGrupoModel($data,$tabla)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE grupo = :grupo");
        $stmt -> bindParam(":grupo",$data,PDO::PARAM_STR);

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
    
    //modelo para borrar un alumno de un grupo 
    public static function eliminarAlumnoGrupoModel($data,$tabla)
    {
        //preparamos la sentencia para realizar un update
        $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET grupo = NULL WHERE matricula = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt -> bindParam(":id",$data["matricula"],PDO::PARAM_INT);

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

    //modelo para obtener la informacion de los alumnos registrados
    public static function optionAlumnosModel($tabla)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE grupo IS NOT NULL");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
 
}
?>