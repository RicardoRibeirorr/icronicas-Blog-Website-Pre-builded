<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password','image','description','career',"phone"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function default_image(){
        if($this->image==null) return "/storage/default/default_user.png";
        else return $this->image;
    }

    /**
     * User following relationship
     */
    // Get all users we are following
    public function following()
    {
    return $this->belongsToMany(User::class, 'users_users', 'user_id', 'follow_id')->withTimestamps();
    }
    // This function allows us to get a list of users following us
    public function followers()
    {
    return $this->belongsToMany('App\User', 'users_users', 'follow_id', 'user_id')->withTimestamps();
    }

    public function noted_follower(){
        return User::leftJoin('users_users','users.id','=','users_users.follow_id')->
        selectRaw('users.*, count(users_users.follow_id) AS `count`')->
        groupBy('users.id','users.name','users.description','users.email','users.image','users.phone','users.career','users.email_verified_at','users.password','users.remember_token','users.created_at','users.updated_at')->orderBy('count', 'DESC');
    }

 
}
