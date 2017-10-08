@extends('layouts.master')

@section('content')
    <h1>{{ $post->title }}</h1>

    @if (count($post->tags))
        @foreach($post->tags as $tag)
            <span class="badge badge-light"><a href="/posts/tags/{{$tag->name}}">{{$tag->name}}</a></span>
        @endforeach
    @endif

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
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" id="" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    </div>
                </div>
                @include('layouts.errors')
            </form>
        </div>
    </div>

@endsection