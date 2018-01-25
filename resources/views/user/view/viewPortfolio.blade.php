<div class="modal fade" id="view-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{$portfolio['title'].' ('.$portfolio['category'].')'}}</h3>
            </div>
            <div class="modal-body">
                <div class="view-project">
                    <form class="form-group">
                        <img src="{{URL::asset($portfolio['image'])}}" class="img-responsive" alt="project-photo">
                        <p>{{$portfolio['description']}}</p>

                        <a href="">{{$portfolio['url']}}</a>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>