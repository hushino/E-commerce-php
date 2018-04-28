<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use  DB;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {

        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->get();
        $posts = Post::orderBy('created_at','desc')->paginate(2);
        //return view('posts.index')->with('posts', $posts);
        return view('welcome')->with('posts', $posts);
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required',
           'body' => 'required',
        ]);
        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('/posts')->with('success','Post Created');
    }


    public function show($id)
    {
        $post =  Post::find($id);
        return view('posts.show')->with('post', $post);
    }


    public function edit($id)
    {
        $post =  Post::find($id);

        // Check for correct user
        if (auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts')->with('success','Post Updated');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if (auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'unauthorized Page');
        }

        $post->delete();
        return redirect('/posts')->with('success','Post Removed');

    }
}
