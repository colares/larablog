@extends('layouts.master')

@section('content')
    <h1>Create a post</h1>
    <form method="POST" action="/posts">
        {{ csrf_field() }}
        @include('layouts.errors')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="titleHelp" name="title">
            <small id="titleHelp" class="form-text text-muted">Seja objetivo</small>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" rows="3" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection