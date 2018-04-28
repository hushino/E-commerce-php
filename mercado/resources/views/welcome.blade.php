@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>

    </div>
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Publish at {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No posts found</p>
    @endif
@endsection

