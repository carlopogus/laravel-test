@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Auth::check())
            {!! Form::open([ 'action' => [ 'ArticlesController@destroy', $article ], 'method' => 'delete', 'class' => 'pull-right' ]) !!}
            <a href="{{ action('ArticlesController@edit', [$article->id]) }}" class="btn btn-primary btn-xs" >Edit</a>
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
            {!! Form::close() !!}
        @endif

        <h1>{{$article->title}}</h1>
        <p>{!! $article->body !!}</p>


        @unless($article->tags->isEmpty())
            <h5>Tags:</h5>
            <ul>
                @foreach($article->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        @endunless

    </div>
@endsection