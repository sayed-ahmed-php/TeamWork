<div class="content-user">
    <i class="fa fa-users"></i> Skill</h3>
    <div class="row">
        <section class="panel">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                    <th><i class="icon_id-2"></i>  ID</th>
                    <th><i class="icon_profile"></i> User ID</th>
                    <th><i class="icon_book_alt"></i>  Skill</th>
                    <th><i class="icon_book_alt"></i>  Overview</th>
                    <th><i class="icon_cog"></i>  Action</th>
                </tr>
                @foreach($skill as $skill)
                    <tr>
                        <td class="id">{{$skill['id']}}</td>
                        <td>{{$skill['user_id']}}</td>
                        <td>{{$skill['skill']}}</td>
                        <td>{{$skill['overview']}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="/dashboard/delete-user-skill/{{$skill['id']}}">
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