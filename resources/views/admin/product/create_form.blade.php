
@extends('adminlte::page')

@section('title', 'Auto Show')

@section('content')
<style>.col-md-8 {
    flex: 0 0 66.6666666667%;
    max-width: 100% !important;
  }</style>
  
   <div class="bg-dark text-white card-header  h4">{{ __('Create part') }}</div>
    <form method="POST" action="/admin_panel/create-product" enctype="multipart/form-data">
        @csrf
        <div class="table-wrapper" style="overflow:auto">
        <table class="table table-striped shadow p-3 bg-white rounded">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Name</th>

                <th scope="col">Description</th>
                <th scope="col">Specifications</th>
                <th scope="col">Category_id</th>

                <th scope="col">Points</th>
                <th scope="col">Price</th>
                <th scope="col">Performer_price</th>
                <th scope="col">Price_in_points</th>
                <th scope="col">Status_id</th>

                <th scope="col">Available</th>
                <th scope="col">Main_picture</th>
                <th scope="col">SEO URL</th>
                <th scope="col">Meta-tag title</th>
                <th scope="col">Meta-tag description</th>
                <th scope="col">Meta-tag keywords</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </td>

                <td>
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </td>
                
                <td>
                    <input id="specifications" type="text" class="form-control @error('specifications') is-invalid @enderror" name="specifications" required autocomplete="specifications" autofocus>

                    @error('specifications')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </td>

                <td>
                    <select id="category_id" name="category_id" class="custom-select mr-sm-2">
                        @forelse ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @empty
                            <p>no categories</p>
                        @endforelse
                    </select>
                </td>

                <td>
                    <input id="points" type="number" min="0" class="form-control @error('points') is-invalid @enderror" name="points" required autocomplete="points" autofocus>

                    @error('points')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </td>

                <td>
                    <input id="price" type="number" min="0" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price" autofocus>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </td>

                <td>
                    <input id="performer_price" type="number" step="0.01" min="0" class="form-control @error('performer_price') is-invalid @enderror" name="performer_price" required autocomplete="performer_price" autofocus>
                    @error('performer_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </td>

                <td>
                    <input id="price_in_points" type="number" min="0" step="0.01" class="form-control @error('price_in_points') is-invalid @enderror" name="price_in_points" required autocomplete="price_in_points" autofocus>
                    @error('price_in_points')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </td>

                <td>
                    <select id="status_id" name="status_id" class="custom-select mr-sm-2">
                        @forelse ($statuses as $status)
                        <option value="{{$status->id}}">{{$status->name}}</option>
                        @empty
                            <p>no statuses</p>
                        @endforelse
                    </select>
                </td>
                
                <td>
                    <input id="available" type="checkbox" class="mx-auto form-control @error('available') is-invalid @enderror" name="available" autofocus>
                    @error('available')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                @enderror
                </td>
                <td>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="main_picture" name="main_picture">
                            <label class="custom-file-label" for="inputGroupFile01"></label>
                        </div>
                        </div>
                        
                    @error('main_picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror 
                </td>
                <td>
                    <input id="seo_url" type="text" class="form-control @error('seo_url') is-invalid @enderror" name="seo_url"  required autocomplete="seo_url" autofocus>

                    @error('seo_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </td>
                <td>
                    <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" required autocomplete="meta_title" autofocus>

                    @error('meta_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </td>
                <td>
                    <input id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" required autocomplete="meta_description" autofocus>

                    @error('meta_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </td>
                <td>
                    <input id="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords"  required autocomplete="meta_keywords" autofocus>

                    @error('meta_keywords')
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
                
            <button type="submit" class="btn btn-primary btn btn-secondary shadow p-3 mb-3 rounded">
                    {{ __('Create product') }}
                </button>
    </form>
                

  @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop