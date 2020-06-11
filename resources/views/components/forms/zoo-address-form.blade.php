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
                
                @foreach($data->address as $name=>$value)
                    
                    @switch($name)
                        
                        @case('city')
                        {{-- City --}}
                        <div class="form-group row">
                            <label for="{{$name}}" class="col-xl-2 col-form-label">{{ __('City') }}</label>
                            
                            <div class="col-xl-10">
                                <input
                                    id="{{$name}}"
                                    type="text"
                                    maxlength="45"
                                    class="form-control @error('{{$name}}') is-invalid @enderror"
                                    name="{{$name}}"
                                    value="{{ old($name) ?? $value ?? ''}}"
                                    required
                                    autofocus
                                />
                                
                                @error('{{$name}}')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        @break
                        
                        @case('county')
                        {{-- County --}}
                        <div class="form-group row">
                            <label for="{{$name}}" class="col-xl-2 col-form-label">{{ __('County') }}</label>
                            
                            <div class="col-xl-10">
                                <input
                                    id="{{$name}}"
                                    type="text"
                                    maxlength="45"
                                    class="form-control @error('{{$name}}') is-invalid @enderror"
                                    name="{{$name}}"
                                    value="{{ old($name) ?? $value ?? ''}}"
                                    required
                                    autofocus
                                />
                                
                                @error('{{$name}}')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        @break
                        
                        @case('postcode')
                        {{-- Postcode --}}
                        <div class="form-group row">
                            <label for="{{$name}}" class="col-xl-2 col-form-label">{{ __('Postcode') }}</label>
                            
                            <div class="col-xl-10">
                                <input
                                    id="{{$name}}"
                                    type="text"
                                    maxlength="10"
                                    class="form-control @error('{{$name}}') is-invalid @enderror"
                                    name="{{$name}}"
                                    value="{{ old($name) ?? $value ?? ''}}"
                                    required
                                    autofocus
                                />
                                
                                @error('{{$name}}')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        @break
                        
                        @case('road_name')
                        {{-- Road --}}
                        <div class="form-group row">
                            <label for="{{$name}}" class="col-xl-2 col-form-label">{{ __('Road name') }}</label>
                            
                            <div class="col-xl-10">
                                <input
                                    id="{{$name}}"
                                    type="text"
                                    maxlength="45"
                                    class="form-control @error('{{$name}}') is-invalid @enderror"
                                    name="{{$name}}"
                                    value="{{ old($name) ?? $value ?? ''}}"
                                    required
                                    autofocus
                                />
                                
                                @error('{{$name}}')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        @break
                        
                        @case('building_number')
                        {{-- Building number --}}
                        <div class="form-group row">
                            <label for="{{$name}}" class="col-xl-2 col-form-label">{{ __('Building number') }}</label>
                            
                            <div class="col-xl-10">
                                <input
                                    id="{{$name}}"
                                    type="text"
                                    maxlength="45"
                                    class="form-control @error('{{$name}}') is-invalid @enderror"
                                    name="{{$name}}"
                                    value="{{ old($name) ?? $value ?? ''}}"
                                    required
                                    autofocus
                                />
                                
                                @error('{{$name}}')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        @break
                    
                    @endswitch
                
                @endforeach
            
            </div>
        </div>
        
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.zoo.manage', ['type' => 'details', 'id' => 1])}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submit-zoo-address" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>