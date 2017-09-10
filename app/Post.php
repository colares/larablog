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

    public static function archives() {
//        static or self?
//            https://stackoverflow.com/questions/5197300/new-self-vs-new-static#5197655
//            self refers to the same class in which the new keyword is actually written.
//            static, in PHP 5.3's late static bindings, refers to whatever class in the hierarchy you called the method on.
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('year, month DESC')
            ->get()
            ->toArray();
    }
}
