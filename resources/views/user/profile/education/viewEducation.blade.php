<div class="modal fade" id="edit-education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1> Edit Education</h1>
            </div>
            <div class="modal-body">
                <div class="school">
                    <form class="form-group" method="post" enctype="multipart/form-data" action="/user/update-education/{{$education['id']}}">
                        <label for="title">school</label>
                        <input type="text" class="form-control" name="school" value="{{$education['school']}}" required>
                        <label for="overview">Degree</label>
                        <input type="text" class="form-control" name="degree" value="{{$education['degree']}}" >
                        <label for="overview">Start at</label>
                        <input type="date" class="form-control" name="from" value="{{$education['start']}}" required>
                        <label  for="overview">End at</label>
                        <input type="date" class="form-control" name="to" value="{{$education['end']}}" required>
                        <div class="modal-footer row">
                            <input type="submit" class="btn btn-publish" value="Update">
                            <a type="submit" class="btn btn-publish" href="/user/delete-education/{{$education['id']}}">Delete</a>
                            <button type="submit" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>