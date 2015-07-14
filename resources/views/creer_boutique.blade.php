@extends('indexTemplate')

@section('contenu')

<div class="container container-ajusted well">
	<div class="jumbotron">
		<h2 class="text-center text-info">Ajout d'un nouveau utilisateur</h2>
	</div>
	<div class="row">
		<div class="col-sm-offset-3 col-sm-6 container-ajusted">
			
			<div class="panel panel-primary">	
				
				<div class="panel-body"> 
					<div class="col-sm-12">
						{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'class' => 'form-horizontal panel', 'files' => true]) !!}	
						<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
							<label for="name" class="col-sm-4 control-label">Nom : </label>
							<div class="col-sm-8">
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
								{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
							</div>
						</div>
						<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
							<label for="email" class="col-sm-4 control-label">Email : </label>
							<div class="col-sm-8">
								{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
								{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
							</div>
						</div>
						<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
							<label for="password" class="col-sm-4 control-label">Mot de Passe : </label>
							<div class="col-sm-8">
								{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
								{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
							</div>
						</div>
						<div class="form-group">
							<label for="password_confirmation" class="col-sm-4 control-label">Confirmer le Mot de Passe : </label>
							<div class="col-sm-8">
								{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe']) !!}
								{!! $errors->first('password_confirmation', '<small class="help-block">:message</small>') !!}
							</div>
						</div>
						<div class="form-group">
							<div class="checkbox">
								
								<label class="col-sm-7 control-label"> 
									 {!! Form::checkbox('admin', 1, null) !!} Administrateur
								</label>
							</div>
						</div>
						
						<div class="form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">	
							<label for="tel" class="col-sm-4 control-label">Telephone : </label>
							<div class="col-sm-8">
								<input type="tel" name="phone" class="form-control" id="phone" placeholder="XXX XXX XXXX">
								{!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
							</div>	
						</div>
						
						<div class="form-group {!! $errors->has('address') ? 'has-error' : '' !!}">
							<label for="address" class="col-sm-4 control-label">Adresse : </label>
							<div class="col-sm-8">
								{!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Votre adresse']) !!}
								{!! $errors->first('address', '<small class="help-block">:message</small>') !!}
							</div>
							
						</div>
						
						<div class="form-group {!! $errors->has('postalCode') ? 'has-error' : '' !!}">
							<label for="postalCode" class="col-sm-4 control-label">Code Postal : </label>
							<div class="col-sm-8">
								{!! Form::text('postalCode', null, ['class' => 'form-control', 'placeholder' => 'Votre Code Postal']) !!}
								{!! $errors->first('postalCode', '<small class="help-block">:message</small>') !!}
							</div>
							
						</div>
						
						<div class="form-group {!! $errors->has('shopName') ? 'has-error' : '' !!}">
							<label for="shopName" class="col-sm-4 control-label">Nom de la boutique : </label>
							<div class="col-sm-8">
								{!! Form::text('shopName', null, ['class' => 'form-control', 'placeholder' => 'Nom de la boutique']) !!}
								{!! $errors->first('shopName', '<small class="help-block">:message</small>') !!}
							</div>
							
						</div>
						
						<div class="form-group {!! $errors->has('shopDescription') ? 'has-error' : '' !!}">
							<label for="shopDescription" class="col-sm-4 control-label">Description de la boutique : </label>
							<div class="col-sm-8">
								{!! Form::textarea ('shopDescription', null, ['class' => 'form-control', 'placeholder' => 'Donner une description de la boutique']) !!}
								{!! $errors->first('shopDescription', '<small class="help-block">:message</small>') !!}
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
						
						<div class="form-group {!! $errors->has('shopPicture') ? 'has-error' : '' !!}">
							<label for="shopPicture" class="col-sm-4 control-label">Photo : </label>
							<div class="col-sm-8">
								{!! Form::file('shopPicture', ['class' => 'form-control']) !!}
								{!! $errors->first('shopPicture', '<small class="help-block">:message</small>') !!}
							</div>
						</div>
						
						{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			<a href="javascript:history.back()" class="btn btn-primary">
				<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
			</a>
		</div>
	</div>
</div>
<script>
	$('#province').on('change', function(e){
		console.log(e);
		var province_id = e.target.value;
		
		//ajax
		$.get('/ajax-subcat?province_id=' + province_id, function(data){
			//success data
			$('#city').empty();
			$.each(data, function(create, cityObj){
				$('#city').append('<option value="'+cityObj.id+'">'+cityObj.name+'</option>');
			});
		}
	});
</script>
	
@stop