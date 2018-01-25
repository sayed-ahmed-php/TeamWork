<div class="content-user">
    <i class="fa fa-users"></i> Certification</h3>
    <div class="row">
        <section class="panel">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                    <th><i class="icon_id-2"></i>  ID</th>
                    <th><i class="icon_profile"></i> User ID</th>
                    <th><i class="icon_phone"></i>  Image</th>
                    <th><i class="icon_cogs"></i>  Description</th>
                    <th><i class="icon_book_alt"></i>  Category</th>
                    <th><i class="icon_cog"></i>  Action</th>
                </tr>
                @foreach($cert as $cert)
                    <tr>
                        <td class="id">{{$cert['id']}}</td>
                        <td>{{$cert['user_id']}}</td>
                        <td><img src="{{URL::asset($cert['image'])}}" width="30px" class="img-responsive"></td>
                        <td>{{$cert['description']}}</td>
                        <td>{{$cert['category']}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="/dashboard/delete-user-cert/{{$cert['id']}}">
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