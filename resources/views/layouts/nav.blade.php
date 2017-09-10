<div class="blog-masthead">
    <div class="container">
    <nav class="nav">
        <a class="nav-link active" href="/">Home</a>
        @if (auth()->check())
            <a class="nav-link" href="/posts/create">New post</a>
        @endif
        @if (! auth()->check())
            <a class="nav-link" href="/register">Register</a>
        @endif

        @if (! auth()->check())
            <a class="nav-link ml-auto" href="/login">Login</a>
        @endif
        @if (auth()->check())
            <a class="nav-link ml-auto" href="/logout">Logout {{ auth()->user()->name  }}</a>
        @endif
    </nav>
    </div>
</div>