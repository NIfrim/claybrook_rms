<form action = "{{route('admin.animals.submit', ['type' => $subcategory, 'formType' => $formType])}}" method="post" enctype="multipart/form-data">
    <div class="card" id="animalFormCard">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            {{--Add the type of animal based on the subcategory--}}
            <input type = "text" name="type" id="animalType" value="{{$data['currentRow']['type'] ?? $data['type']}}" hidden>
            
            <div class="container-responsive">
                
                {{--The id or generated id--}}
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
                            <select name = "can_fly" id = "canFly" class="form-control @error('canFly') is-invalid @enderror" required autofocus>
                                <option value = "" {{old('can_fly') === 'Y' | old('can_fly') === 'N' | isset($data['currentRow']) && isset($data['currentRow']['can_fly']) ? '' : 'selected'}}>Select</option>
                                <option value = "Y" {{old('can_fly') === 'Y' | isset($data['currentRow']) && isset($data['currentRow']['can_fly']) && $data['currentRow']['can_fly'] === 'Y' ? 'selected' : ''}}>Yes</option>
                                <option value = "N" {{old('can_fly') === 'N' | isset($data['currentRow']) && isset($data['currentRow']['can_fly']) && $data['currentRow']['can_fly'] === 'N' ? 'selected' : ''}}>No</option>
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
                                step="1"
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
                @elseif($subcategory === 'fishes')
                    {{--Average body temperature--}}
                    <div class="form-group row">
                        <label for="avgBodyTemp" class="col-xl-2 col-form-label">{{ __('Avg. body temperature') }}</label>
            
                        <div class="col-xl-10 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ºC</span>
                            </div>
                            <input
                                id="avgBodyTemp"
                                type="number"
                                step="0.5"
                                max="99.99"
                                class="form-control @error('avgBodyTemp') is-invalid @enderror"
                                name="average_body_temperature"
                                value="{{ old('average_body_temperature') ?? $data['currentRow']['average_body_temperature'] ?? '' }}"
                                autofocus
                            />
                
                            @error('avgBodyTemp')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
        
                    {{--Water type--}}
                    <div class="form-group row">
                        <label for="waterType" class="col-xl-2 col-form-label">{{ __('Water type') }}</label>
            
                        <div class="col-xl-10">
                            <input
                                id="waterType"
                                list="waterTypeList"
                                type="text"
                                max="45"
                                class="form-control @error('waterType') is-invalid @enderror"
                                name="water_type"
                                value="{{ old('water_type') ?? $data['currentRow']['water_type'] ?? '' }}"
                                autofocus
                            />
                
                            <datalist id="waterTypeList">
                                @foreach($data['waterType'] as $waterType)
                                    <option value = "{{$waterType}}">{{ucfirst(strtolower($waterType))}}</option>
                                @endforeach
                            </datalist>
                
                            @error('waterType')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
        
                    {{--Fish colour--}}
                    <div class="form-group row">
                        <label for="colour" class="col-xl-2 col-form-label">{{ __('Colour') }}</label>
            
                        <div class="col-xl-10">
                            <input
                                id="colour"
                                list="colourList"
                                type="text"
                                max="45"
                                class="form-control @error('colour') is-invalid @enderror"
                                name="colour"
                                value="{{ old('colour') ?? $data['currentRow']['colour'] ?? '' }}"
                                autofocus
                            />
                
                            <datalist id="colourList">
                                @foreach($data['colour'] as $colour)
                                    <option value = "{{$colour}}">{{ucfirst(strtolower($colour))}}</option>
                                @endforeach
                            </datalist>
                
                            @error('colour')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    
                @elseif($subcategory === 'mammals')
                    {{--Gestational Period--}}
                    <div class="form-group row">
                        <label for="gestationalPeriod" class="col-xl-2 col-form-label">{{ __('Gestational period') }}</label>
            
                        <div class="col-xl-10 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">days</span>
                            </div>
                            <input
                                id="gestationalPeriod"
                                type="number"
                                step="1"
                                max="999"
                                class="form-control @error('gestationalPeriod') is-invalid @enderror"
                                name="gestational_period"
                                value="{{ old('gestational_period') ?? $data['currentRow']['gestational_period'] ?? '' }}"
                                required
                                autofocus
                            />
                
                            @error('gestationalPeriod')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
        
                    {{--Offspring Number--}}
                    <div class="form-group row">
                        <label for="offspringNumber" class="col-xl-2 col-form-label">{{ __('Offspring number') }}</label>
            
                        <div class="col-xl-10">
                            <input
                                id="offspringNumber"
                                type="number"
                                step="1"
                                max="999"
                                class="form-control @error('offspringNumber') is-invalid @enderror"
                                name="offspring_number"
                                value="{{ old('offspring_number') ?? $data['currentRow']['offspring_number'] ?? '' }}"
                                required
                                autofocus
                            />
                
                            @error('offspringNumber')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    
                @elseif($subcategory === 'reptiles')
                    {{--Reproduction Type--}}
                    <div class="form-group row">
                        <label for="reproductionType" class="col-xl-2 col-form-label">{{ __('Reproduction type') }}</label>
            
                        <div class="col-xl-10">
                            <select name = "reproduction_type" id = "reproductionType" class="form-control @error('reproductionType') is-invalid @enderror">
                                <option value = "" {{old('reproduction_type') === 'EGG LAYER' | old('reproduction_type') === 'LIVE BEARER' | isset($data['currentRow']) && isset($data['currentRow']['reproduction_type'])  ? '' : 'selected'}}>Select reproduction type</option>
                                <option value = "EGG LAYER" {{old('reproduction_type') === 'EGG LAYER' | isset($data['currentRow']) && isset($data['currentRow']['reproduction_type']) && $data['currentRow']['reproduction_type'] === 'EGG LAYER' ? 'selected' : ''}}>Egg layer</option>
                                <option value = "LIVE BEARER" {{old('reproduction_type') === 'LIVE BEARER' | isset($data['currentRow']) && isset($data['currentRow']['reproduction_type']) && $data['currentRow']['reproduction_type'] === 'LIVE BEARER' ? 'selected' : ''}}>Live bearer</option>
                            </select>
                
                            @error('reproductionType')
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
                                step="1"
                                max="999"
                                class="form-control @error('clutchSize') is-invalid @enderror"
                                name="clutch_size"
                                value="{{ old('clutch_size') ?? $data['currentRow']['clutch_size'] ?? '' }}"
                                autofocus
                            />
                
                            @error('clutchSize')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
        
                    {{--Offspring Number--}}
                    <div class="form-group row">
                        <label for="offspringNumber" class="col-xl-2 col-form-label">{{ __('Offspring number') }}</label>
            
                        <div class="col-xl-10">
                            <input
                                id="offspringNumber"
                                type="number"
                                step="1"
                                max="999"
                                class="form-control @error('offspringNumber') is-invalid @enderror"
                                name="offspring_number"
                                value="{{ old('offspring_number') ?? $data['currentRow']['offspring_number'] ?? '' }}"
                                autofocus
                            />
                
                            @error('offspringNumber')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                @endif
    
                {{--Life span--}}
                <div class="form-group row">
                    <label for="lifeSpan" class="col-xl-2 col-form-label">{{ __('Life Span') }}</label>
        
                    <div class="col-xl-10 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Years</span>
                        </div>
                        <input
                            id="lifeSpan"
                            type="number"
                            step="1"
                            max="999"
                            class="form-control @error('lifeSpan') is-invalid @enderror"
                            name="life_span"
                            value="{{ old('life_span') ?? $data['currentRow']['life_span'] ?? '' }}"
                            autofocus
                        />
            
                        @error('lifeSpan')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
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
                
                {{--Gender--}}
                <div class="form-group row">
                    <label for="gender" class="col-xl-2 col-form-label">{{ __('Gender') }}</label>
                    
                    <div class="col-xl-10">
                        <select name = "gender" id = "gender" class="form-control @error('gender') is-invalid @enderror">
                            <option value = "" {{old('gender') === 'MALE' | old('gender') === 'FEMALE' | isset($data['currentRow']) && isset($data['currentRow']['gender'])  ? '' : 'selected'}}>Select Gender</option>
                            <option value = "MALE" {{old('gender') === 'MALE' | isset($data['currentRow']) && isset($data['currentRow']['gender']) && $data['currentRow']['gender'] === 'MALE' ? 'selected' : ''}}>Male</option>
                            <option value = "FEMALE" {{old('gender') === 'FEMALE' | isset($data['currentRow']) && isset($data['currentRow']['gender']) && $data['currentRow']['gender'] === 'FEMALE' ? 'selected' : ''}}>Female</option>
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
    
    
                {{--Images--}}
                <div class="form-group row">
                    <label for="images" class="col-xl-2 col-form-label">{{ __('Animal images') }}</label>
        
                    <div class="col-xl-10">
                        <div class="custom-file input-group">
                            <input type="file"
                                   class="custom-file-input @error('images') is-invalid @enderror"
                                   id="images"
                                   name="files[]"
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
                    
                    @if(isset($data['currentRow']->images))
                        <div class="row col-md-10 offset-xl-2 p-3">
                            @foreach($data['currentRow']->images as $image)
      
                                <div class="col-md-3 col-sm-4">
                                    <img src = "{{'/images/animals/'.$image}}" class="img-fluid img-thumbnail" alt = "Animal Image">
                                </div>
                                
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.animals.list', ['type' => $subcategory ?? $category])}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submit-animal-details" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>