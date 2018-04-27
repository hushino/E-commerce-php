@extends('layouts.app')
@section('content')
<h1>admin</h1>
@if(count($posts) > 0)
    @foreach($posts->reverse() as $post)
        <div class="well">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Publish at {{$post->created_at}} by {{$post->user->name}}</small>
        </div>
        <div>
            <a href="/admin/{{$post->id}}/edit" class="btn btn-info">Edit</a>
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete',['class'=> 'btn btn-danger'])}}
            {!!Form::close()!!}
        </div>
    @endforeach
    {{ $posts->links() }}
@else
    <p>No posts found</p>
@endif
@endsection