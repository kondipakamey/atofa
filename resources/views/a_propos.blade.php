@extends('template')

@section('titre')
	Atofa | A propos de nous
@stop	
<!-- Fin section titre -->

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
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<div class="jumbotron">
					<h1 class="text-center text-primary text-uppercase">A propos de nous</h1>	
					<div class="panel panel-info">	
						<div class="panel-body"> 
							<p>ATOFA est un portail web conçue sur une idée selon laquelle 
							les bonnes occasions se trouvent aux quatres coins de votre ville, voire près de chez vous, dans votre quartier. 
							</p>
							<p>Il s'agit principalement d'un site regroupant un ensemble de boutiques ou espaces membres 
							qui proposent différentes sortes d’annonces sous forme d’offres et de demandes. 
							Il vous suffit simplement de contacter l'éditeur qui a posté l'annonce, par téléphone ou e-mail, pour conclure la bonne affaire.
							</p>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
		
	</div>
@stop
<!-- Fin section contenu -->