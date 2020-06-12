<form action = "{{$route}}" method="post">
    <div class="card" id="employeeAccountForm">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            
            @if($formType === 'edit')
                {{--Add the id of the current record--}}
                <input type = "number" name="id" value="{{$data['currentRow']->id}}" hidden readonly>
            @endif
            
            <div class="container-responsive">
                {{--Account Type--}}
                <div class="form-group row">
                    <label for="typeName" class="col-xl-2 col-form-label">{{ __('Account Type') }}</label>
        
                    <div class="col-xl-10">
                        <input
                            id="typeName"
                            list="typesList"
                            type="text"
                            maxlength="45"
                            class="form-control @error('typeName') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') ?? $data['currentRow']['name'] ?? ''}}"
                            required
                            autofocus
                        />
            
                        <datalist id="typesList">
                            @foreach($data['accountTypes'] as $accountType)
                                <option value = "{{$accountType->name}}">{{ucfirst(strtolower($accountType->name))}}</option>
                            @endforeach
                        </datalist>
            
                        @error('typeName')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                
                {{-- Permissions for section access --}}
                <div class="d-flex flex-row flex-wrap col-md-12 justify-content-start">
                    
                    {{--Animals Section--}}
                    <div class="d-flex flex-column m-4">
                        <h5>Animals section</h5>
                        
                        {{--Read--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="animalRead"
                                name="animals[]"
                                value="READ"
                                {{isset($data['currentRow']) && in_array('READ', $data['currentRow']->permissions['animals']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="animalRead">Read permission</label>
                        </div>
    
                        {{--Write--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="animalWrite"
                                name="animals[]"
                                value="WRITE"
                                {{isset($data['currentRow']) && in_array('WRITE', $data['currentRow']->permissions['animals']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="animalWrite">Write permission</label>
                        </div>
                    </div>
    
                    {{--Reviews Section--}}
                    <div class="d-flex flex-column m-4">
                        <h5>Reviews section</h5>
        
                        {{--Read--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="reviewsRead"
                                name="reviews[]"
                                value="READ"
                                {{isset($data['currentRow']) && in_array('READ', $data['currentRow']->permissions['reviews']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="reviewsRead">Read permission</label>
                        </div>
        
                        {{--Write--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="reviewsWrite"
                                name="reviews[]"
                                value="WRITE"
                                {{isset($data['currentRow']) && in_array('WRITE', $data['currentRow']->permissions['reviews']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="reviewsWrite">Write permission</label>
                        </div>
                    </div>
    
                    {{--Employees Section--}}
                    <div class="d-flex flex-column m-4">
                        <h5 class="text-nowrap">Employees section</h5>
        
                        {{--Read--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="employeesRead"
                                name="employees[]"
                                value="READ"
                                {{isset($data['currentRow']) && in_array('READ', $data['currentRow']->permissions['employees']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="employeesRead">Read permission</label>
                        </div>
        
                        {{--Write--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="employeesWrite"
                                name="employees[]"
                                value="WRITE"
                                {{isset($data['currentRow']) && in_array('WRITE', $data['currentRow']->permissions['employees']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="employeesWrite">Write permission</label>
                        </div>
                    </div>
    
    
                    {{--Sponsors Section--}}
                    <div class="d-flex flex-column m-4">
                        <h5 class="text-nowrap">Sponsors section</h5>
        
                        {{--Read--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="sponsorsRead"
                                name="sponsors[]"
                                value="READ"
                                {{isset($data['currentRow']) && in_array('READ', $data['currentRow']->permissions['sponsors']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="sponsorsRead">Read permission</label>
                        </div>
        
                        {{--Write--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="sponsorsWrite"
                                name="sponsors[]"
                                value="WRITE"
                                {{isset($data['currentRow']) && in_array('WRITE', $data['currentRow']->permissions['sponsors']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="sponsorsWrite">Write permission</label>
                        </div>
                    </div>
    
    
                    {{--Locations Section--}}
                    <div class="d-flex flex-column m-4">
                        <h5 class="text-nowrap">Locations section</h5>
        
                        {{--Read--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="locationsRead"
                                name="locations[]"
                                value="READ"
                                {{isset($data['currentRow']) && in_array('READ', $data['currentRow']->permissions['locations']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="locationsRead">Read permission</label>
                        </div>
        
                        {{--Write--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="locationsWrite"
                                name="locations[]"
                                value="WRITE"
                                {{isset($data['currentRow']) && in_array('WRITE', $data['currentRow']->permissions['locations']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="locationsWrite">Write permission</label>
                        </div>
                    </div>
    
    
                    {{--Attractions Section--}}
                    <div class="d-flex flex-column m-4">
                        <h5 class="text-nowrap">Attractions section</h5>
        
                        {{--Read--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="attractionsRead"
                                name="attractions[]"
                                value="READ"
                                {{isset($data['currentRow']) && in_array('READ', $data['currentRow']->permissions['attractions']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="attractionsRead">Read permission</label>
                        </div>
        
                        {{--Write--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="attractionsWrite"
                                name="attractions[]"
                                value="WRITE"
                                {{isset($data['currentRow']) && in_array('WRITE', $data['currentRow']->permissions['attractions']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="attractionsWrite">Write permission</label>
                        </div>
                    </div>
    
    
                    {{--Tickets and Passes Section--}}
                    <div class="d-flex flex-column m-4">
                        <h5 class="text-nowrap">Tickets and Passes section</h5>
        
                        {{--Read--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="ticketsAndPassesRead"
                                name="ticketsAndPasses[]"
                                value="READ"
                                {{isset($data['currentRow']) && in_array('READ', $data['currentRow']->permissions['ticketsAndPasses']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="ticketsAndPassesRead">Read permission</label>
                        </div>
        
                        {{--Write--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="ticketsAndPassesWrite"
                                name="ticketsAndPasses[]"
                                value="WRITE"
                                {{isset($data['currentRow']) && in_array('WRITE', $data['currentRow']->permissions['ticketsAndPasses']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="ticketsAndPassesWrite">Write permission</label>
                        </div>
                    </div>
    
    
                    {{--Events and News Section--}}
                    <div class="d-flex flex-column m-4">
                        <h5 class="text-nowrap">Events & News section</h5>
        
                        {{--Read--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="eventsAndNewsRead"
                                name="eventsAndNews[]"
                                value="READ"
                                {{isset($data['currentRow']) && in_array('READ', $data['currentRow']->permissions['eventsAndNews']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="eventsAndNewsRead">Read permission</label>
                        </div>
        
                        {{--Write--}}
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="eventsAndNewsWrite"
                                name="eventsAndNews[]"
                                value="WRITE"
                                {{isset($data['currentRow']) && in_array('WRITE', $data['currentRow']->permissions['eventsAndNews']) ? 'checked' : ''}}
                            />
                            <label class="custom-control-label text-nowrap" for="eventsAndNewsWrite">Write permission</label>
                        </div>
                    </div>
    
                    @error('typeName')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href = "{{route('admin.employees.list', ['type' => 'accountTypes'])}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </a>
            <button type="submit" name="submit-account-type" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>