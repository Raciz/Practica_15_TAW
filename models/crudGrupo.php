<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de grupo
class CRUDGrupo
{
    //modelo para registrar un grupo en la base de datos
    public static function agregarGrupoModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (codigo,nivel,teacher) VALUES (:codigo,:nivel,:teacher)");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":codigo",$data["codigo"],PDO::PARAM_STR);
        $stmt -> bindParam(":nivel",$data["nivel"],PDO::PARAM_INT);
        $stmt -> bindParam(":teacher",$data["teacher"],PDO::PARAM_INT);

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
    public static function listadoGrupoModel($tabla1,$tabla2,$tabla3)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT g.codigo as codigo , g.nivel as nivel , u.nombre as teacher 
                                                 FROM $tabla1 as g 
                                                 JOIN $tabla2 as t on t.teacher = g.teacher
                                                 JOIN $tabla3 as u on u.num_empleado = t.teacher");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para borrar un grupo de la base de datos
    public static function eliminarGrupoModel($data,$tabla1,$tabla2)
    {
        //preparamos la sentencia para realizar un update para quitar a los alumnos del grupo a eliminar
        $stmt1 = Conexion::conectar() -> prepare("UPDATE $tabla1 SET grupo = NULL WHERE grupo = :id");

        //se realiza la asignacion de los datos a actualizar
        $stmt1 -> bindParam(":id",$data,PDO::PARAM_STR);
        //-----------------------------------------
        //preparamos la sentencia para realizar el Delete para eliminar el grupo
        $stmt2 = Conexion::conectar() -> prepare("DELETE FROM $tabla2 WHERE codigo = :id");

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

    //modelo para obtener la informacion de un grupo
    public static function editarGrupoModel($data,$tabla1,$tabla2,$tabla3)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT g.codigo as codigo, g.nivel as nivel, u.nombre as teacher, u.num_empleado as id
                                               FROM $tabla1 as g 
                                               JOIN $tabla2 as t on t.teacher = g.teacher
                                               JOIN $tabla3 as u on u.num_empleado = t.teacher 
                                               WHERE g.codigo = :id");

        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":id",$data, PDO::PARAM_STR);	

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }

    //modelo para modificar la informacion de un usuario registrada en la base de datos
    public static function modificarGrupoModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nivel = :nivel, teacher = :teacher WHERE codigo = :id");
        
        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":id", $data["id"], PDO::PARAM_STR);
        $stmt -> bindParam(":nivel", $data["nivel"], PDO::PARAM_INT);
        $stmt -> bindParam(":teacher", $data["teacher"], PDO::PARAM_INT);

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