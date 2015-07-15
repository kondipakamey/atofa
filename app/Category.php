<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	
    protected $fillable = ['name','description'];

	public $timestamps = true;
	
	public function posts(){
		return $this->hasMany('App\Post');
	}
}
