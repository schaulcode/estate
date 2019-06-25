<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete conformation</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to delet this Row</p>
      </div>
      <div class="modal-footer">
       <form action="" method="post">
           <input id="hidden-btn" type="hidden" name="delete_id" value="">
           <input id="delete-btn" class="btn btn-danger" type="submit" name="delete" value="Delete">
           <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
       </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
