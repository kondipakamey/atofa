<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['city','state','country'];

	public $timestamps = true;
	
	public function users() 
	{
		return $this->hasMany('App\User');
	}
	
}
