<?php
//clase para realizar el redireccionamiento del sitio
class url
{
    //modelo para realizar el redireccionamiento del sitio
    public static function urlModel($section,$action)
    {
        //en caso de que se mande un link valido se redirecciona a su pagina correspondiene
        if(($section == "grupo" || $section == "alumno" ||  $section == "pago") && ($action == "agregar" || $action == "listado" || $action == "eliminar" || $action == "editar"))
        {
            $url = "views/".$section."/".$action.".php";
        }
        elseif($section == "listado" || $section == "dashboard"  || $section == "logout")
        {
            $url = "views/modules/".$section.".php";
        }
        elseif($section == "admin")
        {
            $url = "views/modules/login.php";
        }
        else
        {
            $url = "views/modules/dashboard.php";
        }

        //y se retorna la pagina a redireccionar
        return $url;
    }
}
?>