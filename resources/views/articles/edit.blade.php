@extends('layouts.app')

@section('styles')
    <link href="/libs/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container">

        <h1>Edit: {!! $article->title !!}</h1>
        <hr/>

        @include('errors.list')

        {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}

        @include('articles.partials.form', ['submitButtonText' => 'Update Article'])

        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
    <script src="/libs/js/select2.min.js"></script>
    <script type="text/javascript">
        $('select').select2();
    </script>
@endsection
