<!DOCTYPE html>
<html lang="fr">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('titre')</title>
    <!-- Custom css -->
	<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

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
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								{!!link_to('/', 'atofa', ['class' => 'navbar-brand text-uppercase']) !!}
								
							</div><!-- Navbar Header -->
							<div class="collapse navbar-collapse navbar-right" id="navbar-collapse">
								<ul class="nav navbar-nav">
									<li>{!!link_to('depot-annonce', 'vendre', ['class' => 'text-uppercase']) !!}</li>
									
									<li><a href="offre.html" class="text-uppercase">acheter</a></li>
									<li>{!!link_to('boutiques', 'boutique', ['class' => 'text-uppercase']) !!}</li>
									
								</ul>
								
								@if (Auth::guest())
								
									<a href="{{ url('/auth/login') }}" class="btn btn-primary navbar-btn navbar-right">Se connecter</a>
									
									<a href="{{ url('creer_compte') }}" class="btn btn-warning navbar-btn navbar-right">Creer une boutique</a>
								@else
									
									<div class="dropdown navbar-btn navbar-right">
									  <button class="btn btn-successu dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										{{ Auth::user()->name }}
										<span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										<li><a href="{{ url('/auth/logout') }}">Deconnexion</a></li>
										
									  </ul>
									</div>
								@endif
							</div>
						
					</div><!-- End Container -->
				</nav><!-- End Navbar -->
			
		</div>
		@yield('bas_menu')
	
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
									<li><a href="#">Acceuil</a></li>
									<li><a href="#">Acheter</a></li>
									<li><a href="#">Vendre</a></li>
									<li><a href="#">Boutique</a></li>
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