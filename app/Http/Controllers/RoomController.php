<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function getRoom()
    {
        $post = Post::orderBy('created_at', 'desc') -> get();
        return view('room.room', compact('post'));
    }

    public function postPost(Request $req)
    {
        $post = new Post([
            'text' => $req -> input('text'),
        ]);

        Auth::guard('web') -> user() -> post() -> save($post);

        $post = Post::orderBy('created_at', 'desc') -> get();

        return view('room.addPost', compact('post'));
    }

    public function postEditPost(Request $req)
    {
        $post = Post::find($req -> input('post_id'));

        $post -> text = $req -> input('text');

        $post -> update();

        return response() -> json($post -> text);
    }

    public function getDeletePost(Request $req)
    {
        Post::where('id', $req -> input('id')) -> delete();
    }

    public function postComment(Request $req)
    {
        $comment = new Comment([
            'post_id' => $req -> input('post_id'),
            'text' => $req -> input('text'),
        ]);

        $comment = Auth::guard('web') -> user() -> comment() -> save($comment);

        return view('room.addComment', compact('comment')) -> render();
    }

    public function postEditComment(Request $req)
    {
        $comment = Comment::find($req -> input('id'));

        $comment -> text = $req -> input('text');

        $comment -> update();

        return response() -> json($comment -> text);
    }

    public function getDeleteComment(Request $req)
    {
        Comment::where('id', $req -> input('id')) -> delete();
    }
}
