@extends('layouts.master')

@section('content')
    <h1>{{ $post->title }}</h1>

    {{--http://carbon.nesbot.com/docs/#api-formatting--}}
    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>

    {{ $post->body }}
@endsection