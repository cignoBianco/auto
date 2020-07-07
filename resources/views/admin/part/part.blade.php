
@extends('adminlte::page')

@section('title', 'Auto Show')

@section('content')
<style>.col-md-8 {
    flex: 0 0 66.6666666667%;
    max-width: 100% !important;
  }</style>

<div class="container"> <a href="create-part" class="btn btn-secondary shadow p-3 mb-3 rounded">Create new part</a>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="bg-dark text-white card-header h4">
        {{ __('Parts') }}
      </div>
      <div class="table-wrapper" style="overflow:auto">
        <table class="table table-striped shadow p-3 mb-5 bg-white rounded">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">edit</th>
              <th scope="col">delete</th>
              <th scope="col">Name</th>

              <th scope="col">Article</th>
              <th scope="col">Description</th>
              <th scope="col">Producer</th>
              <th scope="col">Price</th>
              <th scope="col">Producer price</th>

              <th scope="col">Specifications</th>
              <th scope="col">Category</th>
              <th scope="col">Priority</th>
              <th scope="col">Available</th>
              <th scope="col">Main_picture</th>
              <th scope="col">SEO URL</th>
              <th scope="col">Meta-tag title</th>
              <th scope="col">Meta-tag description</th>
              <th scope="col">Meta-tag keywords</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($parts as $key => $part)
            <tr>
              <th scope="row">{{$key + 1}}</th>
              <th scope="row"><a class="btn btn-link" href='/admin_panel/update-part/{{$part->id}}'>edit</a></th>
              <th scope="row"><a class="btn btn-link" href='/admin_panel/delete-part/{{$part->id}}'>del</a></th>
              <td>{{$part->name}}</td>

              <td>{{$part->article}}</td>
              <td>{{$part->description}}</td>
              <td>{{$part->producer}}</td>
              <td>{{$part->price}}</td>
              <td>{{$part->producer_price}}</td>

              <td>{{$part->specifications}}</td>
              <td>{{$part->category}}</td>
              <td>{{$part->priority}}</td>
              <td>@if($part->available) true @else false @endif</td>
              <td><img src="http://localhost:8000/{{$part->main_picture}}" alt="" style="max-width:100px"></td>
              <td>{{$part->seo_url}}</td>
              <td>{{$part->meta_title}}</td>
              <td>{{$part->meta_description}}</td>
              <td>{{$part->meta_keywords}}</td>
            </tr>
            @empty
                <p>No parts</p>
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