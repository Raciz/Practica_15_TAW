<?php

//llamamos al model para terminar las horas
$resp = CRUDSession::terminar();

//se ejecuta la sentencia
if($resp == "success")
{
    //si se ejecuto correctamente asignamos die a mensaje
    $_SESSION["mensaje"] = "die";
}
else
{
    //en caso de no ser asi asignamos error a mensaje
    $_SESSION["mensaje"] = "error";
}

//nos direccionaremos a la seccion de session
echo "<script>window.location.href='index.php?section=sessions&action=actual';</script>";
?>