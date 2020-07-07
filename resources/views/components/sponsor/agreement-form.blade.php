<form method="POST" action="{{$route}}" id="newAgreementForm" enctype="multipart/form-data">
    @csrf
    {{--Id of the current sponsor--}}
    <input type = "number" value="{{$data['sponsor']->id}}" name="sponsor_id" hidden readonly required>
    
    {{-- Agreement Date --}}
    <div class="form-group row">
        <label for="date" class="col-form-label text-md-right text-secondary">{{ __('Current Date') }}</label>
        
        <div class="col-md-12 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">today</span>
            </div>
    
            <input type = "date"
                   id="date"
                   name="date"
                   value="{{date('Y-m-d')}}"
                   class="form-control @error('date') is-invalid @enderror"
                   required
                   readonly
                   autofocus>
            
            @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    
    {{--Start date--}}
    <div class="form-group row">
        <label for="start" class="col-md-12 col-form-label text-secondary">{{ __('Start Date') }}</label>
        
        <div class="col-md-12">
            <input
                id="start"
                type="date"
                class="form-control @error('start') is-invalid @enderror"
                name="agreement_start"
                required
                autofocus
            />
            
            @error('start')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>
    
    
    {{--End date--}}
    <div class="form-group row">
        <label for="endDate" class="col-md-12 col-form-label text-secondary">{{ __('End Date') }}</label>
        
        <div class="col-md-12">
            <input
                id="endDate"
                type="date"
                class="form-control @error('endDate') is-invalid @enderror"
                name="agreement_end"
                required
                readonly
                autofocus
            />
            
            @error('endDate')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>
    
    
    {{--Signage--}}
    <div class="form-group row">
        <label for="images" class="col-xl-2 col-form-label">{{ __('Signage Images') }}</label>
        
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
                <label class="custom-file-label" for="customFile">Choose Image/s</label>
            </div>
            
            @error('images')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>
    
    
    {{-- Animals sponsored clickable grid --}}
    <div class="d-flex flex-wrap overflow-auto col-md-12 border border-light p-2" id="animalsGrid">
        @if(sizeof($data['animals']) > 0)
            
            <h3 class="col-md-12 text-secondary">{{ __('Select animals') }}</h3>
            
        @else
            
            <h3 class="col-md-12 text-secondary">{{ __('No unsponsored animals') }}</h3>
            
        @endif
        
        @foreach($data['animals'] as $animal)
            <div class="d-flex flex-column justify-content-center align-items-center col-md-4 m-2">
                <img src = "{{$animal->images ? asset('/images/animals/'.$animal->images[0]) : 'https://via.placeholder.com/250x250'}}" class="img-thumbnail img-fluid" id="{{$animal->id}}" alt = "Animal Image">
    
                <p class="price align-self-stretch text-center text-secondary mb-0">{{$animal->sponsorshipBand->price}} £</p>
            </div>
        @endforeach
    </div>
    
    {{-- Animals sponsored hidden inputs wrapper --}}
    <div id="animalsHiddenInputs"></div>
    
    
    {{--Total Cost--}}
    <div class="d-flex justify-content-end">
        <h3 class="text-secondary">Total Cost:</h3>
        <h3 id="totalCost" class="text-secondary"></h3>
    </div>
    
    
    <div class="form-group row mb-0">
        <div class="col-md-12">
            <button type="submit" class="btn col-md-12 btn-primary">
                {{ __('Submit') }}
            </button>
        </div>
    </div>
</form>