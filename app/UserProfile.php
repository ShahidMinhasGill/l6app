<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use App\User;

class UserProfile extends Model
{
   protected $fillable = ['user_id','city','country_id','photo','phone',]; 
   public function user()
   {
   	return $this->belongsTo(User::class,'user_id','id');
   }  

    public function country()
   {
   	return $this->belongsTo(Country::class,'country_id','id');
   }
}
