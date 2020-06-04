<form action = "{{$route}}" method="post">
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
                
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.attractions.list', ['type' => $subcategory ?? $category])}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submit-animal-details" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>