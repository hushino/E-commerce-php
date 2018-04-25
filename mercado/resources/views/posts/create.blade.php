@extends('layouts.app')

@section('content')

    <h1>CreatePosts</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title','', ['class' => 'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body','', ['id' => 'editor1' ,'class' => 'form-control','placeholder'=>'Body-Text'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}



    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

@endsection
