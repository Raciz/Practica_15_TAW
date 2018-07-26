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
    public static function listadoCarreraModel($tabla)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT siglas, nombre FROM $tabla");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para borrar una carrera de la base de datos
    public static function eliminarCarreraModel($data,$tabla1,$tabla2,$tabla3)
    {
        //select para obtener a los alumnos en la carrera a eliminar
        $stmt = Conexion::conectar() -> prepare("SELECT matricula FROM $tabla2 WHERE carrera = :id");
        
        //asignamos los datos para el select
        $stmt -> bindParam(":id",$data,PDO::PARAM_STR);
        
        //ejecutamos la sentencia
        $stmt -> execute();
        
        //guardamos las matriculas de los alumnos
        $students = $stmt -> fetchAll();
                
        //ciclo para eliminar las asistencias y alumnos de la carrera
        foreach($students as $rows => $row)
        {
            //para esto usamos el modelo eliminarAlumnoModel
            $resp = CRUDAlumno::eliminarAlumnoModel($row["matricula"],$tabla1,$tabla2);
        }

        //-----------------------------------------
        
        //preparamos la sentencia para realizar el Delete para eliminar la carrera
        $stmt1 = Conexion::conectar() -> prepare("DELETE FROM $tabla3 WHERE siglas = :id");

        //se realiza la asignacion de los datos a eliminar
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
        $stmt -> close();
        $stmt1 -> close();
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

    //modelo para obtener la informacion de las carreras registrados
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