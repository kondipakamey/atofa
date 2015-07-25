<?php

namespace App\Http\Controllers;
use Auth;
use App\Gestion\PhotoGestion;
use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;
use App\City;
use App\Post;
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
		
		//$posts = $this->postRepository->getPaginate($this->nbrPerPage);
		//$links = str_replace('/?', '?', $posts->render());
		
		
		
		//$user = Auth::user();
		//var_dump($user);
		if(Auth::check() and Auth::user()->admin){
			return redirect(route('user.index'));
		}
		
		if(Auth::check() and Auth::user()->paid){
			$user = Auth::user();
			$posts = Post::where('user_id', '=', $user->id)->paginate(4);
			$links = str_replace('/?', '?', $posts->render());
			return view('posts.liste', compact('posts', 'links'));
		}else{
			return view('manager.users.manager_paid');
		}
		return view('index');
		
	}
	
	public function showPostList($user)
    {
		
		$posts = $this->postRepository->getPaginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $posts->render());
		return view('posts.userPostsList',  compact('posts', 'user'));
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
	
	public function edit($id)
    {
		$cities = City::all();
		$categories = Category::all();
		
        $post = $this->postRepository->getById($id);
		
		
		
		return view('posts.edit',  compact('post', 'cities', 'categories'));
    }
	
	
	public function update(PostRequest $request, $id, PhotoGestion $photoGestion)
    {
		
		if($photoGestion->save($request->file('photo')))
		{
			$post = $request->all();
			$post['photo'] = $photoGestion->getPictureLink();
			$this->postRepository->update($id, $post);	
		}
		
		return redirect('post')->withOk("L'annonce " . $request->input('titre') . " a été modifié.");
    }
	

	public function store(PostRequest $request, PhotoGestion $photoGestion)
	{
		
		
		if($photoGestion->save($request->file('photo')))
		{
			$input = $request->all();
			$input['photo'] = $photoGestion->getPictureLink();

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