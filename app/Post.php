<?php

namespace App;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    // Então, para pegar o nome do criador do comentário,
    // poderei usar essa syntaxe:
    // $post->user->name
    // $comment->post->user->name
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body) {
        $this->comments()->create(compact('body'));
    }
}
