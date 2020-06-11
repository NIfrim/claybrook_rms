<form action = "{{$route}}" method="post" enctype="multipart/form-data">
    <div class="card" id="attractionFormCard">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            
            @if($formType === 'edit')
                {{--Add the id of the attraction--}}
                <input type = "number" name="id" value="{{$data['currentRow']['id']}}" hidden readonly>
            @endif
            
            {{--Add the default zoo id--}}
            <input type = "number" id="zooId" name="zoo_id" value="{{$data['currentRow']['zoo_id'] ?? $data['zooId']}}" hidden readonly>
            
            <div class="container-responsive">
                {{--Attraction Name--}}
                <div class="form-group row">
                    <label for="name" class="col-xl-2 col-form-label">{{ __('Attraction Name') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="name"
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            maxlength="45"
                            value="{{old('name') ?? $data['currentRow']['name'] ?? ''}}"
                            required
                            autofocus
                        />
                        
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Attraction Type--}}
                <div class="form-group row">
                    <label for="type" class="col-xl-2 col-form-label">{{ __('Attraction Type') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="type"
                            list="typesList"
                            type="text"
                            maxlength="45"
                            class="form-control @error('type') is-invalid @enderror"
                            name="type"
                            value="{{ old('type') ?? $data['currentRow']['type'] ?? ''}}"
                            required
                            autofocus
                        />
    
                        <datalist id="typesList">
                            @foreach($data['attractionTypes'] as $attractionType)
                                <option value = "{{$attractionType}}">{{ucfirst(strtolower($attractionType))}}</option>
                            @endforeach
                        </datalist>
                        
                        @error('type')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Attraction for--}}
                <div class="form-group row">
                    <label for="for" class="col-xl-2 col-form-label">{{ __('Suitable for') }}</label>
        
                    <div class="col-xl-10">
                        <select name = "for" id = "for" class="form-control @error('for') is-invalid @enderror" required autofocus>
                            <option value = "" {{old('for') !== '' | isset($data['currentRow']) && isset($data['currentRow']['for']) ? '' : 'selected'}}>Select</option>
                            <option value = "ANYONE" {{old('for') === 'ANYONE' | isset($data['currentRow']) && isset($data['currentRow']['for']) && $data['currentRow']['for'] === 'ANYONE' ? 'selected' : ''}}>Anyone</option>
                            <option value = "ADULTS" {{old('for') === 'ADULTS' | isset($data['currentRow']) && isset($data['currentRow']['for']) && $data['currentRow']['for'] === 'ADULTS' ? 'selected' : ''}}>Adults</option>
                            <option value = "CHILDREN" {{old('for') === 'CHILDREN' | isset($data['currentRow']) && isset($data['currentRow']['for']) && $data['currentRow']['for'] === 'CHILDREN' ? 'selected' : ''}}>Children</option>
                        </select>
            
                        @error('for')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Attraction intensity--}}
                <div class="form-group row">
                    <label for="rideIntensity" class="col-xl-2 col-form-label">{{ __('Ride intensity') }}</label>
        
                    <div class="col-xl-10">
                        <select name = "ride_intensity" id = "rideIntensity" class="form-control @error('rideIntensity') is-invalid @enderror" required autofocus>
                            <option value = "" {{old('ride_intensity') !== '' | isset($data['currentRow']) && isset($data['currentRow']['ride_intensity']) ? '' : 'selected'}}>Select</option>
                            <option value = "NIGHTMARE" {{old('ride_intensity') === 'NIGHTMARE' | isset($data['currentRow']) && isset($data['currentRow']['ride_intensity']) && $data['currentRow']['ride_intensity'] === 'NIGHTMARE' ? 'selected' : ''}}>Nightmare</option>
                            <option value = "HIGH" {{old('ride_intensity') === 'HIGH' | isset($data['currentRow']) && isset($data['currentRow']['ride_intensity']) && $data['currentRow']['ride_intensity'] === 'HIGH' ? 'selected' : ''}}>High</option>
                            <option value = "MEDIUM" {{old('ride_intensity') === 'MEDIUM' | isset($data['currentRow']) && isset($data['currentRow']['ride_intensity']) && $data['currentRow']['ride_intensity'] === 'MEDIUM' ? 'selected' : ''}}>Medium</option>
                            <option value = "LOW" {{old('ride_intensity') === 'LOW' | isset($data['currentRow']) && isset($data['currentRow']['ride_intensity']) && $data['currentRow']['ride_intensity'] === 'LOW' ? 'selected' : ''}}>Low</option>
                        </select>
            
                        @error('rideIntensity')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Minimum Height--}}
                <div class="form-group row">
                    <label for="minimumHeight" class="col-xl-2 col-form-label">{{ __('Minimum height') }}</label>
        
                    <div class="col-xl-10 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">cm</span>
                        </div>
                        <input
                            id="minimumHeight"
                            type="number"
                            class="form-control @error('minimumHeight') is-invalid @enderror"
                            name="minimum_height"
                            maxlength="45"
                            value="{{old('minimum_height') ?? $data['currentRow']['minimum_height'] ?? ''}}"
                            required
                            autofocus
                        />
            
                        @error('minimumHeight')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Short description--}}
                <div class="form-group row">
                    <label for="shortDescription" class="col-xl-2 col-form-label">{{ __('Short description') }}</label>
                    
                    <div class="col-xl-10 input-group">
                        <textarea name = "short_description"
                                  id = "shortDescription"
                                  class="form-control @error('shortDescription') is-invalid @enderror"
                                  maxlength="255"
                                  autofocus>{{ old('short_description') ?? $data['currentRow']['short_description'] ?? '' }}</textarea>
                        
                        @error('shortDescription')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Long description--}}
                <div class="form-group row">
                    <label for="longDescription" class="col-xl-2 col-form-label">{{ __('Long description') }}</label>
        
                    <div class="col-xl-10 input-group">
                        <textarea name = "long_description"
                                  id = "longDescription"
                                  class="form-control @error('longDescription') is-invalid @enderror"
                                  maxlength="500"
                                  autofocus>{{ old('long_description') ?? $data['currentRow']['long_description'] ?? '' }}</textarea>
            
                        @error('longDescription')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Images--}}
                <div class="form-group row">
                    <label for="images" class="col-xl-2 col-form-label">{{ __('Attraction images') }}</label>
        
                    <div class="col-xl-10">
                        <div class="custom-file input-group">
                            <input type="file"
                                   class="custom-file-input @error('images') is-invalid @enderror"
                                   id="images"
                                   name="files[]"
                                   accept=".jpeg, .jpg, .png"
                                   autofocus
                                   multiple
                            />
                            <label class="custom-file-label" for="customFile">Choose Image/s</label>
                        </div>
            
                        @error('images')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
        
                    @if(isset($data['currentRow']->images))
                        <div class="row col-md-10 offset-xl-2 p-3">
                            @foreach($data['currentRow']->images as $image)
                    
                                <div class="col-md-3 col-sm-4">
                                    <img src = "{{'/images/attractions/'.$image}}" class="img-fluid img-thumbnail" alt = "Attraction Image">
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