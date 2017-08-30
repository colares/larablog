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

@endsection