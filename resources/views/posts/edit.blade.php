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
{!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel', 'files' => true]) !!}					
					
					<div class="panel panel-info">
						<div class="panel-heading text-uppercase">Formulaire d'ajout d'une annonce </div>
						<div class="panel-body"> 
							
							<div class="form-group ">
								<label for="categories" class="col-sm-4 control-label">Categorie : </label>
								<div class="col-sm-8">
									<select class="form-control" name="category_id" id="category_id">
										<option value="{{$post->category->id}}">{{$post->category->name}}</option>
										@foreach($categories as $category)
											<option value="{{ $category->id }}">{{$category->name}}</option>
										@endforeach
									</select>
								</div>	
							</div>
							<div class="form-group">
								
								<label for="etat" class="col-sm-4 control-label">Votre bien est : </label>
								<div class="col-sm-8">
								@if($post->etat == "Neuf")
									<label class="radio-inline">
										<input type="radio" name="etat" id="neuf" value="Neuf" checked> Neuf
									</label>
									<label class="radio-inline">
									  <input type="radio" name="etat" id="occasion" value="Ocasion"> Occasion
									</label>
								@else
									<label class="radio-inline">
										<input type="radio" name="etat" id="neuf" value="Neuf" > Neuf
									</label>
									<label class="radio-inline">
									  <input type="radio" name="etat" id="occasion" value="Ocasion" checked> Occasion
									</label>
								@endif
								</div>
							
							</div>
							
							<div class="form-group">
								
								<label for="type" class="col-sm-4 control-label">Type de l'annonce : </label>
								<div class="col-sm-8">
								@if($post->type == "Demande")
									<div class="radio">
								
									<label>
										<input type="radio" name="type" id="offre" value="Offre" >
										Offre 
									</label>
									</div>
									<div class="radio">
									  <label>
											<input type="radio" name="type" id="demande" value="Demande" checked>
											Demande
									  </label>
									</div>
								@else
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
								@endif
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
								  {!! Form::text('prix', null, ['class' => 'form-control', 'placeholder' => 'Titre de l\'annonce']) !!}
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
									<option value="{{ $post->city->id }}">{{$post->city->city}}</option>
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
								{!! Form::submit('Mettre à jour cette annonce !', ['class' => 'btn btn-warning btn-lg text-uppercase']) !!}							</div>
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