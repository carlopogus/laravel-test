@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())
        <a href="{{  action('ArticlesController@create') }}" class="btn btn-primary btn-xs pull-right">Create a new Article</a>
        @endif
        <h1>Articles</h1>
        <hr/>
        @foreach ($articles as $article)
            <article id="article-{{$article->id}}" >
                <h2>
                    <!-- <a href="{{ action('ArticlesController@show', [$article->id]) }}" >{{$article->title}}</a> -->
                    <a href="{{ url('/articles', $article->id) }}" >{{$article->title}}</a>
                </h2>
                <em>{{$article->published_at->format('j M Y')}}</em>
                <p>{!! $article->body !!}</p>
            </article>
        @endforeach
    </div>
@endsection