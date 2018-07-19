<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se va a mostrar un mensaje de aviso al suceder un error
if(!empty($_SESSION["error"]))
{
    //si session en error es type
    if($_SESSION["error"]=="type")
    {
        //se muestra el alert de type
        echo"
        <script>
            swal
            (
                {
                    title: 'Error:',
                    text: 'solo se permite subir imagenes en formato JPG o PNG',
                    type: 'error',
                    confirmButtonText: 'Continuar',
                    confirmButtonColor: '#4fa7f3'
                }
            )
        </script>
        ";
    }
    //si session en error es size
    elseif ($_SESSION["error"]=="size")
    {
        //se muestra el alert de size
        echo"
        <script>
            swal
            (
                {
                    title: 'Error:',
                    text: 'no se permite subir imagenes de tamaño superior a 5 MB',
                    type: 'error',
                    confirmButtonText: 'Continuar',
                    confirmButtonColor: '#4fa7f3'
                }
            )
        </script>
        ";
    }
    //si session en error es copy
    elseif ($_SESSION["error"]=="copy")
    {
        //se muestra el alert de copy
        echo"
        <script>
            swal
            (
                {
                    title: 'Error:',
                    text: 'no se puede subir la imagen al sistema',
                    type: 'error',
                    confirmButtonText: 'Continuar',
                    confirmButtonColor: '#4fa7f3'
                }
            )
        </script>";
    }

    //se elimina el contenido de session en mensaje
    $_SESSION["error"]="";
}

//verificamos si se va a mostrar un mensaje de aviso al realizar alguna operacion de crud
if(!empty($_SESSION["mensaje"]))
{
    //si session en mensaje es agregar un usuario
    if($_SESSION["mensaje"]=="add")
    {
        //se muestra el sweet alert de agregar un usuario
        echo"<script>
                swal
                (
                {
                    title: 'Registro Exitoso:',
                    text: 'se ha registrado un nuevo alumno en el sistema',
                    type: 'success',
                    confirmButtonText: 'Continuar',
                    confirmButtonColor: '#4fa7f3'
                }
            )
                </script>";
    }
    //si session en mensaje es eliminar un usuario
    elseif ($_SESSION["mensaje"]=="delete")
    {
        //se muestra el sweet alert de eliminar un usuario
        echo"<script>
                swal
                (
                {
                    title: 'Advertencia:',
                    text: 'se ha eliminado un alumno del sistema',
                    type: 'warning',
                    confirmButtonText: 'Continuar',
                    confirmButtonColor: '#4fa7f3'
                }
            )
                </script>";

    }
    //si session en mensaje es editar un usuario
    elseif ($_SESSION["mensaje"]=="edit")
    {
        //se muestra elsweet alert de editar un usuario
        echo"<script>
                swal
                (
                {
                    title: 'Editado Exitoso',
                    text: 'se ha editado la informacion de un alumno',
                    type: 'success',
                    confirmButtonText: 'Continuar',
                    confirmButtonColor: '#4fa7f3'
                }
            )
                </script>";

    }
    //se elimina el contenido de session en mensaje
    $_SESSION["mensaje"]="";
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="m-t-0 header-title">Students</h4>
            <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add new</button>
                <div class="table-responsive m-b-20">
                <table id="example1" class="table">
                <thead>
                <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Group</th>
                <th>Career</th>
                <th>Options</th>
                </tr>
                </thead>
                <tbody>
                <?php
                //creamos un objeto de mvcUsuario
                $list = new mvcAlumno();

        //se manda a llamar el control para enlistar a los usuarios
        $list -> listadoAlumnoController();
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- end container -->

<?php
        //incluimos el archivo con el modal para agregar, editar y eliminar estudiantes
        include_once "views/students/add.php";
        include_once "views/students/edit.php";
        include_once "views/students/delete.php";
?>
