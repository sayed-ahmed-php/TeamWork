<div class="modal fade" id="view-cert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>  Certification name</h1>
            </div>
            <div class="modal-body">
                <div class="addnew-cert">
                    <form class="form-group" method="post" enctype="multipart/form-data" action="/user/update-certification/{{$certification['id']}}">
                        <label for="title">Certification title</label>
                        <input type="text" class="form-control" name="category" value="{{$certification['category']}}" required>
                        <label for="overview">Description</label>
                        <textarea class="form-control" name="overview" required>{{$certification['overview']}}</textarea>
                        <label for="url">Certification image </label>
                        <input type="file"  class="form-control" accept="image/*" name="image">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-publish" value="Update">
                            <a type="submit" class="btn btn-publish" href="/user/delete-certification/{{$certification['id']}}">Delete</a>
                            <button type="submit" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
