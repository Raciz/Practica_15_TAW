<?php

//llamamos al model para terminar las horas
$resp = CRUDSession::terminar();

//se ejecuta la sentencia
if($resp == "success")
{
    //si se ejecuto correctamente nos regresa a la pagina
    $_SESSION["mensaje"] = "die";
}
else
{
    //en caso de no ser asi nos retorna fail
    $_SESSION["mensaje"] = "error";
}

echo "<script>window.location.href='index.php?section=sessions&action=actual';</script>";
?>