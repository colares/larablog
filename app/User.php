<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post)
    {
        // Save, então eu estou salvando um objeto já criado
        // E o user id (this) é setado automaticamente, porque a relação
        // está descrita aqui (em User)
        $this->posts()->save($post);

        // Se eu escolhesse create, então deveria informar os dados
        // $this->posts()->create([]);
    }

}
