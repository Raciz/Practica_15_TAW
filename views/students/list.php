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
                    text: 'Only images in JPG or PNG format are allowed',
                    type: 'error',
                    confirmButtonText: 'Continue',
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
                    text: 'It is not allowed to upload images larger than 5 MB',
                    type: 'error',
                    confirmButtonText: 'Continue',
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
                    text: 'the image could not be uploaded to the system',
                    type: 'error',
                    confirmButtonText: 'Continue',
                    confirmButtonColor: '#4fa7f3'
                }
            )
        </script>";
    }

    //se elimina el contenido de session en error
    $_SESSION["error"]="";
}

//verificamos si se va a mostrar un mensaje de aviso al realizar alguna operacion de crud
if(!empty($_SESSION["mensaje"]))
{
    //si session en mensaje es agregar un alumno
    if($_SESSION["mensaje"]=="add")
    {
        //se muestra el sweet alert de agregar un alumno
        echo"<script>
                swal
                (
                {
                    title: 'Successful registration:',
                    text: 'a new student has been registered in the system',
                    type: 'success',
                    confirmButtonText: 'Continue',
                    confirmButtonColor: '#4fa7f3'
                }
            )
                </script>";
    }
    //si session en mensaje es eliminar un alumno
    elseif ($_SESSION["mensaje"]=="delete")
    {
        //se muestra el sweet alert de eliminar un alumno
        echo"<script>
                swal
                (
                {
                    title: 'Warning:',
                    text: 'a student has been removed from the system',
                    type: 'warning',
                    confirmButtonText: 'Continue',
                    confirmButtonColor: '#4fa7f3'
                }
            )
                </script>";

    }
    //si session en mensaje es editar un alumno
    elseif ($_SESSION["mensaje"]=="edit")
    {
        //se muestra elsweet alert de editar un alumno
        echo"<script>
                swal
                (
                {
                    title: 'Successful Edited',
                    text: 'the student's information has been edited',
                    type: 'success',
                    confirmButtonText: 'Continue',
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
                  <!--tabla para mostrar a los alumnos registrados en el sistema-->
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
