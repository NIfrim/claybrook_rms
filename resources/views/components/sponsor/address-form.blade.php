<form method="POST" action="{{route('sponsor.profile.submit')}}" id="registerSponsorForm">
    @csrf
    
    <input type = "number" value="{{$data->id}}" name="id" hidden readonly required>

    <div class="form-group row">
        <label for="building" class="col-form-label text-md-right text-secondary">{{ __('Building Name/No.') }}</label>

        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">house</span>
            </div>
            <input id="building"
                   type="text"
                   class="form-control @error('building') is-invalid @enderror"
                   name="building"
                   maxlength="45"
                   value="{{ old('building') ?? $data->building ?? '' }}"
                   required
                   autocomplete="building"
                   autofocus
            />
    
            @error('building')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="road" class="col-form-label text-md-right text-secondary">{{ __('Street/Road') }}</label>
        
        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">add_road</span>
            </div>
            <input id="road"
                   type="text"
                   class="form-control @error('road') is-invalid @enderror"
                   name="road"
                   maxlength="45"
                   value="{{ old('road') ?? $data->road ?? '' }}"
                   required
                   autocomplete="road"
                   autofocus
            />
            
            @error('road')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="city" class="col-form-label text-md-right text-secondary">{{ __('City/Town') }}</label>
        
        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">location_on</span>
            </div>
            <input id="city"
                   type="text"
                   class="form-control @error('city') is-invalid @enderror"
                   name="city"
                   maxlength="45"
                   value="{{ old('city') ?? $data->city ?? '' }}"
                   required
                   autocomplete="city"
                   autofocus
            />
            
            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="postcode" class="col-form-label text-md-right text-secondary">{{ __('Postcode') }}</label>
        
        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">location_on</span>
            </div>
            <input id="postcode"
                   type="text"
                   maxlength="10"
                   class="form-control @error('postcode') is-invalid @enderror"
                   name="postcode"
                   value="{{ old('postcode') ?? $data->postcode ?? '' }}"
                   required
                   autocomplete="postcode"
                   autofocus
            />
            
            @error('postcode')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    

    <div class="form-group row mb-0">
        <div class="col-md-12">
            <button type="submit" class="btn col-md-12 btn-primary" name="update-address">
                {{ __('Submit') }}
            </button>
        </div>
    </div>
</form>