<form action = "{{$route}}" method="post">
    <div class="card">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            {{--Add the current record id--}}
            <input type = "number" id="id" name="id" value="{{$data['currentRow']['id'] ?? $data['id']}}" hidden required readonly>
            {{--Add the default zoo id--}}
            <input type = "number" id="zooId" name="zoo_id" value="{{$data['currentRow']['zoo_id'] ?? $data['zooId']}}" hidden required readonly>
            
            <div class="container-responsive">
                
                {{--Personal title--}}
                <div class="form-group row">
                    <label for="title" class="col-xl-2 col-form-label">{{ __('Title') }}</label>
                    
                    <div class="col-xl-10">
                        <select id="title"
                                type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                name="title"
                                required
                                autofocus>
                            <option value = "" {{old('title') !== '' | isset($data['currentRow']) && isset($data['currentRow']['title'])  ? '' : 'selected'}}>Select</option>
                            <option value = "Mr." {{old('title') === 'Mr.' | isset($data['currentRow']) && isset($data['currentRow']['title']) && $data['currentRow']['title'] === 'Mr.' ? 'selected' : ''}}>Mr.</option>
                            <option value = "Ms." {{old('title') === 'Ms.' | isset($data['currentRow']) && isset($data['currentRow']['title']) && $data['currentRow']['title'] === 'Ms.' ? 'selected' : ''}}>Ms.</option>
                            <option value = "Mrs." {{old('title') === 'Mrs.' | isset($data['currentRow']) && isset($data['currentRow']['title']) && $data['currentRow']['title'] === 'Mrs.' ? 'selected' : ''}}>Mrs.</option>
                            <option value = "Miss." {{old('title') === 'Miss.' | isset($data['currentRow']) && isset($data['currentRow']['title']) && $data['currentRow']['title'] === 'Miss.' ? 'selected' : ''}}>Miss.</option>
                            <option value = "Dr." {{old('title') === 'Dr.' | isset($data['currentRow']) && isset($data['currentRow']['title']) && $data['currentRow']['title'] === 'Dr.' ? 'selected' : ''}}>Dr.</option>
                            <option value = "Prof." {{old('title') === 'Prof.' | isset($data['currentRow']) && isset($data['currentRow']['title']) && $data['currentRow']['title'] === 'Prof.' ? 'selected' : ''}}>Prof.</option>
                        </select>
                        
                        @error('title')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--First Name--}}
                <div class="form-group row">
                    <label for="firstName" class="col-xl-2 col-form-label">{{ __('First Name') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="firstName"
                            type="text"
                            maxlength="45"
                            class="form-control @error('firstName') is-invalid @enderror"
                            name="first_name"
                            value="{{old('first_name') ?? $data['currentRow']['first_name'] ?? ''}}"
                            required
                            autofocus
                        />
                        
                        @error('firstName')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Last Name--}}
                <div class="form-group row">
                    <label for="lastName" class="col-xl-2 col-form-label">{{ __('Last Name') }}</label>
        
                    <div class="col-xl-10">
                        <input
                            id="lastName"
                            type="text"
                            maxlength="45"
                            class="form-control @error('lastName') is-invalid @enderror"
                            name="last_name"
                            value="{{old('last_name') ?? $data['currentRow']['last_name'] ?? ''}}"
                            required
                            autofocus
                        />
            
                        @error('lastName')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Job title--}}
                <div class="form-group row">
                    <label for="job" class="col-xl-2 col-form-label">{{ __('Current Job') }}</label>
        
                    <div class="col-xl-10">
                        <input
                            id="job"
                            type="text"
                            maxlength="45"
                            class="form-control @error('job') is-invalid @enderror"
                            name="job_title"
                            value="{{old('job_title') ?? $data['currentRow']['job_title'] ?? ''}}"
                            required
                            autofocus
                        />
            
                        @error('job')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Email--}}
                <div class="form-group row">
                    <label for="email" class="col-xl-2 col-form-label">{{ __('Email') }}</label>
        
                    <div class="col-xl-10">
                        <input
                            id="email"
                            type="email"
                            maxlength="255"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{old('email') ?? $data['currentRow']['email'] ?? ''}}"
                            required
                            autofocus
                        />
            
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Primary Contact--}}
                <div class="form-group row">
                    <label for="primaryContact" class="col-xl-2 col-form-label">{{ __('Primary Contact') }}</label>
        
                    <div class="col-xl-10">
                        <input
                            id="primaryContact"
                            type="text"
                            maxlength="15"
                            class="form-control @error('primaryContact') is-invalid @enderror"
                            name="primary_contact_number"
                            value="{{old('primary_contact_number') ?? $data['currentRow']['primary_contact_number'] ?? ''}}"
                            required
                            autofocus
                        />
            
                        @error('primaryContact')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Secondary Contact--}}
                <div class="form-group row">
                    <label for="secondaryContact" class="col-xl-2 col-form-label">{{ __('Secondary Contact') }}</label>
        
                    <div class="col-xl-10">
                        <input
                            id="secondaryContact"
                            type="text"
                            maxlength="15"
                            class="form-control @error('secondaryContact') is-invalid @enderror"
                            name="secondary_contact_number"
                            value="{{old('secondary_contact_number') ?? $data['currentRow']['secondary_contact_number'] ?? ''}}"
                            autofocus
                        />
            
                        @error('secondaryContact')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Building--}}
                <div class="form-group row">
                    <label for="building" class="col-xl-2 col-form-label">{{ __('Building name/number') }}</label>
        
                    <div class="col-xl-10">
                        <input
                            id="building"
                            type="text"
                            maxlength="45"
                            class="form-control @error('building') is-invalid @enderror"
                            name="building"
                            value="{{old('building') ?? $data['currentRow']['building'] ?? ''}}"
                            autofocus
                        />
            
                        @error('building')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Road--}}
                <div class="form-group row">
                    <label for="road" class="col-xl-2 col-form-label">{{ __('Road/Street name') }}</label>
        
                    <div class="col-xl-10">
                        <input
                            id="road"
                            type="text"
                            maxlength="45"
                            class="form-control @error('road') is-invalid @enderror"
                            name="road"
                            value="{{old('road') ?? $data['currentRow']['road'] ?? ''}}"
                            autofocus
                        />
            
                        @error('road')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--City--}}
                <div class="form-group row">
                    <label for="city" class="col-xl-2 col-form-label">{{ __('City/Town') }}</label>
        
                    <div class="col-xl-10">
                        <input
                            id="city"
                            type="text"
                            maxlength="45"
                            class="form-control @error('city') is-invalid @enderror"
                            name="city"
                            value="{{old('city') ?? $data['currentRow']['city'] ?? ''}}"
                            autofocus
                        />
            
                        @error('city')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Postcode--}}
                <div class="form-group row">
                    <label for="postcode" class="col-xl-2 col-form-label">{{ __('Postcode') }}</label>
        
                    <div class="col-xl-10">
                        <input
                            id="postcode"
                            type="text"
                            maxlength="10"
                            class="form-control @error('postcode') is-invalid @enderror"
                            name="postcode"
                            value="{{old('postcode') ?? $data['currentRow']['postcode'] ?? ''}}"
                            autofocus
                        />
            
                        @error('postcode')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Active Status--}}
                <div class="form-group row">
                    <label for="active" class="col-xl-2 col-form-label">{{ __('Status') }}</label>
        
                    <div class="col-xl-10">
                        <select id="active"
                                type="number"
                                class="form-control @error('active') is-invalid @enderror"
                                name="active"
                                required
                                autofocus>
                            <option value = "" {{old('active') !== '' | isset($data['currentRow']) && isset($data['currentRow']['active'])  ? '' : 'selected'}}>Select</option>
                            <option value = 0 {{old('active') === 0 | isset($data['currentRow']) && isset($data['currentRow']['active']) && $data['currentRow']['active'] === 0 ? 'selected' : ''}}>Inactive</option>
                            <option value = 1 {{old('active') === 1 | isset($data['currentRow']) && isset($data['currentRow']['active']) && $data['currentRow']['active'] === 1 ? 'selected' : ''}}>Active</option>
                        </select>
            
                        @error('active')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.sponsors.list', ['type' => $subcategory ?? $category])}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submit-animal-details" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>