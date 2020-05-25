<form action = "{{$route}}" method="post">
    <div class="card" id="animalFormCard">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            {{--Add the type of animal based on the subcategory--}}
            <input type = "text" name="type" value="{{$data['currentRow']['type'] ?? $data['type']}}" hidden>
            <div class="container-responsive">
                {{--Generated id--}}
                <div class="form-group row">
                    <label for="generatedId" class="col-xl-2 col-form-label">{{ __('Generated id') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="generatedId"
                            type="text"
                            class="form-control @error('generatedId') is-invalid @enderror"
                            name="id"
                            value="{{old('id') ?? $data['currentRow']['id'] ?? ''}}"
                            required
                            readonly
                        />
                        
                        @error('generatedId')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Date joined--}}
                <div class="form-group row">
                    <label for="dateJoined" class="col-xl-2 col-form-label">{{ __('Date joined') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="generatedId"
                            type="date"
                            class="form-control @error('dateJoined') is-invalid @enderror"
                            name="date_joined"
                            value="{{ old('date_joined') ?? $data['currentRow']['date_joined'] ?? ''}}"
                            required
                            autofocus
                        />
                        
                        @error('dateJoined')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Species--}}
                <div class="form-group row">
                    <label for="species" class="col-xl-2 col-form-label">{{ __('Species') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="species"
                            list="speciesList"
                            type="text"
                            class="form-control @error('species') is-invalid @enderror"
                            name="species"
                            value="{{ old('species') ?? $data['currentRow']['species'] ?? ''}}"
                            required
                            autofocus
                        />
                        
                        <datalist id="speciesList">
                            @foreach($data['species'] as $specie)
                                <option value = "{{$specie}}">{{ucfirst(strtolower($specie))}}</option>
                            @endforeach
                        </datalist>
                        
                        @error('species')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Classification--}}
                <div class="form-group row">
                    <label for="classification" class="col-xl-2 col-form-label">{{ __('Classification') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="classification"
                            list="classificationsList"
                            type="text"
                            class="form-control @error('classification') is-invalid @enderror"
                            name="classification"
                            value="{{ old('classification') ?? $data['currentRow']['classification'] ?? ''}}"
                            required
                            autofocus
                        />
                        
                        <datalist id="classificationsList">
                            @foreach($data['classifications'] as $classification)
                                <option value = "{{$classification}}">{{ucfirst(strtolower($classification))}}</option>
                            @endforeach
                        </datalist>
                        
                        @error('classification')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Birds Only inputs--}}
                @if($subcategory === 'birds')
                    {{--Can Fly--}}
                    <div class="form-group row">
                        <label for="canFly" class="col-xl-2 col-form-label">{{ __('Can Fly') }}</label>
                        
                        <div class="col-xl-10">
                            <select name = "can_fly" id = "canFly" class="form-control @error('canFly') is-invalid @enderror" autofocus>
                                <option value = "" {{old('can_fly') === 'Y' | old('can_fly') === 'N' | isset($data['currentRow']['can_fly']) ? '' : 'selected'}}>Select</option>
                                <option value = "Y" {{old('can_fly') === 'Y' | $data['currentRow']['can_fly'] === 'Y' ? 'selected' : ''}}>Yes</option>
                                <option value = "N" {{old('can_fly') === 'N' | $data['currentRow']['can_fly'] === 'N' ? 'selected' : ''}}>No</option>
                            </select>
                            @error('canFly')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    
                    {{--Nest construction--}}
                    <div class="form-group row">
                        <label for="nestConstruction" class="col-xl-2 col-form-label">{{ __('Nest construction') }}</label>
                        
                        <div class="col-xl-10">
                            <input
                                id="nestConstruction"
                                list="nestConstructionList"
                                type="text"
                                max="45"
                                class="form-control @error('nestConstruction') is-invalid @enderror"
                                name="nest_construction"
                                value="{{ old('nest_construction') ?? $data['currentRow']['nest_construction'] ?? '' }}"
                                required
                                autofocus
                            />
    
                            <datalist id="nestConstructionList">
                                @foreach($data['nestConstruction'] as $nestConstruction)
                                    <option value = "{{$nestConstruction}}">{{ucfirst(strtolower($nestConstruction))}}</option>
                                @endforeach
                            </datalist>
                            
                            @error('nestConstruction')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    
                    {{--Clutch Size--}}
                    <div class="form-group row">
                        <label for="clutchSize" class="col-xl-2 col-form-label">{{ __('Clutch Size') }}</label>
                        
                        <div class="col-xl-10">
                            <input
                                id="clutchSize"
                                type="number"
                                max="999"
                                class="form-control @error('clutchSize') is-invalid @enderror"
                                name="clutch_size"
                                value="{{ old('clutch_size') ?? $data['currentRow']['clutch_size'] ?? '' }}"
                                required
                                autofocus
                            />
                            
                            @error('clutchSize')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    
                    {{--Wingspan--}}
                    <div class="form-group row">
                        <label for="wingspan" class="col-xl-2 col-form-label">{{ __('Wingspan') }}</label>
                        
                        <div class="col-xl-10 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">cm</span>
                            </div>
                            <input
                                id="wingspan"
                                type="number"
                                step="0.01"
                                max="999.99"
                                class="form-control @error('wingspan') is-invalid @enderror"
                                name="wingspan"
                                value="{{ old('wingspan') ?? $data['currentRow']['wingspan'] ?? '' }}"
                                required
                                autofocus
                            />
                            
                            @error('wingspan')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    
                    {{--Plumage Colour--}}
                    <div class="form-group row">
                        <label for="plumage" class="col-xl-2 col-form-label">{{ __('Plumage Colour') }}</label>
                        
                        <div class="col-xl-10">
                            <input
                                id="plumage"
                                list="plumageList"
                                type="text"
                                max="45"
                                class="form-control @error('plumage') is-invalid @enderror"
                                name="plumage"
                                value="{{ old('plumage') ?? $data['currentRow']['plumage'] ?? '' }}"
                                autofocus
                            />
    
                            <datalist id="plumageList">
                                @foreach($data['plumage'] as $plumage)
                                    <option value = "{{$plumage}}">{{ucfirst(strtolower($plumage))}}</option>
                                @endforeach
                            </datalist>
                            
                            @error('plumage')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                @endif
                
                {{--Given name--}}
                <div class="form-group row">
                    <label for="name" class="col-xl-2 col-form-label">{{ __('Given name') }}</label>
                    
                    <div class="col-xl-10">
                        <input id="name"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ old('name') ?? $data['currentRow']['name'] ?? '' }}"
                               autofocus />
                        
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Birth date--}}
                <div class="form-group row">
                    <label for="dob" class="col-xl-2 col-form-label">{{ __('Date of birth') }}</label>
                    
                    <div class="col-xl-10">
                        <input id="dob"
                               type="date"
                               class="form-control @error('dob') is-invalid @enderror"
                               name="dob"
                               value="{{ old('dob') ?? $data['currentRow']['dob'] ?? '' }}"
                               required
                               autofocus />
                        
                        @error('dob')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Gender--}}
                <div class="form-group row">
                    <label for="gender" class="col-xl-2 col-form-label">{{ __('Gender') }}</label>
                    
                    <div class="col-xl-10">
                        <select name = "gender" id = "gender" class="form-control @error('gender') is-invalid @enderror">
                            <option value = "" {{old('gender') === 'MALE' | old('gender') === 'FEMALE' | isset($data['currentRow']['gender'])  ? '' : 'selected'}}>Select Gender</option>
                            <option value = "MALE" {{old('gender') === 'MALE' | $data['currentRow']['gender'] === 'MALE' ? 'selected' : ''}}>Male</option>
                            <option value = "FEMALE" {{old('gender') === 'FEMALE' | $data['currentRow']['gender'] === 'FEMALE' ? 'selected' : ''}}>Female</option>
                        </select>
                        
                        @error('dob')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Height joined--}}
                <div class="form-group row">
                    <label for="height" class="col-xl-2 col-form-label">{{ __('Height when joined') }}</label>
                    
                    <div class="col-xl-10 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">m</span>
                        </div>
                        <input id="height"
                               type="number"
                               step="0.01"
                               max="9999.99"
                               class="form-control @error('height') is-invalid @enderror"
                               name="height_joined"
                               value="{{ old('height_joined') ?? $data['currentRow']['height_joined'] ?? '' }}"
                               autofocus />
                        
                        @error('height')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Weight joined--}}
                <div class="form-group row">
                    <label for="weight" class="col-xl-2 col-form-label">{{ __('Weight when joined') }}</label>
                    
                    <div class="col-xl-10 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">kg</span>
                        </div>
                        <input
                            id="weight"
                            type="number"
                            step="0.01"
                            max="9999.99"
                            class="form-control @error('weight') is-invalid @enderror"
                            name="weight_joined"
                            value="{{ old('weight_joined') ?? $data['currentRow']['weight_joined'] ?? '' }}"
                            autofocus />
                        
                        @error('weight')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Location--}}
                <div class="form-group row">
                    <label for="location" class="col-xl-2 col-form-label">{{ __('Location in zoo') }}</label>
                    
                    <div class="col-xl-10">
                        <input id="location"
                               list="locationsList"
                               type="text"
                               class="form-control @error('location') is-invalid @enderror"
                               name="location_id"
                               value="{{ old('location_id') ?? $data['currentRow']['location_id'] ?? '' }}"
                               autofocus />
    
                        <datalist id="locationsList">
                            @foreach($data['locations'] as $location)
                                <option value = "{{$location->id}}">{{ucfirst(strtolower($location->location_name))}}</option>
                            @endforeach
                        </datalist>
                        
                        @error('location')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Sponsorship Band--}}
                <div class="form-group row">
                    <label for="sponsorshipBand" class="col-xl-2 col-form-label">{{ __('Sponsorship Band') }}</label>
                    
                    <div class="col-xl-10">
                        <input id="sponsorshipBandId"
                               list="sponsorshipBandsList"
                               type="text"
                               class="form-control @error('sponsorshipBandId') is-invalid @enderror"
                               name="sponsorship_band_id"
                               value="{{ old('sponsorship_band_id') ?? $data['currentRow']['sponsorship_band_id'] ?? '' }}"
                               autofocus />
    
                        <datalist id="sponsorshipBandsList">
                            @foreach($data['sponsorshipBands'] as $sponsorshipBand)
                                <option value = "{{$sponsorshipBand->id}}">{{ucfirst(strtolower($sponsorshipBand->price)) . '£'}}</option>
                            @endforeach
                        </datalist>
                        
                        @error('sponsorshipBand')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Diet--}}
                <div class="form-group row">
                    <label for="diet" class="col-xl-2 col-form-label">{{ __('Diet') }}</label>
        
                    <div class="col-xl-10">
                        <textarea name = "diet"
                                  id = "diet"
                                  class="form-control @error('diet') is-invalid @enderror"
                                  autofocus>{{ old('diet') ?? $data['currentRow']['diet'] ?? '' }}</textarea>
            
                        @error('diet')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.animals.byType', ['type' => $subcategory ?? $category])}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submit-animal-details" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>