@extends('app')


@section('content')

@if ($name == 'Carl Bradshaw')
<h1>About {{$name}} Page</h1>
@else
<h1>About Else</h1>
@endif

@if (count($people))
<h3>people i like</h3>
<ul>
	@foreach ($people as $person)
	<li>{{ $person }}</li>
	@endforeach
</ul>
@endif

{{-- @unless
@forelse
@foreach @endforeach --}}

@stop