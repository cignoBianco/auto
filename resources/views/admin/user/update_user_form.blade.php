
@extends('adminlte::page')

@section('title', 'Auto Show')

@section('content')
<style>.col-md-8 {
    flex: 0 0 66.6666666667%;
    max-width: 100% !important;
  }</style>
  
   
   <div class="bg-dark text-white card-title h4">{{ __('Update user') }}</div>
        <form method="POST" action="/admin_panel/update-user/{{$user->id}}" enctype="multipart/form-data">
                @csrf
            <div class="table-wrapper" style="overflow:auto">
            <table class="table table-striped shadow p-3 bg-white rounded">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Name</th>

                <th scope="col">Is admin</th>
                <th scope="col">Email</th>
                <th scope="col">Garage</th>

                <th scope="col">Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    <input id="name" value="{{$user->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </td>

                <td>
                    <input value="{{$user->is_admin}}" id="is_admin" type="checkbox" class="mx-auto form-control @error('is_admin') is-invalid @enderror" name="is_admin" autofocus>
                    @error('is_admin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                @enderror
                </td>

                <td>
                    <input value="{{$user->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </td>

                <td>
                    <select value="{{$user->garage_id}}" id="garage_id" name="garage_id" class="custom-select mr-sm-2">
                        @forelse ($garages as $garage)
                        <option value="{{$garage->id}}">{{$garage->brand}}</option>
                        @empty
                            <p>no garages</p>
                        @endforelse
                    </select>
                </td>

                <td>
                    <input value="{{$user->balance}}" id="balance" type="number" min="0" step="0.01" class="form-control @error('balance') is-invalid @enderror" name="balance" required autocomplete="balance" autofocus>

                    @error('balance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </td>

                </tr>
            </tbody>
            </table>
                {{ csrf_field() }}
                
       

                </div>
                {{ csrf_field() }}<button type="submit" class="btn btn-primary btn btn-secondary shadow p-3 mb-3 rounded">
                            {{ __('Update user') }}
            </button>
            </div>
            
            </form>

            @extends('adminlte::page')


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop