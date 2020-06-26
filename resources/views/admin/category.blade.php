@extends('layouts.app')

@section('content')
<div class="container">
    <a href="create-category" class="btn btn-secondary shadow p-3 mb-3 rounded">Create new category</a>
<div class="table-wrapper mx-md-n5" style="overflow:auto">

<table class="table table-striped shadow p-3 mb-5 bg-white rounded">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
        <th scope="col">Name</th>
        <th scope="col">Specifications</th>
        <th scope="col">Section</th>
        <th scope="col">Priority</th>
        <th scope="col">Show</th>
        <th scope="col">Main_picture</th>
        <th scope="col">SEO URL</th>
        <th scope="col">Meta-tag title</th>
        <th scope="col">Meta-tag description</th>
        <th scope="col">Meta-tag keywords</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $key => $category)
      <tr>
        <th scope="row">{{$key + 1}}</th>
        <th scope="row"><a class="btn btn-link" href='/admin_panel/update-category/{{$category->id}}'>edit</a></th>
        <th scope="row"><a class="btn btn-link" href='/admin_panel/delete-category/{{$category->id}}'>del</a></th>
        <td>{{$category->name}}</td>
        <td>{{$category->specifications}}</td>
        <td>{{$category->section}}</td>
        <td>{{$category->priority}}</td>
        <td>{{$category->show}}</td>
        <td><img src="http://localhost:8000/{{$category->main_picture}}" alt="" style="max-width:100px"></td>
        <td>{{$category->seo_url}}</td>
        <td>{{$category->meta_title}}</td>
        <td>{{$category->meta_description}}</td>
        <td>{{$category->meta_keywords}}</td>
      </tr>
      @empty
          <p>No category</p>
      @endforelse
    </tbody>
  </table>
</div>
</div>
@endsection