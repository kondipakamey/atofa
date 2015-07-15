<?php

namespace App\Http\Controllers;

use App\Gestion\PhotoGestion;
use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;
use App\City;
use App\Category;


class PostController extends Controller
{

    protected $postRepository;

    protected $nbrPerPage = 4;

    public function __construct(PostRepository $postRepository)
	{
		//$this->middleware('auth', ['except' => 'index']);
		$this->middleware('auth');
		$this->middleware('admin', ['only' => 'destroy']);

		$this->postRepository = $postRepository;
	}

	public function index()
	{
		
		$posts = $this->postRepository->getPaginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $posts->render());

		return view('posts.liste', compact('posts', 'links'));
	}

	public function create()
	{
		$cities = City::all();
		$categories = Category::all();
		return view('posts.add', compact('cities', 'categories'));
	}
	
	public function show($id)
    {
        $post = $this->postRepository->getById($id);
		
		return view('posts.show', compact('post'));
    }

	public function store(PostRequest $request, PhotoGestion $photoGestion)
	{
		
		
		if($photoGestion->save($request->file('photo')))
		{
			$input = $request->all();
			$input['photo'] = $photoGestion->getPictureLink();
			$input['prix'] = $input['prix'].'$';
			$inputs = array_merge($input, ['user_id' => $request->user()->id]);
			
		
				/*return 'Le formulaire est bien rempli avec : 
						nom = '.$inputs['user_id'].'
						type = '.$inputs['type'].'
						postPicture = '.$inputs['photo'].'
						photo = '.$photoGestion->getPictureLink().'
						etat = '.$inputs['etat']; */
			
			$posts = $this->postRepository->store($inputs);
			
			
			//$posts['photo'] = $photoGestion->getPictureLink();
			
			return redirect(route('post.index'));
			
		}
		
		
		
		//$inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

		
		//$this->postRepository->store($inputs);

		//return redirect(route('post.index'));
	}

	public function destroy($id)
	{
		$this->postRepository->destroy($id);

		return redirect()->back();
	}

}