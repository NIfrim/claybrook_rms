<form action = "{{route('admin.eventsAndNews.submit', ['type' => $subcategory, 'formType' => $formType])}}" method="post">
    <div class="card" id="animalFormCard">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            <div class="container-responsive">
                {{--Name--}}
                <div class="form-group row">
                    <label for="name" class="col-xl-2 col-form-label">{{ __(substr(ucfirst($subcategory), 0, -1).' name') }}</label>
        
                    <div class="col-xl-10">
                        <input  name = "name"
                                id = "name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{old('name') ?? $data['currentRow']['name'] ?? ''}}"
                                required autofocus />
            
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Title--}}
                <div class="form-group row">
                    <label for="title" class="col-xl-2 col-form-label">{{ __(substr(ucfirst($subcategory), 0, -1).' title') }}</label>
        
                    <div class="col-xl-10">
                        <input  name = "title"
                                id = "title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{old('title') ?? $data['currentRow']['title'] ?? ''}}"
                                required autofocus />
            
                        @error('title')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Short description--}}
                <div class="form-group row">
                    <label for="shortDescription" class="col-xl-2 col-form-label">{{ __('Short description') }}</label>
                    
                    <div class="col-xl-10">
                        <textarea name = "short_description"
                                  id = "shortDescription"
                                  class="form-control @error('shortDescription') is-invalid @enderror"
                                  required autofocus>{{old('short_description') ?? $data['currentRow']['short_description'] ?? ''}}</textarea>
                        
                        @error('shortDescription')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Long description--}}
                <div class="form-group row">
                    <label for="longDescription" class="col-xl-2 col-form-label">{{ __('Long description') }}</label>
                    
                    <div class="col-xl-10">
                        <textarea name = "long_description"
                                  id = "longDescription"
                                  class="form-control @error('longDescription') is-invalid @enderror"
                                  required autofocus>{{old('long_description') ?? $data['currentRow']['long_description'] ?? ''}}</textarea>
                        
                        @error('longDescription')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Main image--}}
                <div class="form-group row">
                    <label for="image" class="col-xl-2 col-form-label">{{ __('Banner image') }}</label>
                    
                    <div class="col-xl-10">
                        <div class="custom-file input-group">
                            <input type="file"
                                   class="custom-file-input @error('image') is-invalid @enderror"
                                   id="customFile"
                                   name="image"
                                   autofocus>
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                        </div>
                        
                        @error('image')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{url()->previous()}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submitType" class="btn btn-primary" value="category">Submit</button>
        </div>
    </div>
</form>