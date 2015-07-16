@extends('gestionTemplate')

@section('contenu')
	<div class="container container-ajusted well">
		<div class="jumbotron">
			<h2 class="text-center text-info">Ma boutique : <strong class="text-primary">{{ $user->shopName }} </strong></h2>
			<p class="text-center">{{ $user->shopDescription }}</p>
		</div>
		<div class="row container">
			<div class="col-md-7">
				<img src="{{ asset(config('images.path').'/'.$user->shopPicture) }}" alt="..." class="img-thumbnail boutique-img">
				<a href="{{ url('user-edit-profil')}}/{{$user->id}}" class="btn btn-warning btn-block btn-lg" id="margin-top-20">
					<strong class="text-uppercase">Modifier mon profil</strong>
				</a>
			</div>
			<div class="col-md-5">
				<div class="panel panel-primary">	
					<div class="panel-heading text-center text-uppercase"><h3><strong>Mes Informations</h3></strong></div>
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
					<div class="panel-heading text-center text-uppercase"><h3><strong>Information sur ma boutique</strong></h3></div>
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






	
				
		
