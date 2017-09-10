<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

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

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public function addComment($body) {
        $this->comments()->create(compact('body'));
    }
}
