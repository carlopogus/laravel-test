@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())
        @endif
        <h1>Users</h1>
        <hr/>
        <table class="table table-striped">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th>Actions</th>
          </tr>
          @foreach ($users as $user)
            <tr id="user-{{$user->id}}" >
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at}}</td>
              <td>
                <a href="/user/{{ $user->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                {{ Form::open(['url' => '/user/' . $user->id, 'method' => 'DELETE']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {{ Form::close() }}
              </td>
            </tr>
          @endforeach
        </table>
    </div>
@endsection