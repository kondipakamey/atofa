@extends('indexTemplate')

@section('titre')
	Acceuil | Atofa
@stop	
<!-- Fin section titre -->

@section('bas_menu')
	<div class="row well" id="header-welcome">
			<div class="col-sm-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-4">
						<div class="row">
							<a href="{{ url('/post') }}"><div class="btn-group btn-group-justified" role="group" aria-label="...">
								<div class="btn-group">
									<button type="button" class="btn btn-warning btn-lg text-uppercase"><strong>Deposer une annonce</strong></button>
								</div>
							</div></a>
						</div>
						<div class="row">
							<div class="panel panel-info" id="panel-recherche">
								<div class="panel-heading">
									<h3 class="panel-title text-center text-uppercase" >Rechercher une annonce</h3>
								</div>
								<div class="panel-body">
									<div class="form-horizontal">
										{!! Form::open(['url'=>'indexPostValidation']) !!}
											
												<div class="form-group {!! $errors->has('item') ? 'has-error' : '' !!}">
													<div class="col-sm-12">
														{!! Form::text('item', null, ['class' => 'form-control', 'placeholder' => 'Que chercher vous ?']) !!}
														{!! $errors->first('item', '<small class="help-block">:message</small>') !!}
												
													</div>
												</div>
												
												<div class="form-group {!! $errors->has('city') ? 'has-error' : '' !!}">
													<div class="col-sm-12">
														{!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Dans quelle ville ?']) !!}
														{!! $errors->first('city', '<small class="help-block">:message</small>') !!}
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
														{!! Form::submit('Rechercher', ['class' => 'btn btn-info pull-right']) !!}
													</div>
												</div>
											
										{!! Form::close() !!}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8" >
						<div class="row">
							<div class="jumbotron">
							<h1 class="text-center">Bienvenue sur Atofa !!!</h1>
							<p class="text-center">ATOFA est un portail web regroupant un ensemble de boutiques 
								qui proposent différentes sortes d’annonces. </p>

						</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
@stop

@section('panel_recherche')
	
@stop

@section('contenu')
	<div class="container">
		<section class="row trait-horizontal">
			<div class="col-md-8 col-md-offset-2">
				<div class="row">
					<h2 class="text-uppercase text-center">Visiter les offres, demandes ou boutiques</h2>
					
				</div>
				<div class="row" id="offre-demande-visite">					
					<div class="col-sm-4">
						<a href="{{ url('/offres') }}" class="cercle bg-primary"> OFFRES </a>
					</div>
					<div class="col-sm-4 ">
						<a href="{{ url('/demandes') }}" class="cercle bg-primary"> DEMANDES </a>
					</div>
					<div class="col-sm-4">
						<a href="{{ url('/boutiques') }}" class="cercle bg-primary"> BOUTIQUES </a>
					</div>
				</div>
			</div>
		</section>
		<div class="row trait-horizontal" id="dernieres-annonces">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<h2 class="text-uppercase text-center">Les dernieres annonces</h2>
				</div>
				<div class="row">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<div class="col-sm-6 col-md-4">
									<div class="thumbnail">
									  <img src="{{ asset(config('images.path').'/'.$annonces[0]->photo) }}" >
									  <div class="caption">
										<h4 class="text-center"><strong>{{$annonces[0]->titre}}</strong></h4>
										<p class="text-center"><strong>{{$annonces[0]->prix}}$</strong></p>
										<a href="{{ url('/annonce/')}}/{{$annonces[0]->id}}" >
											<div class="btn-group btn-group-justified" role="group" aria-label="...">
												<div class="btn-group">
													<button type="button" class="btn btn-success btn-lg text-uppercase"><strong>regarder l'annonce</strong></button>
												</div>
											</div>
										</a>
									  </div>
									</div>
								</div>
								<div class="col-sm-6 col-md-4">
									<div class="thumbnail">
									  <img src="{{ asset(config('images.path').'/'.$annonces[1]->photo) }}" >
									  <div class="caption">
										<h4 class="text-center"><strong>{{$annonces[1]->titre}}</strong></h4>
										<p class="text-center"><strong>{{$annonces[1]->prix}}$</strong></p>
										<a href="{{ url('/annonce/')}}/{{$annonces[1]->id}}" >
											<div class="btn-group btn-group-justified" role="group" aria-label="...">
												<div class="btn-group">
													<button type="button" class="btn btn-success btn-lg text-uppercase"><strong>regarder l'annonce</strong></button>
												</div>
											</div>
										</a>
									  </div>
									</div>
								</div>
								<div class="col-sm-6 col-md-4">
									<div class="thumbnail">
									  <img src="{{ asset(config('images.path').'/'.$annonces[2]->photo) }}" >
									  <div class="caption">
										<h4 class="text-center"><strong>{{$annonces[2]->titre}}</strong></h4>
										<p class="text-center"><strong>{{$annonces[2]->prix}}$</strong></p>
										<a href="{{ url('/annonce/')}}/{{$annonces[2]->id}}" >
											<div class="btn-group btn-group-justified" role="group" aria-label="...">
												<div class="btn-group">
													<button type="button" class="btn btn-success btn-lg text-uppercase"><strong>regarder l'annonce</strong></button>
												</div>
											</div>
										</a>
									  </div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6 col-md-4">
									<div class="thumbnail">
									  <img src="{{ asset(config('images.path').'/'.$annonces[3]->photo) }}" >
									  <div class="caption">
										<h4 class="text-center"><strong>{{$annonces[3]->titre}}</strong></h4>
										<p class="text-center"><strong>{{$annonces[3]->prix}}$</strong></p>
										<a href="{{ url('/annonce/')}}/{{$annonces[3]->id}}" >
											<div class="btn-group btn-group-justified" role="group" aria-label="...">
												<div class="btn-group">
													<button type="button" class="btn btn-success btn-lg text-uppercase"><strong>regarder l'annonce</strong></button>
												</div>
											</div>
										</a>
									  </div>
									</div>
								</div>
								<div class="col-sm-6 col-md-4">
									<div class="thumbnail">
									  <img src="{{ asset(config('images.path').'/'.$annonces[4]->photo) }}" >
									  <div class="caption">
										<h4 class="text-center"><strong>{{$annonces[4]->titre}}</strong></h4>
										<p class="text-center"><strong>{{$annonces[4]->prix}}$</strong></p>
										<a href="{{ url('/annonce/')}}/{{$annonces[4]->id}}" >
											<div class="btn-group btn-group-justified" role="group" aria-label="...">
												<div class="btn-group">
													<button type="button" class="btn btn-success btn-lg text-uppercase"><strong>regarder l'annonce</strong></button>
												</div>
											</div>
										</a>
									  </div>
									</div>
								</div>
								<div class="col-sm-6 col-md-4">
									<div class="thumbnail">
									  <img src="{{ asset(config('images.path').'/'.$annonces[5]->photo) }}" >
									  <div class="caption">
										<h4 class="text-center"><strong>{{$annonces[5]->titre}}</strong></h4>
										<p class="text-center"><strong>{{$annonces[5]->prix}}$</strong></p>
										<a href="{{ url('/annonce/')}}/{{$annonces[5]->id}}" >
											<div class="btn-group btn-group-justified" role="group" aria-label="...">
												<div class="btn-group">
													<button type="button" class="btn btn-success btn-lg text-uppercase"><strong>regarder l'annonce</strong></button>
												</div>
											</div>
										</a>
									  </div>
									</div>
								</div>
							</div>
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="false"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="false"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="jumbotron">
				<h1 class="text-center">Qui sommes nous</h1>
				<p class="text-center">Nous sommes un portail web conçue sur une idée selon laquelle les bonnes occasions se trouvent aux quatres coins de votre ville, voire près de chez vous, dans votre quartier.
				</p>
				<a href="{{ url('creer_compte') }}">
				<div class="btn-group btn-group-justified" role="group" aria-label="...">
					
						<div class="btn-group">
							<button type="button" class="btn btn-primary btn-lg text-uppercase"><strong>creez votre propre boutique</strong></button>
						</div>
					
				</div>	
				</a>
			</div>
		</div>
	</div>
@stop
<!-- Fin section contenu -->