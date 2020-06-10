<form method="POST" action="{{route('sponsor.profile.submit')}}" id="registerSponsorForm">
    @csrf
    
    <input type = "number" value="{{$data->id}}" name="id" hidden readonly required>

    <div class="form-group row">
        <label for="title" class="col-form-label text-md-right text-secondary">{{ __('Title') }}</label>

        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">perm_identity</span>
            </div>
            <select name = "title" id = "title" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" autofocus>
                <option value = -1 {{ isset($data) ? '' : 'selected' }}>Select</option>
                <option value = "MR" {{ isset($data) && $data->title === 'MR' ? 'selected' : '' }}>Mr</option>
                <option value = "MRS" {{ isset($data) && $data->title === 'MRS' ? 'selected' : '' }}>Mrs</option>
                <option value = "MISS" {{ isset($data) && $data->title === 'MISS' ? 'selected' : '' }}>Miss</option>
                <option value = "MS" {{ isset($data) && $data->title === 'MS' ? 'selected' : '' }}>Ms</option>
                <option value = "MX" {{ isset($data) && $data->title === 'MX' ? 'selected' : '' }}>Mx</option>
            </select>
    
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="firstName" class="col-form-label text-md-right text-secondary">{{ __('First Name') }}</label>

        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">perm_identity</span>
            </div>
            <input id="firstName"
                   type="text"
                   class="form-control @error('first_name') is-invalid @enderror"
                   name="first_name"
                   value="{{ $data->first_name }}"
                   required
                   autocomplete="first_name"
                   autofocus
            />
    
            @error('first_name')
            <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="lastName" class="col-form-label text-md-right text-secondary">{{ __('Last Name') }}</label>

        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">perm_identity</span>
            </div>
            <input id="lastName"
                   type="text"
                   class="form-control @error('last_name') is-invalid @enderror"
                   name="last_name"
                   value="{{ $data->last_name }}"
                   required
                   autocomplete="last_name"
                   autofocus>
    
            @error('last_name')
            <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="newEmail" class="col-form-label text-md-right text-secondary">{{ __('E-Mail Address') }}</label>

        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">email</span>
            </div>
            <input id="newEmail"
                   type="email"
                   class="form-control @error('newEmail') is-invalid @enderror"
                   name="email"
                   value="{{ $data->email }}"
                   required
                   autofocus
            />
    
            @error('newEmail')
            <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
            @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <label for="jobTitle" class="col-form-label text-md-right text-secondary">{{ __('Job title') }}</label>
        
        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">work</span>
            </div>
            <input id="jobTitle"
                   type="text"
                   class="form-control @error('jobTitle') is-invalid @enderror"
                   name="job_title"
                   value="{{ $data->job_title ?? '' }}"
                   autofocus
            />
            
            @error('jobTitle')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <label for="primaryNumber" class="col-form-label text-md-right text-secondary">{{ __('Primary Contact') }}</label>
        
        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">phone</span>
            </div>
            <input id="primaryNumber"
                   type="text"
                   maxlength="15"
                   pattern="\d{9,15}"
                   class="form-control @error('primaryNumber') is-invalid @enderror"
                   name="primary_contact_number"
                   value="{{ $data->primary_contact_number ?? '' }}"
                   autofocus
            />
            
            @error('primaryNumber')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="secondaryNumber" class="col-form-label text-md-right text-secondary">{{ __('Secondary Contact') }}</label>
        
        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">phone</span>
            </div>
            <input id="secondaryNumber"
                   type="text"
                   maxlength="15"
                   pattern="\d{9,15}"
                   class="form-control @error('secondaryNumber') is-invalid @enderror"
                   name="secondary_contact_number"
                   value="{{ $data->secondary_contact_number ?? '' }}"
                   autofocus
            />
            
            @error('secondaryNumber')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-12">
            <button type="submit" class="btn col-md-12 btn-primary" name="update-sponsor">
                {{ __('Submit') }}
            </button>
        </div>
    </div>
</form>