@extends('app')


@section('content')



<h1>Articles</h1>
<hr/>
@foreach ($articles as $article)
<article id="article-{{$article->id}}" >
	<h2>
	<!-- <a href="{{  action('ArticlesController@show', [$article->id]) }}" >{{$article->title}}</a> -->
	<a href="{{ url('/articles', $article->id) }}" >{{$article->title}}</a>
	</h2>
	<em>{{$article->published_at->diffForHumans()}}</em>
	<p>{{$article->body}}</p>
</article>
@endforeach

@stop