<div class="modal fade" id="add-cert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1> Add Certification</h1>
            </div>
            <div class="modal-body">
                <div class="addnew-cert">
                    <form class="form-group" method="post" action="/user/add-certification" enctype="multipart/form-data">
                        <label for="title">Certification Category</label>
                        <input type="text" class="form-control" name="category" required>
                        <label for="overview">Description</label>
                        <textarea class="form-control" name="overview" required></textarea>
                        <label for="url">Certification image </label>
                        <input type="file"  class="form-control" accept="image/*" name="image" required>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-publish" value="Publish">
                            <button type="submit" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>