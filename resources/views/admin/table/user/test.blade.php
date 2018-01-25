<div class="content-user">
    <i class="fa fa-users"></i> Test</h3>
    <div class="row">
        <section class="panel">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                    <th><i class="icon_id-2"></i>  ID</th>
                    <th><i class="icon_profile"></i> User ID</th>
                    <th><i class="icon_book_alt"></i>  Name</th>
                    <th><i class="icon_book_alt"></i>  Category</th>
                    <th><i class="icon_book_alt"></i>  Time</th>
                    <th><i class="icon_book_alt"></i>  Degree</th>
                    <th><i class="icon_cog"></i>  Action</th>
                </tr>
                @foreach($test as $test)
                    <tr>
                        <td class="id">{{$test['id']}}</td>
                        <td>{{$test['user_id']}}</td>
                        <td>{{$test['name']}}</td>
                        <td>{{$test['category']}}</td>
                        <td>{{$test['time']}}</td>
                        <td>{{$test['degree']}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger" href="/dashboard/delete-user-test/{{$test['id']}}">
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