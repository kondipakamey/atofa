@extends('template')

@section('titre')
	Depot Annonce | Atofa
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
					<h2 class="text-center text-primary">Déposer gratuitement une annonce sur Atofa</h2>
					<p>Sed dictum id neque sed feugiat. Curabitur ac malesuada eros. 
						Phasellus a turpis eu nisi varius pellentesque vitae sed ex. 
					 </p>						
				</div>
			</div>
			<div class="row">
			<div class="col-md-7" id="annonces">
				@if(session()->has('error'))
					<div class="alert alert-danger">{!! session('error') !!}</div>
				@endif
				{!! Form::open(['url' => 'depot-annonce', 'class' => 'form-horizontal', 'files' => true]) !!}
					<div class="panel panel-info">
						<div class="panel-heading text-uppercase">Vos Informations </div>
						<div class="panel-body"> 
							
							<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
								<label for="nom" class="col-sm-4 control-label">Nom : </label>
								<div class="col-sm-8">
									{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
									{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
								</div>
								
							</div>
							<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
								
								<label for="email" class="col-sm-4 control-label">Email : </label>
								<div class="col-sm-8">
									{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
									{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
								</div>
								
							</div>
							
							<div class="form-group {!! $errors->has('tel') ? 'has-error' : '' !!}">
								
								<label for="tel" class="col-sm-4 control-label">Telephone : </label>
								<div class="col-sm-8">
									<input type="tel" name="tel" class="form-control" id="tel" placeholder="XXX XXX XXXX" >
									{!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
								</div>
								
							</div>
								
						</div>
					</div>
					
					<div class="panel panel-info">
						<div class="panel-heading text-uppercase">Votre annonce </div>
						<div class="panel-body"> 
							
							<div class="form-group ">
								<label for="categorie" class="col-sm-4 control-label">Categorie : </label>
								<div class="col-sm-8">
									<select class="form-control">
										<option>Toutes les categories</option>
										<option>Electronique</option>
										<option>Cuisine</option>
										<option>article scolaires</option>
									</select>
								</div>
								
							</div>
							<div class="form-group">
								
								<label for="email" class="col-sm-4 control-label">Votre bien est : </label>
								<div class="col-sm-8">
									<label class="radio-inline">
										<input type="radio" name="inlineRadioOptions" id="neuf" value="option1" checked> Neuf
									</label>
									<label class="radio-inline">
									  <input type="radio" name="inlineRadioOptions" id="occasion" value="option2"> Occasion
									</label>
								</div>
							
							</div>
							
							<div class="form-group">
								
								<label for="tel" class="col-sm-4 control-label">Type de l'annonce : </label>
								<div class="col-sm-8">
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="offre" value="option1" checked>
										Offre 
									</label>
								</div>
								<div class="radio">
								  <label>
										<input type="radio" name="optionsRadios" id="demande" value="option2">
										Demande
								  </label>
								</div>
								</div>
								
							</div>
							
							<div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
								<label for="titre" class="col-sm-4 control-label">Titre de l'annonce : </label>
								<div class="col-sm-8">
									{!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre de l\'annonce']) !!}
									{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
								</div>
								
							</div>
							
							<div class="form-group {!! $errors->has('prix') ? 'has-error' : '' !!}">
								<label for="prix" class="col-sm-4 control-label">Prix : </label>
								<div class="col-sm-7 input-group">
								  <div class="input-group-addon">$</div>
								  <input type="text" name="prix" class="form-control" id="prix" placeholder="Prix">
								  <div class="input-group-addon">.00</div>
								  {!! $errors->first('prix', '<small class="help-block">:message</small>') !!}
								</div>
								
							</div>
							
							<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
								<label for="description" class="col-sm-4 control-label">Description : </label>
								<div class="col-sm-8">
									{!! Form::textarea ('description', null, ['class' => 'form-control', 'placeholder' => 'Votre message']) !!}
									{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
								</div>
								
							</div>
							
							<div class="form-group ">
								<label for="province" class="col-sm-4 control-label">Province : </label>
								<div class="col-sm-8">
									<select class="form-control">
										
										<option>Quebec</option>
										<option>Ontario</option>
										
									</select>
								</div>
								
							</div>
							
							<div class="form-group ">
								<label for="ville" class="col-sm-4 control-label">Ville : </label>
								<div class="col-sm-8">
									<select class="form-control">
										<option>Sherbrooke</option>
										<option>Montreal</option>
										<option>Gatineau</option>
									</select>
								</div>
								
							</div>
							
							<div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
								<label for="image" class="col-sm-4 control-label">Photo : </label>
								<div class="col-sm-8">
									{!! Form::file('image', ['class' => 'form-control']) !!}
									{!! $errors->first('image', '<small class="help-block">:message</small>') !!}
								</div>
							</div>
							
							
							
						</div>
					</div>
					
					<div class="form-group ">
						<div class="btn-group btn-group-justified" role="group" aria-label="...">
							<div class="btn-group">
							<p>Sed dictum id neque sed feugiat. Curabitur ac malesuada eros. 
							Phasellus a turpis eu nisi varius pellentesque vitae sed ex. 
							Curabitur a ligula sit amet .</p>
							<div class="col-sm-8 col-md-offset-2">
								{!! Form::submit('Deposer cette annonce !', ['class' => 'btn btn-warning btn-lg text-uppercase']) !!}							</div>
							</div>
						</div>
					</div>
					
				
				{!! Form::close() !!}
			</div>
				
			
			
			<div class="col-md-offset-1 col-md-4" id="pubs">
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
		
	</div>
@stop
<!-- Fin section contenu -->