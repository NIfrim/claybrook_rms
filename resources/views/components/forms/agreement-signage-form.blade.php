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
            <input type = "number" id="sponsorId" name="sponsor_id" value="{{$data['currentRow']['sponsor_id'] ?? $data['sponsor_id']}}" hidden required readonly>
            
            <div class="container-responsive">
                
                {{--Agreement date--}}
                <div class="form-group row">
                    <label for="dateSigned" class="col-xl-2 col-form-label">{{ __('Date signed') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="dateSigned"
                            type="date"
                            class="form-control @error('dateSigned') is-invalid @enderror"
                            name="date"
                            value="{{old('date') ?? $data['currentRow']['date'] ?? ''}}"
                            required
                            autofocus
                        />
                        
                        @error('dateSigned')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Agreement start--}}
                <div class="form-group row">
                    <label for="agreementStart" class="col-xl-2 col-form-label">{{ __('Agreement start') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="agreementStart"
                            type="datetime-local"
                            class="form-control @error('agreementStart') is-invalid @enderror"
                            name="agreement_start"
                            value="{{date('Y-m-d\TH:i', strtotime(old('agreement_start') ?? $data['currentRow']['agreement_start'] ?? ''))}}"
                            required
                            autofocus
                        />
                        
                        @error('agreementStart')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Agreement end--}}
                <div class="form-group row">
                    <label for="agreementEnd" class="col-xl-2 col-form-label">{{ __('Agreement end') }}</label>
                    
                    <div class="col-xl-10">
                        <input
                            id="agreementEnd"
                            type="datetime-local"
                            class="form-control @error('agreementEnd') is-invalid @enderror"
                            name="agreement_end"
                            value="{{date('Y-m-d\TH:i', strtotime(old('agreement_end') ?? $data['currentRow']['agreement_end'] ?? ''))}}"
                            required
                            autofocus
                        />
                        
                        @error('agreementEnd')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Signage area--}}
                <div class="form-group row">
                    <label for="signageArea" class="col-xl-2 col-form-label">{{ __('Signage area') }}</label>
                    
                    <div class="col-xl-10 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                        </div>
                        <input
                            id="signageArea"
                            type="number"
                            step="0.1"
                            max="100.00"
                            class="form-control @error('signageArea') is-invalid @enderror"
                            name="signage_area"
                            value="{{old('signage_area') ?? $data['currentRow']['signage_area'] ?? ''}}"
                            required
                            autofocus
                        />
                        
                        @error('signageArea')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Payment Status--}}
                <div class="form-group row">
                    <label for="paymentStatus" class="col-xl-2 col-form-label">{{ __('Payment status') }}</label>
                    
                    <div class="col-xl-10">
                        <select id="paymentStatus"
                                type="number"
                                class="form-control @error('paymentStatus') is-invalid @enderror"
                                name="payment_status"
                                required
                                autofocus>
                            <option value = "" {{old('payment_status') !== '' | isset($data['currentRow']) && isset($data['currentRow']['payment_status'])  ? '' : 'selected'}}>Select</option>
                            <option value = 'PENDING' {{old('payment_status') === 'PENDING' | isset($data['currentRow']) && isset($data['currentRow']['payment_status']) && $data['currentRow']['payment_status'] === 'PENDING' ? 'selected' : ''}}>Pending</option>
                            <option value = 'PAID' {{old('payment_status') === 'PAID' | isset($data['currentRow']) && isset($data['currentRow']['payment_status']) && $data['currentRow']['payment_status'] === 'PAID' ? 'selected' : ''}}>Paid</option>
                            <option value = 'OVERDUE' {{old('payment_status') === 'OVERDUE' | isset($data['currentRow']) && isset($data['currentRow']['payment_status']) && $data['currentRow']['payment_status'] === 'OVERDUE' ? 'selected' : ''}}>Overdue</option>
                            <option value = 'DECLINED' {{old('payment_status') === 'DECLINED' | isset($data['currentRow']) && isset($data['currentRow']['payment_status']) && $data['currentRow']['payment_status'] === 'DECLINED' ? 'selected' : ''}}>Declined</option>
                        </select>
                        
                        @error('paymentStatus')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Documents--}}
                <div class="form-group row">
                    <label for="documents" class="col-xl-2 col-form-label">{{ __('Related documents') }}</label>
                    
                    <div class="col-xl-10">
                        <div class="custom-file input-group">
                            <input type="file"
                                   class="custom-file-input @error('documents') is-invalid @enderror"
                                   id="documents"
                                   name="documents"
                                   autofocus>
                            <label class="custom-file-label" for="customFile">Select documents</label>
                        </div>
                        
                        @error('documents')
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
            <button type="submit" name="submit-animal-details" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>