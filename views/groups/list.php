<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h4 class="m-t-0 header-title">Groups</h4>
      <button class="btn btn-rounded btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#agregar-modal">Add new</button>
      <div class="table-responsive m-b-20">
        <table id="datatable" class="table">
          <thead>
            <tr class="fondoTabla">
              <th>ID</th>
              <th>Level</th>
              <th>Teacher</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <tr class="fondoTabla">
              <td><?php echo "ING-09" ?></td>
              <td><?php echo "9" ?></td>
              <td><?php echo "Miss Paty" ?></td>
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


<!-- Modal para agregar una nueva carrera -->
<div id="agregar-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add a new group</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">ID</label>
                            <input type="text" class="form-control" id="field-3" placeholder="Address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Level</label>
                            <input type="text" class="form-control" id="field-3" placeholder="Address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Teacher</label>
                            <input type="text" class="form-control" id="field-3" placeholder="Address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-custom waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->


<!-- Modal para editar un grupo -->
<div id="editar-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit group</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Level</label>
                            <input type="text" class="form-control" id="field-3" placeholder="Address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Teacher</label>
                            <input type="text" class="form-control" id="field-3" placeholder="Address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-custom waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
