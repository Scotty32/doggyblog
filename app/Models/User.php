<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    /**
     * relation with all model which required it
     */

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function messageAdmins()
    {
        return $this->hasMany(MessageAdmin::class);
    }

    
    public function messageChats()
    {
        return $this->hasMany(MessageChat::class);
    }

    public function dogs()
    {
        return $this->hasMany(Dog::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * get a user default image
     */

         
    public function userDefault()
    {

        return (object)['name' =>'Anonymious', 'id' => 0];
    }
}
