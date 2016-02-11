<?php
//destruimos la sesion para cerrar la sesion del usuario
session_destroy();

//despues lo redireccionamos al index
echo"<script>
        window.location.replace('index.php');
     </script>";
?>