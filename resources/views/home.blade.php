@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row justify-content-center" style="overflow:auto">
            
        <div class="col-md-8 ">
            <div class="card shadow mb-3 rounded">
                <div class="card-header bg-dark text-white card-header card-title h4">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <a  class="btn btn-secondary shadow p-3 mb-3 rounded" href="admin_panel">To Admin Panel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
