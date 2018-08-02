<?php

	$hora = Date("H:i:s");

	$stmt = Conexion::conectar()->prepare("UPDATE asistencia SET hora_salida = :horaS, 
            hora_completa = :completa WHERE hora_completa IS NULL");
        
    //se realiza la asignacion de los datos para el update
   	$stmt -> bindParam(":horaS", $hora, PDO::PARAM_STR);
    $stmt -> bindParam(":completa", 1, PDO::PARAM_INT);

    //se ejecuta la sentencia
    if($stmt -> execute())
    {
    	//si se ejecuto correctamente nos regresa a la pagina
    	$_SESSION["mensaje"]=="die";
    }
    else{
      	//en caso de no ser asi nos retorna fail
        $_SESSION["mensaje"]=="error";
    }

    echo "<script>window.location.href='index.php?section=sessions&action=actual';</script>";

    //cerramos la conexion
    $stmt->close();

?>