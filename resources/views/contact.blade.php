@extends('template')

@section('titre')
	Atofa | Contact
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
		
			
				<div class="well">
					<h1 class="text-center text-primary text-uppercase">Contact</h1>	
				</div>
				<div class="row well">
					<div class="col-md-4">
						<div class="panel panel-info">	
							<div class="panel-body"> 
								<p>Kondi Le Roy PAKAMEY</p>
								<p>2500 boul. Université</p>
								<p>J1K 2R1</p>
								<p>Sherbrooke, CANADA</p>
								<p>Cell: 1 514 638 0001</p>
								<p>Email : kondi.pakamey@gmail.com</p>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="panel panel-info">	
							<div class="panel-body"> 
								<form method="post" action="http://formspree.io/kondi.pakamey@gmail.com" class="form-horizontal">
									<p><label for="nom"> </label> <input type="text" name="nom" id="nom"  class="col-sm-3 form-control" placeholder="Nom : " required /></p>
									<p><label for="email"> </label> <input type="email" name="email" id="email" class="col-sm-3 form-control"  placeholder="Email : " required /></p>
									<p><label for="objet"> </label> <input type="text" name="objet" id="objet" class="col-sm-3 form-control" placeholder="Objet du message" required /></p>
									<p><label for="message"> </label> <textarea name="message" id="message" class="col-sm-3 form-control" required ></textarea></p>
									<p class="bouton"><input type="Reset" value="Annuler" class="btn btn-danger"/> <input type="submit" value="Envoyer" class="btn btn-info" /></p>
									
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row" id="google_map">
					
				</div>
			
	
		
	</div>
	<!-- Api google maps -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
	function initialize() {
	  var mapProp = {
		center:new google.maps.LatLng(45.380414, -71.929188),
		zoom:17,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  var map=new google.maps.Map(document.getElementById("google_map"),mapProp);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
	</script>
@stop
<!-- Fin section contenu -->