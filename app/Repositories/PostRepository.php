<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{

    protected $post;

    public function __construct(Post $post)
	{
		$this->post = $post;
	}

	public function getPaginate($n)
	{
		return $this->post->with('user')
		->orderBy('posts.created_at', 'desc')
		->paginate($n);
	}

	public function getById($id)
    {
        return $this->post->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->getById($id)->fill($inputs)->save();
    }
	
	public function store($inputs)
	{
		$this->post->create($inputs);
	}

	public function destroy($id)
	{
		$this->post->findOrFail($id)->delete();
	}

}