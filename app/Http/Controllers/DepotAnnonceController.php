<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepotAnnonceRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gestion\PhotoGestion;

class DepotAnnonceController extends Controller
{
    public function getForm(){
		return view('depotAnnonce');
	}
	
	public function postForm(DepotAnnonceRequest $depotAnnonceRequest, PhotoGestion $photogestion){
		

		if($photogestion->save($depotAnnonceRequest->file('image')))
		{
			
				return 'Le formulaire est bien rempli avec : 
						nom = '.$depotAnnonceRequest->input('nom').'
						email = '.$depotAnnonceRequest->input('email').'
						tel = '.$depotAnnonceRequest->input('tel').'
						photo = '.$depotAnnonceRequest->input('image').'
						prix = '.$depotAnnonceRequest->input('prix');
			
		}

		return redirect('photo/form')
			->with('error','Désolé mais votre image ne peut pas être envoyée !');
		
		
	}
}
