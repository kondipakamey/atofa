<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
	
	protected $fillable = ['titre','etat','type', 'prix', 'description', 'photo', 'user_id', 'city_id', 'category_id'];

	public $timestamps = true;
	
	public function city() 
	{
		return $this->belongsTo('App\City');
	}
	
	public function user() 
	{
		return $this->belongsTo('App\User');
	}
	
	public function category() 
	{
		return $this->belongsTo('App\Category');
	}
}
