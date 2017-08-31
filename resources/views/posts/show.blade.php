@extends('layouts.master')

@section('content')
    <h1>{{ $post->title }}</h1>

    {{--http://carbon.nesbot.com/docs/#api-formatting--}}
    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>

    {{ $post->body }}
    <hr>
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{ $comment->created_at->diffForHumans() }}
                    </strong>
                    <article>
                        {{ $comment->body }}
                    </article>
                </li>
            @endforeach
        </ul>
    </div>

    <hr>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="/posts/{{ $post->id }}/comments">
                <div class="form-group">
                    <textarea name="body" id="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection