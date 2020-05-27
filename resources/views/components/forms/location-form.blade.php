<form action = "{{route('admin.locations.submit', ['type' => $subcategory, 'formType' => $formType])}}" method="post">
    <div class="card" id="animalFormCard">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            {{--Add the type of animal based on the subcategory--}}
            <input type = "text" id="locationType" name="location_type" value="{{$data['currentRow']['location_type'] ?? $data['type']}}" hidden readonly>
            {{--Add the default zoo id--}}
            <input type = "number" id="zooId" name="zoo_id" value="{{$data['currentRow']['zoo_id'] ?? $data['zooId']}}" hidden readonly>
            
            <div class="container-responsive">
                {{--Generated or current id--}}
                <div class="form-group row">
                    <label for="generatedId" class="col-xl-2 col-form-label">{{ __($formType === 'new' ? 'Generated id' : 'ID') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="generatedId"
                            type="text"
                            class="form-control @error('generatedId') is-invalid @enderror"
                            name="id"
                            value="{{old('id') ?? $data['generatedId'] ?? $data['currentRow']['id'] ?? ''}}"
                            required
                            readonly
                        />
                        
                        @error('generatedId')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Location name--}}
                <div class="form-group row">
                    <label for="locationName" class="col-xl-2 col-form-label">{{ __('Location Name') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="locationName"
                            type="text"
                            class="form-control @error('locationName') is-invalid @enderror"
                            name="location_name"
                            value="{{old('location_name') ?? $data['currentRow']['location_name'] ?? ''}}"
                            required
                            autofocus
                        />
                        
                        @error('locationName')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Vacant--}}
                <div class="form-group row">
                    <label for="vacant" class="col-xl-2 col-form-label">{{ __('Vacant') }}</label>
                    
                    <div class="col-xl-10">
                        <select id="vacant"
                                type="text"
                                class="form-control @error('locationName') is-invalid @enderror"
                                name="vacant"
                                value="{{old('vacant') ?? $data['currentRow']['vacant'] ?? ''}}"
                                required
                                autofocus>
                            <option value = "" {{old('vacant') === 'Y' | old('vacant') === 'N' | isset($data['currentRow']) && isset($data['currentRow']['vacant'])  ? '' : 'selected'}}>Select</option>
                            <option value = "Y" {{old('vacant') === 'Y' | isset($data['currentRow']) && isset($data['currentRow']['vacant']) && $data['currentRow']['vacant'] === 'Y' ? 'selected' : ''}}>Yes</option>
                            <option value = "N" {{old('vacant') === 'N' | isset($data['currentRow']) && isset($data['currentRow']['vacant']) && $data['currentRow']['vacant'] === 'N' ? 'selected' : ''}}>No</option>
                        </select>
                        
                        @error('vacant')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Surface Area--}}
                <div class="form-group row">
                    <label for="surfaceArea" class="col-xl-2 col-form-label">{{ __('Surface Area') }}</label>
                    
                    <div class="col-xl-10 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ft<sup>2</sup></span>
                        </div>
                        
                        <input
                            id="surfaceArea"
                            type="number"
                            max="99999"
                            class="form-control @error('surfaceArea') is-invalid @enderror"
                            name="surface_area"
                            value="{{old('surface_area') ?? $data['currentRow']['surface_area'] ?? ''}}"
                            autofocus
                        />
                        
                        @error('surfaceArea')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                
                {{--Description--}}
                <div class="form-group row">
                    <label for="locationDescription" class="col-xl-2 col-form-label">{{ __('Description') }}</label>
                    
                    <div class="col-xl-10">
                        <textarea name = "location_description"
                                  id = "locationDescription"
                                  class="form-control @error('locationDescription') is-invalid @enderror"
                                  autofocus >{{old('location_description') ?? $data['currentRow']['location_description'] ?? ''}}</textarea>
                        
                        @error('locationDescription')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            
            
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.locations.list', ['type' => $subcategory ?? $category])}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submit-animal-details" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>