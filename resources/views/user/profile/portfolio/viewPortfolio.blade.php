<div class="modal fade" id="view-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1> project Name</h1>
            </div>
            <div class="modal-body">
                <div class="add-project">
                    <form class="form-group" method="post" enctype="multipart/form-data" action="/user/update-portfolio/{{$portfolio['id']}}">
                        <label for="title">Project title</label>
                        <input type="text" class="form-control" name="title" value="{{$portfolio['title']}}" required>
                        <label for="title">select category</label>
                        <select class="form-control" name="category">
                            <option>{{$portfolio['category']}}</option>
                            @foreach($cat as $cat)
                                @if(($cat['name'].equalTo($portfolio['category'])))
                                    <option>{{$cat['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="overview">Project Description</label>
                        <textarea class="form-control" name="description" required>{{$portfolio['description']}}</textarea>
                        <label for="url">Project url </label>
                        <input type="text" class="form-control" placeholder="optional" name="url" value="{{$portfolio['url']}}" required>
                        <label for="url">Project thumbnail </label>
                        <input type="file"  class="form-control" accept="image/*" name="image">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-publish" value="Update">
                            <a type="submit" class="btn btn-publish" href="/user/delete-portfolio/{{$portfolio['id']}}">Delete</a>
                            <button type="submit" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

