<?php

namespace App\Http\Controllers;
use App\User;
use App\City;
use App\Post;
use App\Http\Requests\UserCreateRequest;
use App\Gestion\PhotoGestion;
use App\Repositories\UserRepository;
use App\Repositories\PostRepository;
use App\Http\Requests\WelcomeFormRequest;

class WelcomeController extends Controller{
	
	protected $userRepository;
	protected $postRepository;
	protected $nbrPerPage = 4;
	
	public function __construct(UserRepository $userRepository, PostRepository $postRepository)
    {
        $this->userRepository = $userRepository;
		$this->postRepository = $postRepository;
    }
	
	public function index(){
		$annonces = Post::take(6)->get();
		return view('index', compact('annonces'));
	}
	
	public function aboutUs(){
		
		return view('a_propos');
	}
	
	public function fonctionnement(){
		
		return view('fonctionnement');
	}
	
	public function contact(){
		
		return view('contact');
	}
	
	public function creerCompte()
    {
		$cities = City::all();
		
		
        return view ('creer_compte',  compact('cities'));
    }
	
	public function enregistrerCompte(UserCreateRequest $request, PhotoGestion $photoGestion)
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
			return redirect('auth/login')->withOk("L'utilisateur " . $user->name . " a été créé.");
			
			
		}
		
		
        /*$user = $this->userRepository->store($request->all());
		return redirect('user')->withOk("L'utilisateur " . $user->name . " a été créé.");*/
    }
	
	public function indexPostForm(WelcomeFormRequest $request){
		return 'Welcome Form bien rempli avec : Item = '.$request->input('city').' et ville = '.$request->input('city'); 
	}
	
	public function boutiques(){
		
		$boutiques = $this->userRepository->getPaginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $boutiques->render());
		
		//$boutiques = User::all();
		return view('boutiques', compact('boutiques', 'links'));
	}
	
	
	
	public function offres(){
		
		$offres = $this->postRepository->getPaginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $offres->render());
		
		//$boutiques = User::all();
		return view('offres', compact('offres', 'links'));
	}
	
	public function annonces(){
		
		$annonces = $this->postRepository->getPaginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $annonces->render());
		
		//$boutiques = User::all();
		return view('annonces', compact('annonces', 'links'));
	}
	
	public function demandes(){
		
		$demandes = $this->postRepository->getPaginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $demandes->render());
		
		//$boutiques = User::all();
		return view('demandes', compact('demandes', 'links'));
	}
	
	public function showBoutique($id)
    {
        $user = $this->userRepository->getById($id);
		
		return view('boutique',  compact('user'));
    }
	
	public function showAnnonce($id)
    {
        $post = $this->postRepository->getById($id);
		
		return view('annonce',  compact('post'));
    }
}