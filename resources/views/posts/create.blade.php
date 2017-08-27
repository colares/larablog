@extends('layouts.master')

@section('content')
    <h1>Create a post</h1>
    <form method="POST" action="/posts">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="titleHelp">
            <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="body">Password</label>
            <textarea class="form-control" id="body" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection