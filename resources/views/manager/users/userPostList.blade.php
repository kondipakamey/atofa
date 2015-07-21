@extends('gestionTemplate')

@section('contenu')
    @if(isset($info))
		<div class="row alert alert-info">{{ $info }}</div>
	@endif
	
	
	<div class="well">
		<h1 class="text-center">Liste des annonces de la boutique <strong class="text-primary text-uppercase">{{ $user->shopName }}</strong></h1>
	</div>
	{!! $links !!}
	@foreach($posts as $post)
		
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
	
	@endforeach
	<p class="text-center">{!! $links !!}</p>
@stop