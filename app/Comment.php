<?php

namespace App;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Então, para pegar o nome do criador do comentário,
    // poderei usar essa syntaxe:
    // $comment->user->name
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}