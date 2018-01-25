<div class="modal fade" id="edit-skill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1> Add skills </h1>
            </div>
            <div class="modal-body">
                <div class="addother">
                    <form class="form-group" method="post" enctype="multipart/form-data" action="/user/update-skill/{{$skill['id']}}">
                        <label for="title">Subject</label>
                        <input type="text" class="form-control" name="skill" value="{{$skill['skill']}}" required>
                        <label for="overview">Description</label>
                        <textarea class="form-control" name="overview" required>{{$skill['overview']}}</textarea>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-publish" value="Update">
                            <a type="submit" class="btn btn-publish" href="/user/delete-skill/{{$skill['id']}}">Delete</a>
                            <button type="submit" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>