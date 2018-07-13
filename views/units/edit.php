<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe mandar a llamar el controller para modificar una unidad
if(isset($_GET["action"]) && $_GET["action"]=="edit")
{
    //creamos un objeto de mvcUnidad
    $edit = new mvcUnidad();

    //se manda a llamar el controller para modificar la informacion de una unidad
    $edit -> modificarUnidadController();
}
?>

<?php
if(!empty($_GET["edit"]))
{
?>
<!-- Modal para modificar una unidad -->
<div id="editar-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block; padding-right: 15px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="index.php?section=units&action=list">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </a>
                <h4 class="modal-title repairtext">Edit unit</h4>
            </div>
            <form method="post" action="index.php?section=units&action=edit" autocomplete="off">
                <div class="modal-body">
                    <?php
                    //creamos un objeto de mvcUnidad
                    $edit = new mvcUnidad();

                    //mandamos a llamar a el controller para obtener la informacion de la unidad
                    $edit -> editarUnidadController();
                    ?>
                </div>
                <div class="modal-footer">
                    <a href="index.php?section=units&action=list">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    </a>
                    <button type="submit" class="btn btn-custom waves-effect waves-light">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->
<?php
}
?>
