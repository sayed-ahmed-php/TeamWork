<div class="modal fade" id="edit-img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Edit profile Img</h3>
            </div>
            <div class="modal-body">
                <form class="form-group" method="post" action="/user/image" enctype="multipart/form-data">
                    <input type="file" class="from-control" name="image" accept="image/*" required><br>
                    <div class="modal-footer row">
                        <input type="submit" class="btn btn-publish" value="Save">
                        <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
</div>