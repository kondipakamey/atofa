@extends('template')

@section('titre')
	Atofa | Fonctionnement
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
					<h1 class="text-center text-primary text-uppercase">Fonctionnement</h1>	
					<div class="panel panel-info">	
						<div class="panel-body"> 
							<h2 class="text-center">ATOFA est une plateforme de publication d’offres et de demandes avec les caractéristiques suivantes :
							</h2>
							<ul>
								<li>
									<p>Les utilisateurs visiteurs auront un accès gratuit à la plateforme et pourront 
									consulter soit l'ensemble des annonces triées par catégories (toutes boutiques confondues) ou 
									se rendre directement dans une boutique précise puis consulter ses annonces.<p>
								</li>
								<li>
									<p>Les utilisateurs membres (qui seront préalablement inscrits) pourront créer leur propre boutique ou 
									espace virtuel dans lequel sera exposé l’ensemble des annonces qui leur est lié.</p>
								</li>
								<li>
									<p>Le volet payement se retrouve au niveau de la creation d'un compte que les membres voudront créer; 
									évidement la creation d'un compte donne plus de flexibilité dans la gestion des annonces en plus d'une meilleure visibilité.</p>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
		
	</div>
@stop
<!-- Fin section contenu -->