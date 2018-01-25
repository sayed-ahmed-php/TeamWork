<div class="modal fade" id="add-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1> Add project</h1>
            </div>
            <div class="modal-body">
                <div class="add-project">
                    <form class="form-group" method="post" action="/company/add-portfolio" enctype="multipart/form-data">
                        <label for="title">Project title</label>
                        <input type="text" class="form-control" name="title" required>
                        <label for="title">select category</label>
                        <select class="form-control" name="category">
                            @foreach($cat as $cat)
                                <option>{{$cat['name']}}</option>
                            @endforeach
                        </select>
                        <label for="overview">Project Description</label>
                        <textarea class="form-control" name="description" required></textarea>
                        <label for="url">Project url </label>
                        <input type="text" class="form-control" placeholder="optional" name="url" required>
                        <label for="url">Project thumbnail </label>
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