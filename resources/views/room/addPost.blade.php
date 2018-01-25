<div class="rep">
    @foreach($post as $post)
        <div class="post {{ $post->id.'post'}}" data-postid="{{ $post->id }}">
            @if(empty($post -> user -> image))
                <img src="{{URL::asset('src/images/user.png')}}" width="80px" class="img-responsive" alt="profile">
            @else
                <img src="{{URL::asset($post -> user -> image)}}" width="80px" class="img-responsive" alt="profile">
            @endif
            @if(Auth::guard('web') -> user() == $post -> user)
                <h4><a href="/user/profile">{{$post -> user -> fname.' '.$post -> user -> lname}}</a></h4>
            @else
                <h4><a href="/user-profile/{{$post -> user -> id}}">{{$post -> user -> fname.' '.$post -> user -> lname}}</a></h4>
            @endif
            <div class="in">
                Posted on {{ $post['created_at'] }}
            </div><br>
            <p class="question">{{$post['text']}}</p>
            <div class="interaction">
                @if(Auth::guard('web') -> user() == $post -> user)
                    <a href="" class="edit">Edit</a> |
                    <a href="" class="delete">Delete</a>
                @endif
            </div>
            <hr>
            <script type="@php($comment = $post -> comment)"></script>
            <div class="{{ $post->id }}">
                @foreach($comment as $comment)
                    @include('room.addComment')
                @endforeach
            </div>
            <form method="post" class="t-comment"  data-postid="{{$post->id}}">
                <input type="text" placeholder="write a comment.." name="text" class="{{ $post->id.'sa' }}" required>
                <input type="submit" class="hidden add-comment">
                {{csrf_field()}}
            </form>
        </div>
    @endforeach
</div>