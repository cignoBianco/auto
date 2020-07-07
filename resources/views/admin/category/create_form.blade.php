


@extends('adminlte::page')

@section('title', 'Auto Show')

@section('content')
<style>.col-md-8 {
    flex: 0 0 66.6666666667%;
    max-width: 100% !important;
  }</style>
  

   <div class="bg-dark text-white card-header  h4">{{ __('Create category') }}</div>
                    <form method="POST" action="/admin_panel/create-category" enctype="multipart/form-data">
                        @csrf
                        <div class="table-wrapper" style="overflow:auto">
                        <table class="table table-striped shadow p-3 bg-white rounded">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Specifications</th>
                                <th scope="col">Section_id</th>
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
                                    <input id="specifications" type="text" class="form-control @error('specifications') is-invalid @enderror" name="specifications" required autocomplete="specifications" autofocus>
        
                                    @error('specifications')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror    
                                </td>
                                <td>
                                    <select id="section_id" name="section_id" class="custom-select mr-sm-2">
                                        @forelse ($sections as $section)
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                        @empty
                                            <p>no sections</p>
                                        @endforelse
                                    </select>
                                    </td>
                                <td>
                                    <input id="priority" type="number" min="0" max="100" class="form-control @error('priority') is-invalid @enderror" name="priority" required autocomplete="specifications" autofocus>
                                    @error('priority')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </td>
                                <td>
                                    <input id="show" type="checkbox" class="mx-auto form-control @error('show') is-invalid @enderror" name="show" autofocus>
                                    @error('show')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            
                                @enderror
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="main_picture" name="main_picture">
                                          <label class="custom-file-label" for="inputGroupFile01">Choose</label>
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
                                    {{ __('Create category') }}
                                </button>
                    </form>
                


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop