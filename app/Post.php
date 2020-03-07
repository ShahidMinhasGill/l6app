<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\UserProfile;
class Post extends Model
{
 protected $guarded = [];

 function user()
 {
 	return $this->belongsTo(User::class, 'user_id','id');
 }
 public function profile()
 {
 	return $this->hasOneThrough(UserProfile::class, User::class, 'id',
     'user_id','user_id','id');
 }
  public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_posts','post_id',
            'category_id','id','id');
    }
 public function setSlugAttribute($val)
 {
 	$slug = trim(preg_replace("/[^\w\d]+/i", "-", $val), "-");
 	$count = Post::where('slug','like', "%${slug}%")->count();
 	if ($count>0)
 		 	$slug = $slug."-".($count++);
 	$this->attributes['slug'] = strtolower($slug);

 }

 public function getSlugAttribute($val)
 {
 	if ($val == null) {
 		return $this->id;
 	}
 	return $val;
 }


}
