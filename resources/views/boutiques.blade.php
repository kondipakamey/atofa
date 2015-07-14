@extends('template')

@section('titre')
	Atofa | Boutiques
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
		<div class="row">
			<div class="col-md-9" id="boutiques">
				@foreach($boutiques as $boutique)
				<div class="list-group">
					<a href="{{ url('/boutique/')}}/{{$boutique->id}}" class="list-group-item">
						<div class="row">
							<div class="col-md-4">
								<img src="{{ asset(config('images.path').'/'.$boutique->shopPicture) }}" alt="..." class="img-thumbnail">
							</div>
							<div class="col-md-8 bg-default" id="boutique-info">
								<h3>{{$boutique->shopName}} <span class="pull-right">{{$boutique->city->city}}, {{$boutique->city->state}}</span></h3>
								<p>{{$boutique->shopDescription}}</p>
								
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
									<div class="btn-group">
										<button type="button"  class="btn btn-info btn-md text-uppercase" id="boutiques-button"><strong>visiter la boutique</strong></button>
									</div>
								</div>
								
								
							</div>
						</div>
					</a>
				</div>
				@endforeach
				{!! $links !!}
			</div>
			
			<div class="col-md-3" id="pubs">
				<div class="row">
					<img src="assets/img/pubs/pub2.png" alt="..." class="img-thumbnail">
				</div>
				<div class="row">
					<img src="assets/img/pubs/pub3.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class="row">
					<img src="assets/img/pubs/pub.png" alt="..." class="img-thumbnail">
				</div>
			</div>
		</div>
		
	</div>
	
@stop