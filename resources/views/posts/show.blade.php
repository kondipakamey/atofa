@extends('gestionTemplate')

@section('contenu')
	<div class="container container-ajusted well">
		<div class="jumbotron">
			<h2 class="text-center text-info"><strong class="text-primary">{{ $post->titre }} </strong> à <strong class="text-danger">{{$post->prix}}</strong></h2>
			
		</div>
		<div class="row container">
			<div class="col-md-7">
				<img src="{{ asset(config('images.path').'/'.$post->photo) }}" alt="..." class="img-thumbnail boutique-img">
				<div class="panel panel-primary">	
					<div class="panel-heading text-center"><h3><strong>Description</strong></h3></div>
					<div class="panel-body"> 
						
						<h3>{{ $post->description }}</h3>
					</div>
				</div>	
				
				
			</div>
			<div class="col-md-5">
				
				
				
				<div class="panel panel-primary">	
					<div class="panel-heading text-center"><h3><strong>Information sur l'annonce</strong></h3></div>
					<div class="panel-body"> 
						
						<h4><strong>Etat :</strong> {{ $post->etat }}</h4>
						<h4><strong>Province :</strong> {{ $post->city->state }}</h4>
						<h4><strong>Ville : </strong>{{ $post->city->city }}</h4>
					</div>
				</div>	
				
				<div class="panel panel-primary">	
					<div class="panel-heading text-center"><h3><strong>Information sur le proprietaire</h3></strong></div>
					<div class="panel-body"> 
						<h4><strong>Nom : </strong> {{ $post->user->name }}</h4>
						<h4><strong>Email :</strong> {{ $post->user->email }}</h4>
						<h4><strong>Contact :</strong> {{ $post->user->phone }}</h4>
						<h4><strong>Adresse :</strong> {{ $post->user->address }}</h4>
						<h4><strong>Code Postal :</strong> {{ $post->user->postalCode }}</h4>
						<h4><strong>Ville :</strong> {{ $post->user->city->city }}</h4>
					</div>
				</div>	
				
				
			
			</div>
		</div>
		
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
		
		
	</div>
@stop	






	
				
		
