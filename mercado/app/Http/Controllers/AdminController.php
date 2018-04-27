<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('permission:users.admin');
    }

    public function index()
    {

        $posts = Post::orderBy('created_at','desc')->paginate(2);
        return view('admin.index')->with('posts', $posts);
    }

    public function edit($id)
    {

        $post =  Post::find($id);

        return view('admin.edit')->with('post', $post);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        return redirect('/admin')->with('success','Post Removed');

    }
}
