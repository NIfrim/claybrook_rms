<form action = "{{$route}}" method="post" enctype="multipart/form-data">
    <div class="card" id="zooDetailsFormCard">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            
            @if($formType === 'edit')
                {{--Add the id of the zoo--}}
                <input type = "number" name="id" value="{{$data->id}}" hidden readonly>
            @endif
            
            <div class="container-responsive">
                {{--Company Number--}}
                <div class="form-group row">
                    <label for="companyNumber" class="col-xl-2 col-form-label">{{ __('Company Number') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="companyNumber"
                            type="number"
                            class="form-control @error('companyNumber') is-invalid @enderror"
                            name="company_number"
                            maxlength="45"
                            value="{{old('company_number') ?? $data->company_number ?? ''}}"
                            required
                            autofocus
                        />
                        
                        @error('companyNumber')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Zoo name--}}
                <div class="form-group row">
                    <label for="name" class="col-xl-2 col-form-label">{{ __('Zoo Name') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="name"
                            type="text"
                            maxlength="45"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') ?? $data->name ?? ''}}"
                            required
                            autofocus
                        />
                        
                        @error('type')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                
                {{-- Zoo history --}}
                <div class="form-group row">
                    <label for="history" class="col-xl-2 col-form-label">{{ __('Zoo history/about') }}</label>
        
                    <div class="col-xl-10">
                        <textarea name = "history"
                                  id = "history"
                                  class="form-control @error('history') is-invalid @enderror"
                                  required autofocus>{{old('history') ?? $data->history ?? ''}}</textarea>
            
                        @error('history')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Zoo map image--}}
                <div class="form-group row">
                    <label for="mapImage" class="col-xl-2 col-form-label">{{ __('Zoo map image') }}</label>
                    
                    <div class="col-xl-10">
                        <div class="custom-file input-group">
                            <input type="file"
                                   class="custom-file-input @error('mapImage') is-invalid @enderror"
                                   id="mapImage"
                                   name="map_image"
                                   accept=".jpeg, .jpg, .png"
                                   autofocus
                                   multiple
                            />
                            <label class="custom-file-label" for="customFile">Choose One image</label>
                        </div>
                        
                        @error('mapImage')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    
                    @if(isset($data->map_image))
                        <div class="row col-md-10 offset-xl-2 p-3">
                                
                            <div class="col-md-3 col-sm-4">
                                <img src = "{{'/images/zoo/'.$data->map_image}}" class="img-fluid img-thumbnail" alt = "Zoo map image">
                            </div>
                          
                        </div>
                    @endif
                    
                </div>
    
                {{--Zoo slider images--}}
                <div class="form-group row">
                    <label for="images" class="col-xl-2 col-form-label">{{ __('Carousel Images') }}</label>
        
                    <div class="col-xl-10">
                        <div class="custom-file input-group">
                            <input type="file"
                                   class="custom-file-input @error('images') is-invalid @enderror"
                                   id="images"
                                   name="images[]"
                                   accept=".jpeg, .jpg, .png"
                                   autofocus
                                   multiple
                            />
                            <label class="custom-file-label" for="customFile">Choose Images</label>
                        </div>
            
                        @error('images')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
        
                    @if(isset($data->images))
                        <div class="row col-md-10 offset-xl-2 p-3">
                            @foreach($data->images as $image)
                    
                                <div class="col-md-3 col-sm-4">
                                    <img src = "{{'/images/zoo/'.$image}}" class="img-fluid img-thumbnail" alt = "Zoo map image">
                                </div>
                
                            @endforeach
                        </div>
                    @endif
                    
                </div>
            
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.attractions.list')}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submit-animal-details" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>