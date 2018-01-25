<div class="comment {{$comment->id}}" data-commentid="{{$comment->id}}">
    @if(empty($comment -> user -> image))
        <img src="{{URL::asset('src/images/user.png')}}" width="80px" class="img-responsive" alt="profile">
    @else
        <img src="{{URL::asset($comment -> user -> image)}}" width="80px" class="img-responsive" alt="profile">
    @endif
    @if(Auth::guard('web') -> user() == $comment -> user)
        <h4><a href="/user/profile">{{$comment -> user -> fname.' '.$comment -> user -> lname}}</a></h4>
    @else
        <h4><a href="/user-profile/{{$comment -> user -> id}}">{{$comment -> user -> fname.' '.$comment -> user -> lname}}</a></h4>
    @endif
    <div class="in">
        Commented on {{ $comment['created_at'] }}
    </div><br>
    <p>{{$comment['text']}}</p>
    <div class="interaction">
        @if(Auth::guard('web') -> user() == $comment -> user)
            <a href="" class="edit-com">Edit</a> |
            <a href="" class="delete-com">Delete</a>
        @endif
    </div>
    @include('room.editPost')
</div>
