@extends('template')

@section('titre')
	Atofa | Annonces de la boutique
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

	<div class="container">
		<div class="jumbotron">
			<h2 class="text-center text-info">Bienvenue dans la boutique : <strong class="text-primary">{{ $posts[0]->user->shopName }} </strong></h2>
			<p class="text-center">{{ $posts[0]->user->shopDescription }}</p>
		</div>
		<div class="row">
		
			<div class="col-md-9" id="annonces">
			
				@foreach($posts as $post)
					
						<div class="list-group">
							<a href="{{ url('/annonce/')}}/{{$post->id}}" class="list-group-item">
								<div class="row">
									<div class="col-md-4">
										<img src="{{ asset(config('images.path').'/'.$post->photo) }}" alt="..." class="img-thumbnail">
									</div>
									<div class="col-md-8 bg-primary" id="annonce-info">
										<h4><strong>{{$post->titre}} </strong>
											<em class="pull-right">
												<span class="glyphicon glyphicon-pencil"></span> {{ $post->user->name }} le {!! $post->created_at->format('d-m-Y') !!}
											</em>
										</h4>
										<p>Categorie : <strong>{{$post->category->name}} </strong>/ Ville : <strong>{{$post->city->city}} {{$post->city->state}}</strong></p>
										
										<p>Etat : <strong>{{$post->etat}}</strong></p>
										<h3><strong>{{$post->prix}}$</strong></h3>
										
										
									</div>
								</div>
							</a>
						</div>
					
				@endforeach
				{!! $links !!}
			</div>
			
			<div class="col-md-3" id="pubs">
				<div class="row">
					
					<img src="http://atofa/public/assets/img/pubs/pub2.png" alt="..." class="img-thumbnail">
				</div>
				<div class="row">
					<img src="http://atofa/public/assets/img/pubs/pub3.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class="row">
					<img src="http://atofa/public/assets/img/pubs/pub.png" alt="..." class="img-thumbnail">
				</div>
			</div>
		</div>
		
	</div>
	
@stop