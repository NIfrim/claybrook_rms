<form method="POST" action="{{route('sponsor.profile.submit')}}" id="registerSponsorForm">
    @csrf
    <input type = "number" value="{{$data['currentRow']->sponsor_id ?? ''}}" name="id" hidden readonly required>
    <input type = "number" value="{{$data->id}}" name="sponsor_id" hidden readonly required>

    <div class="form-group row">
        <label for="agreementStart" class="col-form-label text-md-right text-secondary">{{ __('Start date') }}</label>

        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">today</span>
            </div>
            <input id="agreementStart"
                   type="datetime-local"
                   class="form-control @error('agreementStart') is-invalid @enderror"
                   name="agreement_start"
                   value="{{ old('agreement_start') ?? $data['currentRow']->agreement_start ?? '' }}"
                   required
                   autofocus
            />
    
            @error('agreementStart')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <label for="agreementEnd" class="col-form-label text-md-right text-secondary">{{ __('End date') }}</label>
        
        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">today</span>
            </div>
            <input id="agreementEnd"
                   type="datetime-local"
                   class="form-control @error('agreementEnd') is-invalid @enderror"
                   name="agreement_end"
                   value="{{ old('agreement_end') ?? $data['currentRow']->agreement_end ?? '' }}"
                   required
                   autofocus
            />
            
            @error('agreementEnd')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <fieldset>
        <legend class="d-flex justify-content-between">
            <h3 class="text-secondary mb-0">Animals to be sponsored</h3>
            <button class="btn-sm btn-secondary rounded-lg" id="addAnimalToBeSponsored">
                <span class="material-icons">add_circle</span>
            </button>
        </legend>
        <div class="d-flex" id="sponsoredAnimalsList">
        
        </div>
        
    </fieldset>

    <div class="form-group row mb-0">
        <div class="col-md-12">
            <button type="submit" class="btn col-md-12 btn-primary" name="update-sponsor">
                {{ __('Submit') }}
            </button>
        </div>
    </div>
</form>