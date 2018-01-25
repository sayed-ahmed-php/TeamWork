<div class="modal fade" id="edit-cat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Edit Your Field</h3>
            </div>
            <div class="modal-body">
                <form class="form-group" method="post">
                    <br>
                    <select class="form-control" name="category" id="cat-update">
                        <option selected hidden>Choose Category ..</option>
                        @foreach($cat as $cat)
                            <option>{{$cat['name']}}</option>
                        @endforeach
                    </select>
                    <br>
                    <select class="form-control" name="skill" id="skill-update" required></select>
                    <br>
                    <div class="modal-footer row">
                        <input type="submit" class="btn btn-publish" id="save-category" value="Update">
                        <button type="submit" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
</div>