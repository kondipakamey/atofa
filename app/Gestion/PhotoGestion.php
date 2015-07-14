<?php 

namespace App\Gestion;

class PhotoGestion
{
	protected $pictureLink = "";
	
    public function save($image)
	{
		if($image->isValid())
		{
			$chemin = config('images.path');
			$extension = $image->getClientOriginalExtension();

			do {
				$nom = str_random(10) . '.' . $extension;
				$this->pictureLink = $nom;
			} while(file_exists($chemin . '/' . $nom));
			
			
			
			return $image->move($chemin, $nom);
		}

		return false;
	}
	
	public function getPictureLink(){
		return $this->pictureLink;
	}
	
	

}