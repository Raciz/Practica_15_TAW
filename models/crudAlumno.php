<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de grupo
class CRUDAlumno
{
    //modelo para registrar un grupo en la base de datos
    public static function agregarAlumnoModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (matricula,nombre,apellido,carrera) VALUES (:matricula,:nombre,:apellido,:carrera)");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":matricula",$data["matricula"],PDO::PARAM_INT);
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":apellido",$data["apellido"],PDO::PARAM_STR);
        $stmt -> bindParam(":carrera",$data["carrera"],PDO::PARAM_STR);

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

    //modelo para obtener la informacion de los grupos registrados
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

    //modelo para borrar un grupo de la base de datos
    public static function eliminarAlumnoModel($data,$tabla1)
    {
        //-----------------------------------------
        //preparamos la sentencia para realizar el Delete para eliminar el grupo
        $stmt2 = Conexion::conectar() -> prepare("DELETE FROM $tabla1 WHERE matricula = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt2 -> bindParam(":id",$data,PDO::PARAM_INT);

        //se ejecuta las sentencias
        if($stmt2 -> execute())
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

    //modelo para obtener la informacion de un grupo
    public static function editarAlumnoModel($data,$tabla1,$tabla2)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT a.matricula as matricula , a.nombre as nombre, a.apellido as apellido, a.siglas as carrera
                                                 FROM $tabla1 as a 
                                               WHERE a.matricula = :id");

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
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, carrera = :carrera WHERE matricula = :id");
        
        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":id", $data["matricula"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellido", $data["apellido"], PDO::PARAM_STR);
        $stmt -> bindParam(":carrera", $data["carrera"], PDO::PARAM_STR);

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