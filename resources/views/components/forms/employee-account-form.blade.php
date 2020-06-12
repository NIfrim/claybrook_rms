<form action = "{{$route}}" method="post">
    <div class="card" id="employeeAccountForm">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            
            @if($formType === 'edit')
                {{--Add the id of the employee--}}
                <input type = "number" name="id" value="{{$data['currentRow']->id}}" hidden readonly>
            @endif
            
            {{--Add the default zoo id--}}
            <input type = "number" id="zooId" name="zoo_id" value="{{$data['currentRow']->zoo_id ?? $data['zooId']}}" hidden readonly>
            
            <div class="container-responsive">
                {{--Account Type--}}
                <div class="form-group row">
                    <label for="accountType" class="col-xl-2 col-form-label">{{ __('Account Type') }}</label>
        
                    <div class="col-xl-10">
                        <select name = "account_type_id" id = "accountType" class="form-control @error('accountType') is-invalid @enderror" required autofocus>
                            <option value = "" {{old('account_type_id') !== '' | isset($data['currentRow']) && isset($data['currentRow']->account_type_id) ? '' : 'selected'}}>Select</option>
                            
                            @foreach($data['accountTypes'] as $accountType)
                                <option value = "{{$accountType->id}}" {{old('account_type_id') === $accountType->id | isset($data['currentRow']) && isset($data['currentRow']['account_type_id']) && $data['currentRow']['account_type_id'] === $accountType->id ? 'selected' : ''}}>{{$accountType->name}}</option>
                            @endforeach
                            
                        </select>
            
                        @error('accountType')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
    
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
            
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.employees.list', ['type' => 'accounts'])}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submit-animal-details" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>