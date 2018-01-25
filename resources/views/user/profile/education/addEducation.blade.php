<div class="modal fade" id="add-education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1> Add project</h1>
            </div>
            <div class="modal-body">
                <div class="school">
                    <form class="form-group" method="post" action="/user/add-education">
                        <label for="title">school</label>
                        <input type="text" class="form-control" name="school" required>
                        <label for="overview">Degree</label>
                        <input type="text" class="form-control" name="degree">
                        <label for="overview">Start at</label>
                        <input type="date" class="form-control" name="from" required>
                        <label  for="overview">End at</label>
                        <input type="date" class="form-control" name="to" required>
                        <div class="modal-footer row">
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