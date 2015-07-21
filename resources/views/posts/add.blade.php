@extends('gestionTemplate')

@section('contenu')

	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<div class="jumbotron">
					<h2 class="text-center text-primary">Deposer gratuitement une annonce sur Atofa</h2>
									
				</div>
			</div>
			<div class="row">
			<div class="col-md-10 col-md-offset-1" id="annonces">
				@if(session()->has('error'))
					<div class="alert alert-danger">{!! session('error') !!}</div>
				@endif
				{!! Form::open(['route' => 'post.store', 'class' => 'form-horizontal', 'files' => true]) !!}
					
					
					<div class="panel panel-info">
						<div class="panel-heading text-uppercase">Formulaire d'ajout d'une annonce </div>
						<div class="panel-body"> 
							
							<div class="form-group ">
								<label for="categories" class="col-sm-4 control-label">Categorie : </label>
								<div class="col-sm-8">
									<select class="form-control" name="category_id" id="category_id">
										<option value="">Selectionner une categorie</option>
										@foreach($categories as $category)
											<option value="{{ $category->id }}">{{$category->name}}</option>
										@endforeach
									</select>
								</div>	
							</div>
							<div class="form-group">
								
								<label for="etat" class="col-sm-4 control-label">Votre bien est : </label>
								<div class="col-sm-8">
									<label class="radio-inline">
										<input type="radio" name="etat" id="neuf" value="Neuf" checked> Neuf
									</label>
									<label class="radio-inline">
									  <input type="radio" name="etat" id="occasion" value="Ocasion"> Occasion
									</label>
								</div>
							
							</div>
							
							<div class="form-group">
								
								<label for="type" class="col-sm-4 control-label">Type de l'annonce : </label>
								<div class="col-sm-8">
								<div class="radio">
									<label>
										<input type="radio" name="type" id="offre" value="Offre" checked>
										Offre 
									</label>
								</div>
								<div class="radio">
								  <label>
										<input type="radio" name="type" id="demande" value="Demande">
										Demande
								  </label>
								</div>
								</div>
								
							</div>
							
							<div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
								<label for="titre" class="col-sm-4 control-label">Titre de l'annonce : </label>
								<div class="col-sm-8">
									{!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre de l\'annonce en deux mots']) !!}
									{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
								</div>
								
							</div>
							
							<div class="form-group {!! $errors->has('prix') ? 'has-error' : '' !!}">
								<label for="prix" class="col-sm-4 control-label">Prix : </label>
								<div class="col-sm-7 input-group">
								  <div class="input-group-addon">$</div>
								  <input type="text" name="prix" class="form-control" id="prix" placeholder="Prix">
								  
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
							<label for="cities" class="col-sm-4 control-label">Ville : </label>
							<div class="col-sm-8">
								<select class="form-control" name="city_id" id="city_id">
									<option value="">Selectionner une ville</option>
									@foreach($cities as $city)
										<option value="{{ $city->id }}">{{$city->city}}</option>
									@endforeach
								</select>
							</div>	
						</div>
							
							<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
								<label for="photo" class="col-sm-4 control-label">Photo : </label>
								<div class="col-sm-8">
									{!! Form::file('photo', ['class' => 'form-control']) !!}
									{!! $errors->first('photo', '<small class="help-block">:message</small>') !!}
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
				
		</div>
		<div class="row">
			<a href="javascript:history.back()" class="btn btn-primary">
				<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
			</a>
		</div>
	</div>
		
	</div>
	
	
@stop