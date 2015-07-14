@extends('template')

@section('titre')
	Atofa | Boutique
@stop


@section('bas_menu')
<div class="row well">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-inline">
					<div class="form-group">
						<input type="text" class="form-control" id="titre_annonce" placeholder="Titre de l'annonce">
					</div>
					<select class="form-control" id="choix_categorie">
						<option>Toutes les categories</option>
						<option>Electronique</option>
						<option>Cuisine</option>
						<option>article scolaires</option>
					</select>
					<select class="form-control" id="choix_province">
						<option>Toutes les provinces</option>
						<option>Manitoba</option>
						<option>Quebec</option>
						<option>Oontario</option>
					</select>	
					<select class="form-control" id="choix_ville">
						<option>Toutes les villes</option>
						<option>Maontreal</option>
						<option>Sherbrooke</option>
						<option>Quebec</option>
						<option>Trois riviere</option>
						<option>Ottawa</option>
					</select>					
					<button type="submit" class="btn btn-success text-uppercase">Rechercher</button>
				</form>
			</div>
		</div>
@stop



@section('contenu')
	<div class="container container-ajusted well">
		<div class="jumbotron">
			<h2 class="text-center text-info">Bienvenue dans la boutique : <strong class="text-primary">{{ $user->shopName }} </strong></h2>
			<p class="text-center">{{ $user->shopDescription }}</p>
		</div>
		<div class="row container">
			<div class="col-md-7">
				<img src="{{ asset(config('images.path').'/'.$user->shopPicture) }}" alt="..." class="img-thumbnail boutique-img">
			</div>
			<div class="col-md-5">
				<div class="panel panel-primary">	
					<div class="panel-heading text-center"><h3><strong>Information sur le proprietaire</h3></strong></div>
					<div class="panel-body"> 
						<h4><strong>Nom : </strong> {{ $user->name }}</h4>
						<h4><strong>Email :</strong> {{ $user->email }}</h4>
						<h4><strong>Contact :</strong> {{ $user->phone }}</h4>
						
						@if($user->admin == 1)
							<h4>Administrateur</h4>
						@endif
						
						
					</div>
				</div>	
				
				<div class="panel panel-primary">	
					<div class="panel-heading text-center"><h3><strong>Information sur la boutique</strong></h3></div>
					<div class="panel-body"> 
						<h4><strong>Adresse :</strong> {{ $user->address }}</h4>
						<h4><strong>Code Postal :</strong> {{ $user->postalCode }}</h4>
						<h4><strong>Province :</strong> {{ $user->city->state }}</h4>
						<h4><strong>Ville : </strong>{{ $user->city->city }}</h4>
					</div>
				</div>	
			
			</div>
		</div>
		
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
		
		
	</div>
@stop	






	
				
		
