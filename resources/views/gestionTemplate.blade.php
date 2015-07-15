<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mon joli site</title>
		<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
	
		{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
		{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') !!}
		<!--[if lt IE 9]>
			{{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
			{{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
		<![endif]-->
		<style> textarea { resize: none; } </style>
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
								<ul class="nav navbar-nav" id="margin-right-20">
									<li>{!!link_to('post', 'Mes Articles', ['class' => 'text-uppercase']) !!}</li>
									
									
									
								</ul>
								<div class="dropdown navbar-btn navbar-right" id="margin-left-20">
								  <button class="btn btn-successu dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									{{ Auth::user()->name }}
									<span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<li><a href="{{ url('/auth/logout') }}">Deconnexion</a></li>
									
								  </ul>
								</div>
								<a href="{{ url('post/create') }}" class="btn btn-primary navbar-btn navbar-right" >Creer article</a>
								

							</div>
						
					</div><!-- End Container -->
				</nav><!-- End Navbar -->
			
		</div>
		
	
	</header>
	
    <div class="container">
	
      @yield('contenu')
    </div>
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