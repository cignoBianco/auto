
@extends('adminlte::page')

@section('title', 'Auto Show')

@section('content')
<style>.col-md-8 {
    flex: 0 0 66.6666666667%;
    max-width: 100% !important;
  }</style>
  
<div class="container"> <a href="create-user" class="btn btn-secondary shadow p-3 mb-3 rounded">Create new user</a>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="bg-dark text-white card-header  h4">
        {{ __('Users') }}
      </div>
      <div class="table-wrapper" style="overflow:auto">
        <table class="table table-striped shadow p-3 mb-5 bg-white rounded">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">edit</th>
              <th scope="col">delete</th>
              <th scope="col">Name</th>
              <th scope="col">Is Admin</th>
              <th scope="col">Email</th>
              <th scope="col">Garage</th>
              <th scope="col">Balance</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($users as $key => $user)
            <tr>
              <th scope="row">{{$key + 1}}</th>
              <th scope="row"><a class="btn btn-link" href='/admin_panel/update-user/{{$user->id}}'>edit</a></th>
              <th scope="row"><a class="btn btn-link" href='/admin_panel/delete-user/{{$user->id}}'>del</a></th>
              <td>{{$user->name}}</td>
              <td>{{$user->is_admin}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->garage}}</td>
              <td>{{$user->balance}}</td>
            </tr>
            @empty
                <p>No users</p>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop