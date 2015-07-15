<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table = 'cities';
	
    protected $fillable = ['city','state','country'];

	public $timestamps = true;
	
	public function users() 
	{
		return $this->hasMany('App\User');
	}
	
	public function posts(){
		return $this->hasMany('App\Post');
	}
	
}
