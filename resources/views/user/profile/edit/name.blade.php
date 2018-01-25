<div class="modal fade" id="EditName" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Edit Name</h1>
            </div>
            <div class="modal-body">
                <div class="editName">
                    <form class="form-group" method="post" action="/user/name">
                        <input type="text" class="form-control" placeholder="First Name" name="fname" pattern="[a-zA-Z]{3,10}}"
                               title="Must contain alpha only and length between 3:10 letters." required><br>
                        <input type="text" class="form-control" placeholder="Last Name" name="lname" pattern="[a-zA-Z]{3,10}}"
                               title="Must contain alpha only and length between 3:10 letters." required><br>
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
</div>