<?php

namespace App\Http\Controllers;
use Input;
use Auth;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Gestion\PhotoGestion;
use App\Repositories\UserRepository;
use App\Repositories\PostRepository;
use App\City;
use App\Post;
use Illuminate\Http\Request;


class UserController extends Controller
{
	
	protected $userRepository;
	protected $nbrPerPage = 4;
	
	public function __construct(UserRepository $userRepository)
    {
		$this->middleware('auth');
		$this->middleware('admin', ['only' => 'destroy']);
        $this->userRepository = $userRepository;
    }
	
	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $users->render());
		return view('manager.users.index', compact('users', 'links'));
    }
	
	public function showBoutiquePosts($user_id)
	{
		$user = $this->userRepository->getById($user_id);
		
		$posts = Post::where('user_id', '=', $user_id)->paginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $posts->render());
		return view('manager.users.userPostList', compact('posts', 'user', 'links'));
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$cities = City::all();
		
		
        return view ('manager.users.create',  compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserCreateRequest $request, PhotoGestion $photoGestion)
    {
	
		
		if($photoGestion->save($request->file('shopPicture')))
		{
			$input = $request->all();
			$input['shopPicture'] = $photoGestion->getPictureLink();
		  
		
				/*return 'Le formulaire est bien rempli avec : 
						nom = '.$input->input('name').'
						email = '.$input->input('email').'
						shopPicture = '.$input['shopPicture'].'
						photo = '.$photoGestion->getPictureLink().'
						tel = '.$input->input('phone'); */
			
			$user = $this->userRepository->store($input);
			$user['shopPicture'] = $photoGestion->getPictureLink();
			return redirect('user')->withOk("L'utilisateur " . $user->name . " a été créé.");
			
			
		}
		
		
        /*$user = $this->userRepository->store($request->all());
		return redirect('user')->withOk("L'utilisateur " . $user->name . " a été créé.");*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);
		$city = City::find($user->city_id);
		return view('manager.users.show',  compact('user', 'city'));
    }
	
	public function paid()
    {
		return view('manager.users.manager_paid');
    }
	
	public function payment()
    {
		$user = Auth::user();
		print_r(Input::all());
		echo '<hr/>';
		
		\Stripe\Stripe::setApiKey(\Config::get('stripe.secret_key'));
		
		$token = Input::get('stripeToken');
		$amount = Input::get('amount');
		
		try{
			$charge = \Stripe\Charge::create(array(
				"amount" => $amount,
				"currency" => "cad",
				"card" => $token,
				"description" => $user->email)
			);	
		} catch(Strip_CardError $e){
			dd($e);
		}
		
		$this->updateUserPaid($user, $charge['id']);
		return view('manager.users.showProfil',  compact('user'));
    }
	
	public function updateUserPaid($user, $paid_id)
    {
		//var_dump($user);
		$user['paid'] = 1;
		$user['paid_id'] = $paid_id;
		
		$user->save();
	}
	
	public function showProfil($id)
    {
        $user = $this->userRepository->getById($id);
		
		return view('manager.users.showProfil',  compact('user'));
    }
	
	
	
	

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
		$cities = City::all();
		
        $user = $this->userRepository->getById($id);
		
		$selected_city = City::find($user->city_id);
		
		return view('manager.users.edit',  compact('user', 'cities', 'selected_city'));
    }
	
	public function editProfil($id)
    {
		$cities = City::all();
		
        $user = $this->userRepository->getById($id);
		
		$selected_city = City::find($user->city_id);
		
		return view('manager.users.editProfil',  compact('user', 'cities', 'selected_city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UserUpdateRequest $request, $id, PhotoGestion $photoGestion)
    {
		
		if($photoGestion->save($request->file('shopPicture')))
		{
			$input = $request->all();
			$input['shopPicture'] = $photoGestion->getPictureLink();
		  
			
			$this->setAdmin($request);
			
			$user = $request->all();
			
			//var_dump($user);
			$user['shopPicture'] = $photoGestion->getPictureLink();
			
			//var_dump($user);
			$this->userRepository->update($id, $user);	
		
		}
		
		if(Auth::user()->admin){
			return redirect('user')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
		}
		else{
			return redirect('post')->withOk("Votre Profil" . $request->input('name') . " a été modifié.");
		}
		
		
		
    }

	public function updateProfil(UserUpdateRequest $request, $id, PhotoGestion $photoGestion)
    {
		
		if($photoGestion->save($request->file('shopPicture')))
		{
			$input = $request->all();
			$input['shopPicture'] = $photoGestion->getPictureLink();
		  
			
			$this->setAdmin($request);
			
			$user = $request->all();
			
			//var_dump($user);
			$user['shopPicture'] = $photoGestion->getPictureLink();
			
			//var_dump($user);
			$this->userRepository->update($id, $user);	
		
		}
		
		return redirect('post')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

	
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->userRepository->destroy($id);
		return redirect()->back();
    }
	
	private function setAdmin($request)
	{
		if(!$request->has('admin'))
		{
			$request->merge(['admin' => 0]);
		}		
	}

}
