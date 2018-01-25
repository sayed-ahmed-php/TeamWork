<div class="content-com">
    <i class="fa fa-users"></i> Portfolio</h3>
    <div class="row">
        <section class="panel">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                    <th><i class="icon_id-2"></i>  ID</th>
                    <th><i class="icon_profile"></i> Company ID</th>
                    <th><i class="icon_mail"></i>  Title</th>
                    <th><i class="icon_phone"></i>  Image</th>
                    <th><i class="icon_cogs"></i>  Description</th>
                    <th><i class="icon_book_alt"></i>  Category</th>
                    <th><i class="icon_adjust-vert"></i>  URL</th>
                    <th><i class="icon_cog"></i>  Action</th>
                </tr>
                @foreach($port as $port)
                    <tr>
                        <td class="id">{{$port['id']}}</td>
                        <td>{{$port['company_id']}}</td>
                        <td>{{$port['title']}}</td>
                        <td><img src="{{URL::asset($port['image'])}}" width="30px" class="img-responsive"></td>
                        <td>{{$port['description']}}</td>
                        <td>{{$port['category']}}</td>
                        <td>{{$port['url']}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="/dashboard/delete-company-port/{{$port['id']}}">
                                    <i class="icon_close_alt2"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>