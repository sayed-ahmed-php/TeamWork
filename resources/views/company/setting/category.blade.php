<div class="modal fade" id="edit-com" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Edit Your Field</h3>
            </div>
            <div class="modal-body">
                <form class="form-group" method="post">
                    <select class="form-control" name="category" id="cat-update">
                        @foreach($cat as $cat)
                            <option>{{$cat['name']}}</option>
                        @endforeach
                    </select><br>
                    <div class="modal-footer row">
                        <button id="com-save-up" class="btn btn-publish">Save</button>
                        <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
</div>