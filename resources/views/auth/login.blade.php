@extends('template')

@section('titre')
	Atofa | Connexion
@stop

@section('contenu')

<div class="container container-ajusted">		
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row well trait-horizontal">
					<div class="row">
						
						<h3 class="text-center ">Si vous possédez déjà un compte, accédez à votre interface d'administration.</h3>	
					</div>
										
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="panel panel-primary">
									
									<div class="panel-body">
										@if (count($errors) > 0)
											<div class="alert alert-danger">
												<strong>Désolé!</strong> il y a un probleme dans les données fournies<br><br>
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif

										<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">

											<div class="form-group">
												<label class="col-md-4 control-label"> Adresse E-Mail</label>
												<div class="col-md-6">
													<input type="email" class="form-control" name="email" value="{{ old('email') }}">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label">Mot de Passe</label>
												<div class="col-md-6">
													<input type="password" class="form-control" name="password">
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-6 col-md-offset-4">
													<div class="checkbox">
														<label>
															<input type="checkbox" name="remember"> Se souvenir de moi
														</label>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-6 col-md-offset-4">
													<button type="submit" class="btn btn-primary">Connexion</button>

													<a class="btn btn-link" href="{{ url('/password/email') }}">Mot de Passe oublié?</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
	

@stop