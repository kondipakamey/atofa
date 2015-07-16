<!DOCTYPE html>
<html lang="fr">
  <head>
	<meta charset="utf-8"/>
    <title>@yield('titre')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- Custom css -->
	<link rel="stylesheet" href="<?php echo asset('assets/css/main.css')?>">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<header>
		<div class="row">
			
			<!-- Navbar -->
				<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
					<div class="container">
						<div class="row">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#link-ajusted">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a href="{{ url('/') }}" class="navbar-brand text-uppercase" >atofa</a>
							</div><!-- Navbar Header -->
							<div class="collapse navbar-collapse navbar-right">
								<form class="navbar-form navbar-right" role="search">
									<div class="form-group">
										<input type="text" class="form-control" id="item_search" placeholder="Que cherchez vous?">
									</div>
									<div class="form-group">
										<input type="email" class="form-control" id="ville_search" placeholder="Dans quelle ville">
									</div>
									<button type="submit" class="btn btn-primary">Rechercher</button>
								</form>
							</div>
						</div>
						
					</div><!-- End Container -->
					
				</nav><!-- End Navbar -->
				<div class="row">
					<div class="container">
						<div class="collapse navbar-collapse" id="link-ajusted">
						<ul class="nav -pills nav-justified">
							<li><a href="{{ url('/') }}" class="text-uppercase">acceuil</a></li>
							<li><a href="{{ url('/post') }}" class="text-uppercase">Depot annonce</a></li>
							<li>{!!link_to('offres', 'offres', ['class' => 'text-uppercase']) !!}</li>
							
							<li>{!!link_to('demandes', 'demandes', ['class' => 'text-uppercase']) !!}</li>
							<li>{!!link_to('boutiques', 'boutiques', ['class' => 'text-uppercase']) !!}</li>
							
							@if(Auth::guest())
								<li><a href="{{ url('/auth/login') }}" class="text-uppercase text-warning bg-primary"><strong>Connexion</strong></a></li>
								<li><a href="{{ url('creer_compte') }}" class="text-uppercase text-primary bg-success"><strong>Creer compte</strong></a></li>
							@else
								<li><a href="{{ url('/post') }}" class="text-uppercase text-warning bg-primary"><strong>Mon Portail</strong></a></li>
								<li><a href="{{ url('/auth/logout') }}" class="text-uppercase text-danger bg-danger"><strong>Se Deconnecter</strong></a></li>
							@endif
						</ul>
					</div>
					</div>
				</div>
		</div>
		@yield('bas_menu')
	<div class="clear"></div>
	</header>
	
	@yield('contenu')
	
	<footer>
		<div class="container">
			
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title text-uppercase text-center"><strong>Information</strong></h3>
							</div>
							<div class="panel-body">
								<ul>
									<li><a href="#">Qui sommes nous</a></li>
									<li><a href="#">Condition d'utilisation</a></li>
									<li><a href="#">Annonces à la une</a></li>
									<li><a href="#">Contacts</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title text-uppercase text-center"><strong>parcourrir le site</strong></h3>
							</div>
							<div class="panel-body">
								<ul>
									<li><a href="{{ url('/') }}">Acceuil</a></li>
									<li><a href="{{ url('/offres') }}">Acheter</a></li>
									<li><a href="{{ url('/demandes') }}">Vendre</a></li>
									<li><a href="{{ url('/boutiques') }}">Boutique</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title text-uppercase text-center"><strong>a propos</strong></h3>
							</div>
							<div class="panel-body">
								<ul>
									<li>Atofa Corp</li>
									<li>Tel : 514 668 9908</li>
									<li>Cel : 514 668 9908</li>
									<li>Mail : rpakamey@gmail.com</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			
		</div>
		<div class="row" id="copy">
			<p>Copyright &copy; 2015 Tout droit reservé</p>
		</div>
	</footer>
	
	
	<!-- JQuery -->
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>