<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

?>
<div class="container">
    <!--Contenido de la vista-->

    <?php
        //creamos un objeto de mvcController
        $ct = new mvcController();
  
        //obtenemos la informacion de distintas partes del sistema
        $uno  = $ct -> dash("usuario");
        $dos  = $ct -> dash("grupo");
        $tres  = $ct -> dash("alumno");
        $cuatro  = $ct -> dash("actividad");
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box widget-inline">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-inline-box text-center">
                            <h3 class="m-t-10"><i class="text-primary mdi mdi-emoticon"></i> <b data-plugin="counterup"><?php echo $uno; ?></b></h3>
                            <p class="text-white">Total users</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-inline-box text-center">
                            <h3 class="m-t-10"><i class="text-custom mdi mdi-emoticon"></i> <b data-plugin="counterup"><?php echo $tres; ?></b></h3>
                            <p class="text-white">Total students</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-inline-box text-center">
                            <h3 class="m-t-10"><i class="text-info mdi mdi-emoticon"></i> <b data-plugin="counterup"><?php echo $dos; ?></b></h3>
                            <p class="text-white">Total groups</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-inline-box text-center b-0">
                            <h3 class="m-t-10"><i class="text-danger mdi mdi-emoticon"></i> <b data-plugin="counterup"><?php echo $cuatro; ?></b></h3>
                            <p class="text-white">Total activities</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end row -->
</div>
<!-- end container -->
