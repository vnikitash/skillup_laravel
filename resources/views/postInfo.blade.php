@extends('layouts.app')

@section('content')
<div class="container">
    Post ID: {{$post->id}}
    <form action="/posts/{{$post->id}}" class="form-group" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{$post->title}}" class="form-control"/>
        <label for="descrption">Description</label>
        <textarea id="descrption" name="description" class="form-control">{{$post->description}}</textarea>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>

    <form action="/posts/{{$post->id}}" class="form-group" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
        <input type="submit" class="btn btn-danger" value="DELETE">
    </form>
</div>
@endsection
