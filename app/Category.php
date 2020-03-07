<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guard=[];
    public function children()
    {
    	return $this->hasMany(Category::class, 'parent_id','id');
    }
    public function parent()
    {
    	return $this->blongsTo(Category::class, 'parent_id','id');
    }
}
