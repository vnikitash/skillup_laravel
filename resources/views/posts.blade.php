@extends('layouts.app')

@section('content')
<div class="container">
    @if ($user)

    <form action="/posts" method="POST" class="form-group">
        @csrf
        <input type="text" name="title" class="form-control" placeholder="Title">
        <textarea name="description" class="form-control" placeholder="Your text"></textarea>
        <button class="btn btn-success">Create</button>
    </form>

    @endif



    <table class="table">
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>User</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Manage</th>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                @if ($user && $user->id === $post->user_id)
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->user->email}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td><a href="posts/{{$post->id}}" class="btn btn-primary">Manage</a></td>
                @else
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->user->email}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td> - </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
