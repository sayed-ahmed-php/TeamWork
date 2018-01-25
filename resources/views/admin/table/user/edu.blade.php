<div class="content-user">
    <i class="fa fa-users"></i> Education</h3>
    <div class="row">
        <section class="panel">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                    <th><i class="icon_id-2"></i>  ID</th>
                    <th><i class="icon_profile"></i> User ID</th>
                    <th><i class="icon_phone"></i>  School</th>
                    <th><i class="icon_cogs"></i>  Start</th>
                    <th><i class="icon_book_alt"></i>  End</th>
                    <th><i class="icon_book_alt"></i>  Degree</th>
                    <th><i class="icon_cog"></i>  Action</th>
                </tr>
                @foreach($edu as $edu)
                    <tr>
                        <td class="id">{{$edu['id']}}</td>
                        <td>{{$edu['user_id']}}</td>
                        <td>{{$edu['school']}}</td>
                        <td>{{$edu['start']}}</td>
                        <td>{{$edu['end']}}</td>
                        <td>{{$edu['degree']}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="/dashboard/delete-user-edu/{{$edu['id']}}">
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