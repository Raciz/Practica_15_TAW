<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h4 class="m-t-0 header-title">Careers</h4>
      <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add new</button>
      <div class="table-responsive m-b-20">
        <table id="datatable" class="table">
          <thead>
            <tr class="fondoTabla">
              <th>ID</th>
              <th>Name</th>
              <th>Username</th>
              <th>e-mail</th>
              <th>Type</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <tr class="fondoTabla">
              <td><?php echo "0" ?></td>
              <td><?php echo "Martha Patricia Carranza ..." ?></td>
              <td><?php echo "Miss Paty" ?></td>
              <td><?php echo "mcarranza@upv.edu.mx" ?></td>
              <td><?php echo "Administrator" ?></td>
              <td>
                <button class="btn btn-rounded btn-custom" data-toggle="modal" data-target="#editar-modal">Edit</button>
                <button class="btn btn-rounded btn-danger" id="eliminar">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- end container -->

<?php
    //incluimos el archivo con el modal para agregar, editar y eliminar usuarios
    include_once "views/users/add.php";
    include_once "views/users/edit.php";
    #include_once "views/users/delete.php";
?>




