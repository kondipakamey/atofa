<!DOCTYPE html>
<html lang="fr">
  <head>
  
    <title>Atofa | Administration</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- Custom css -->
	<link rel="stylesheet" href="<?php echo asset('assets/css/main.css')?>">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<header>
		<div class="container">
			
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
									<li><a href="boutique.html" class="text-uppercase">boutique</a></li>
									
								</ul>
								<a href="connexion.html" class="btn btn-primary navbar-btn navbar-right">Se connecter</a>
							</div>
						
					</div><!-- End Container -->
				</nav><!-- End Navbar -->
			
		</div>
		
	
	</header>
	
	<div class="container well" id="manager-ajust">
		<div class="row">
			@yield('contenu')
		</div>
	</div>
	
	
	<footer id="footer-gestion">	
		<div class="container">
			<div class="row" id="copy">
				<p>Copyright &copy; 2015 Tout droit reservé</p>
			</div>
		</div>
	</footer>
	
	
	<!-- JQuery -->
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>