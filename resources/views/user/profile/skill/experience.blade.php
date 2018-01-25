<div class="modal fade" id="add-experience" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1> Add other experience</h1>
            </div>
            <div class="modal-body">
                <div class="addother">
                    <form class="form-group" method="post" action="/user/add-skill">
                        <label for="title">Subject</label>
                        <input type="text" class="form-control" name="skill" required>
                        <label for="overview">Description</label>
                        <textarea class="form-control" name="overview" required></textarea>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-publish" value="Save">
                            <button type="submit" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>