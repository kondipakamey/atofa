@extends('gestionTemplate')

@section('header')
	@if(Auth::check())
		<h1 class="page-header btn-group pull-right">
			{!! link_to_route('post.create', 'Creer un article', [], ['class' => 'btn btn-info']) !!}
			{!! link_to('auth/logout', 'Deconnexion', ['class' => 'btn btn-warning']) !!}
			
			
		</h1>
	@else
		{!! link_to('auth/login', 'Se connecter', ['class' => 'btn btn-info pull-right']) !!}
	@endif
@stop

@section('contenu')
    @if(isset($info))
		<div class="row alert alert-info">{{ $info }}</div>
	@endif
	{!! $links !!}
	<!--php
	$user_id = Auth::user()->id;

	$posts = App\User::find($user_id)->posts;
	-->
	<div class="well">
		<h1 class="text-center">Binvenue sur la page de gestion des annonces</h1>
	</div>
	
	@foreach($posts as $post)
		@if($post->user_id == Auth::user()->id)
		<article class="row bg-primary">
			<div class="col-md-3" id="margin-top-bottom-10">
				<img src="{{ asset(config('images.path').'/'.$post->photo) }}" alt="..." class="img-thumbnail">
			</div>
			<div class="col-md-7">
				<header>
					<h1>{{ $post->titre }}</h1>
					
				</header>
				<hr>
				<section>
					<p>{{ $post->description }}</p>
					@if(Auth::check() and Auth::user()->admin)
						{!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
							{!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
						{!! Form::close() !!}
					@endif
					<em class="pull-right">
						<span class="glyphicon glyphicon-pencil"></span> {{ $post->user->name }} le {!! $post->created_at->format('d-m-Y') !!}
					</em>
				</section>
			</div>
			<div class="col-md-2" id="margin-top-bottom-10">
				<p>{!! link_to_route('post.show', 'Voir', [$post->id], ['class' => 'btn btn-success btn-block']) !!}</p>
				<p>{!! link_to_route('post.edit', 'Modifier', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</p>
				<p>
					{!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
						{!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-block ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
					{!! Form::close() !!}	
				</p>
			</div>
		</article>
		<br>
		@endif
	@endforeach
	{!! $links !!}
@stop