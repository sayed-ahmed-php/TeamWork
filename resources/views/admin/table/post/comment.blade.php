<div class="content-comment">
    <section class="panel">
        <table class="table table-striped table-advance table-hover">
            <tbody>
            <tr>
                <th><i class="icon_id-2"></i>  ID</th>
                <th><i class="icon_profile"></i> User ID</th>
                <th><i class="icon_mail"></i>  Post ID</th>
                <th><i class="icon_mail"></i>  Post ID</th>
                <th><i class="icon_cog"></i>  Text</th>
                <th><i class="icon_cog"></i>  Create at</th>
            </tr>
            @foreach($comment as $comment)
                <tr>
                    <td class="id">{{$comment['id']}}</td>
                    <td>{{$comment['user_id']}}</td>
                    <td>{{$comment['post_id']}}</td>
                    <td>{{$comment['text']}}</td>
                    <td>{{$comment['created_at']}}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-danger" href="/dashboard/delete-comment/{{$comment['id']}}">
                                <i class="icon_close_alt2"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</div>