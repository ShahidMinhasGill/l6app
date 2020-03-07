<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Response;
use App\UserProfile;
use App\Post;
use App\Role;
use App\Country;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name','username', 'email', 'password',
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
    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }
    // public function posts()
    // {
    //     return $this->hasMany(Post::class,'user_id','id');
    // }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user','user_id',
            'role_id');
    }
     public function setSlugAttribute($username)
 {
    $username = trim(preg_replace("/[^\w\d]+/i", "-", $username), "-");
    $count = User::where('username','like', "%${username}%")->count();
    if ($count>0)
            $username = $username."-".($count++);
    $this->attributes['username'] = strtolower($username);

 }

}
