
@extends('adminlte::page')

@section('title', 'Auto Show')

@section('content')
<style>.col-md-8 {
    flex: 0 0 66.6666666667%;
    max-width: 100% !important;
  }</style>
 
   <div class="bg-dark text-white card-title h4">{{ __('Create provider') }}</div>
        <form method="POST" action="/admin_panel/create-provider" enctype="multipart/form-data">
                @csrf
            <div class="table-wrapper" style="overflow:auto">
            <table class="table table-striped shadow p-3 bg-white rounded">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Name</th>

                <th scope="col">Email</th>
                <<th scope="col">Assessment</th>
                <th scope="col">Description</th>
              <th scope="col">Orders completed at time</th>
              <th scope="col">Orders not completed at time</th>
              <th scope="col">Orders not completed</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    <input  id="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </td>

                <td>
                    <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </td>


                <td>
                    <input id="assessment"  type="number" class="form-control @error('assessment') is-invalid @enderror" name="assessment" required autocomplete="assessment" autofocus>

                    @error('assessment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </td>

                <td>
                    <input  id="description"  type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </td>

                <td>
                    <input  id="orders_completed_at_time_amount" type="number" min="0" class="form-control @error('orders_completed_at_time_amount') is-invalid @enderror" name="orders_completed_at_time_amount" required autocomplete="orders_completed_at_time_amount" autofocus>

                    @error('orders_completed_at_time_amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </td>
                <td>
                    <input  id="orders_not_completed_at_time_amount" type="number" min="0" class="form-control @error('orders_not_completed_at_time_amount') is-invalid @enderror" name="orders_not_completed_at_time_amount" required autocomplete="orders_not_completed_at_time_amount" autofocus>

                    @error('orders_not_completed_at_time_amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </td>
                <td>
                    <input  id="orders_not_completed_amount" type="number" min="0" class="form-control @error('orders_not_completed_amount') is-invalid @enderror" name="orders_not_completed_amount" required autocomplete="orders_not_completed_amount" autofocus>

                    @error('orders_not_completed_amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </td>

                </tr>
            </tbody>
            </table> </div>
                
            <button type="submit" class="btn btn-primary btn btn-secondary shadow p-3 mb-3 rounded">
                    {{ __('Create provider') }}
                </button>
   
                {{ csrf_field() }}
                
       

            </div>
            
            </form>
      

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop