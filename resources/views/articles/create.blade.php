@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Create a new Article</h1>
        <hr/>

        @include('errors.list')

        {!! Form::open(['url' => 'articles']) !!}

        @include('articles.partials.form', ['submitButtonText' => 'Add Article'])

        {!! Form::close() !!}

    </div>
@endsection