<?php
//clase para realizar el redireccionamiento del sitio
class url
{
    //modelo para realizar el redireccionamiento del sitio
    public static function urlModel($section,$action)
    {
        //en caso de que se mande un link valido se redirecciona a su pagina correspondiene
        if(($section == "careers" || $section == "students" || $section == "users" || $section == "groups" || $section == "activities" || $section == "units"  || $section == "sessions") && ($action == "add" || $action == "list" || $action == "delete" || $action == "edit" || $action == "students" || $action == "actual" || $action == "student_data" || $action == "my-groups" || $action == "my-students" || $action == "student-record"))
        {
            $url = "views/".$section."/".$action.".php";
        }
        elseif($section == "logout" || $section == "dashboard")
        {
            $url = "views/modules/".$section.".php";
        }
        else
        {
            $url = "views/modules/login.php";
        }
        //y se retorna la pagina a redireccionar
        return $url;
    }
}
?>
