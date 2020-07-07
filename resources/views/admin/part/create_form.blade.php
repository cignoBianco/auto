
@extends('adminlte::page')

@section('title', 'Auto Show')

@section('content')
<style>.col-md-8 {
    flex: 0 0 66.6666666667%;
    max-width: 100% !important;
  }</style>
  
   <form method="POST" action="/admin_panel/create-part-excel" enctype="multipart/form-data">
   {{ csrf_field() }}
   <div class="input-group mb-3">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="main_picture_excel" name="custom-file-input" id="custom-file-input">
            <label class="custom-file-label" for="main_picture_excel">excel file:</label>
        </div>
        <div class="custom-file">
            <input required type="file" class="form-control" id="images" name="images[]" placeholder="address" multiple>
            <label class="custom-file-label" for="images">images:</label>
        </div>

    </div>
    <button type="submit" class="btn btn-primary btn btn-secondary shadow p-3 mb-3 rounded">
        {{ __('Create part from DB') }}
    </button>
   </form>

   <div class="bg-dark text-white card-header  h4">{{ __('Create part') }}</div> 
    <form method="POST" action="/admin_panel/create-part" enctype="multipart/form-data">
        @csrf
        <div class="table-wrapper" style="overflow:auto">
        <table class="table table-striped shadow p-3 bg-white rounded">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Name</th>

                <th scope="col">Article</th>
                <th scope="col">Number</th>
                <th scope="col">Description</th>

                <th scope="col">Specifications</th>
                <th scope="col">Category_id</th>

                <th scope="col">Producer</th>
                <th scope="col">Price</th>
                <th scope="col">Producer_price</th>
                <th scope="col">Status_id</th>
                

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
                    <input id="article" type="text" class="form-control @error('article') is-invalid @enderror" name="article" required autocomplete="article" autofocus>

                    @error('article')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </td>

                <td>
                    <input id="number" type="number" min="0" step="0.01" class="form-control @error('price') is-invalid @enderror" name="number" required autocomplete="number" autofocus>
                    @error('number')
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
                    <input id="producer" type="text" class="form-control @error('producer') is-invalid @enderror" name="producer" required autocomplete="producer" autofocus>

                    @error('producer')
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
                    <input id="producer_price" type="number" step="0.01" min="0" class="form-control @error('producer_price') is-invalid @enderror" name="producer_price" required autocomplete="producer_price" autofocus>
                    @error('producer_price')
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
                    <input id="priority" type="number" min="0" max="100" class="form-control @error('priority') is-invalid @enderror" name="priority" required autocomplete="priority" autofocus>

                    @error('priority')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
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
                    {{ __('Create part') }}
                </button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop