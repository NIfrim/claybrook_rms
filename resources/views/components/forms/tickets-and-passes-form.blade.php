<form action = "{{route('admin.ticketsAndPasses.submit', ['type' => $subcategory, 'formType' => $formType])}}" method="post">
    <div class="card" id="animalFormCard">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>

        <div class="card-body">
            @csrf
            {{--Add the zoo and own id--}}
            <input type = "number" id="id" name="id" value="{{$data['currentRow']['id'] ?? ''}}" required hidden readonly />
            <input type = "number" id="zooId" name="zoo_id" value="{{$data['currentRow']['zoo_id'] ?? $data['zooId']}}" required hidden readonly />
            
            <div class="container-responsive">
                {{--Type--}}
                <div class="form-group row">
                    <label for="type" class="col-xl-2 col-form-label">{{ __('Ticket Type') }}</label>
                    
                    <div class="col-xl-10">
                        <select id="type"
                                class="form-control @error('type') is-invalid @enderror"
                                name="type"
                                required
                                autofocus>
                            
                            <option value = "" {{old('type') !== '' | isset($data['currentRow'])  ? '' : 'selected'}}>Select</option>
                            <option value = "ADULT" {{old('type') !== 'ADULT' | isset($data['currentRow']) && isset($data['currentRow']['type']) && $data['currentRow']['type'] === 'ADULT' ? 'selected' : ''}}>Adult</option>
                            <option value = "FAMILY" {{old('type') !== 'FAMILY' | isset($data['currentRow']) && isset($data['currentRow']['type']) && $data['currentRow']['type'] === 'FAMILY' ? 'selected' : ''}}>Family</option>
                            
                            @if($subcategory === 'tickets')
                                <option value = "CHILD" {{old('type') !== 'CHILD' | isset($data['currentRow']) && isset($data['currentRow']['type']) && $data['currentRow']['type'] === 'CHILD' ? 'selected' : ''}}>Child</option>
                            @endif
                        
                        </select>
                        
                        @error('type')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Gate price--}}
                <div class="form-group row">
                    <label for="priceGate" class="col-xl-2 col-form-label">{{ __('Gate price') }}</label>
                    
                    <div class="col-xl-10 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">£</span>
                        </div>
                        <input type = "number"
                               max="99.99"
                               step="any"
                               id="priceGate"
                               name="price_gate"
                               value="{{old('price_gate') ?? $data['currentRow']['price_gate'] ?? ''}}"
                               class="form-control @error('priceGate') is-invalid @enderror"
                               required
                               autofocus>
                        
                        @error('priceGate')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Online price--}}
                <div class="form-group row">
                    <label for="priceOnline" class="col-xl-2 col-form-label">{{ __('Online price') }}</label>
        
                    <div class="col-xl-10 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">£</span>
                        </div>
                        <input type = "number"
                               max="99.99"
                               step="any"
                               id="priceOnline"
                               name="price_online"
                               value="{{old('price_online') ?? $data['currentRow']['price_online'] ?? ''}}"
                               class="form-control @error('priceOnline') is-invalid @enderror"
                               required
                               autofocus>
            
                        @error('priceOnline')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            
            </div>
        </div>
        
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.ticketsAndPasses.list', ['type' => $subcategory ?? $category])}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submitType" value="{{$subcategory}}" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>