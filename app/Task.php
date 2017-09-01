<?php

namespace App;

class Task extends Model
{
    public static function complete() {
        return static::where('completed', 0)->get();
    }

    public function scopeIncomplete($query) {
        return $query->where('completed', 0);
    }

}