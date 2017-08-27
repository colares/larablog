<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>

    {{--http://carbon.nesbot.com/docs/#api-formatting--}}
    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>

    {{ $post->body }}

</div><!-- /.blog-post -->
