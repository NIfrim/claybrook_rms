<form action = "{{$route}}" method="post">
    <div class="card">
        <div class="card-header">
            <h4>{{$title}}</h4>
        </div>
        
        <div class="card-body">
            @csrf
            {{--Add the current record id--}}
            <input type = "number" id="id" name="id" value="{{$data['currentRow']['id'] ?? $data['id']}}" hidden required readonly>
            {{--Add the default sponsor id--}}
            <input type = "text" id="animalId" name="animal_id" value="{{$data['currentRow']['animal_id'] ?? $data['animal_id']}}" hidden required readonly>
            {{--Agreement id--}}
            <input type = "number" id="agreementId" name="agreement_id" value="{{$data['currentRow']['agreement_id'] ?? $data['agreement_id']}}" hidden required readonly>
            
            <div class="container-responsive">
                {{--Status--}}
                <div class="form-group row">
                    <label for="status" class="col-xl-2 col-form-label">{{ __('Status') }}</label>
                    
                    <div class="col-xl-10">
                        <select id="status"
                                type="number"
                                class="form-control @error('status') is-invalid @enderror"
                                name="status"
                                required
                                autofocus>
                            <option value = "" {{old('status') !== '' | isset($data['currentRow']) && isset($data['currentRow']['status'])  ? '' : 'selected'}}>Select</option>
                            <option value = 'APPROVED' {{old('status') === 'APPROVED' | isset($data['currentRow']) && isset($data['currentRow']['status']) && $data['currentRow']['status'] === 'APPROVED' ? 'selected' : ''}}>Approved</option>
                            <option value = 'DENIED' {{old('status') === 'DENIED' | isset($data['currentRow']) && isset($data['currentRow']['status']) && $data['currentRow']['status'] === 'DENIED' ? 'selected' : ''}}>Denied</option>
                            <option value = 'PENDING' {{old('status') === 'PENDING' | isset($data['currentRow']) && isset($data['currentRow']['status']) && $data['currentRow']['status'] === 'PENDING' ? 'selected' : ''}}>Pending</option>
                        </select>
                        
                        @error('status')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
    
                {{--Reason--}}
                <div class="form-group row">
                    <label for="reason" class="col-xl-2 col-form-label">{{ __('Reason') }}</label>
        
                    <div class="col-xl-10">
                        <textarea name = "reason"
                                  id = "reason" class="form-control @error('reason') is-invalid @enderror">{{old('reason') ?? $data['currentRow']['reason']}}</textarea>
            
                        @error('reason')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Images--}}
                <div class="form-group row">
                    <label for="images" class="col-xl-2 col-form-label">{{ __('Signage Graphics') }}</label>
                    
                    <div class="col-xl-10">
                        <div class="custom-file input-group">
                            <input type="file"
                                   class="custom-file-input @error('images') is-invalid @enderror"
                                   id="images"
                                   name="images"
                                   autofocus>
                            <label class="custom-file-label" for="customFile">Select Images</label>
                        </div>
                        
                        @error('images')
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
            <button type="submit" name="submitType" value="signage" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>