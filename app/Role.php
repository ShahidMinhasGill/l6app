<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Role extends Model
{
	 protected $guarded = [];
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user','user_id',
        	'role_id','id','id');
    }
}
