<!-- Modal -->
<form action = "{{route('admin.animals.submit', ['type' => $subcategory, 'formType' => $formType.'WatchlistHistory'])}}" id="watchlistHistoryForm" method="post">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Add new history record</div>
            <div class="modal-body">
                {{--Id of record being edited--}}
                <input type = "number" name="id" class="form-control" hidden>
                
                {{--Animal Id--}}
                <div class="form-group row">
                    <label for="animalId" class="col-md-12 col-form-label">{{ __('Animal ID') }}</label>
                    
                    <div class="col-md-12">
                        <input
                            id="animalId"
                            type="text"
                            class="form-control @error('animalId') is-invalid @enderror"
                            name="animal_id"
                            value="{{old('animal_id') ?? $data['generatedId'] ?? $data['currentRow']->id ?? ''}}"
                            required
                            readonly
                        />
                        
                        @error('animalId')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                {{--Start date--}}
                <div class="form-group row">
                    <label for="start" class="col-md-12 col-form-label">{{ __('Watch from') }}</label>
                    
                    <div class="col-md-12">
                        <input
                            id="start"
                            type="date"
                            class="form-control @error('start') is-invalid @enderror"
                            name="start"
                            value="{{old('start') ?? ''}}"
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
                    <label for="end" class="col-md-12 col-form-label">{{ __('Watch till') }}</label>
        
                    <div class="col-md-12">
                        <input
                            id="end"
                            type="date"
                            class="form-control @error('end') is-invalid @enderror"
                            name="end"
                            value="{{old('end') ?? ''}}"
                            required
                            autofocus
                        />
            
                        @error('end')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                
                {{-- Reasons --}}
                <div class="form-group row">
                    <label for="reason" class="col-md-12 col-form-label">{{ __('Reasons') }}</label>
                    
                    <div class="col-md-12">
                        <textarea name = "reason"
                                  id = "reason"
                                  class="form-control @error('reason') is-invalid @enderror"
                                  required autofocus>{{old('reason') ?? ''}}</textarea>
                        
                        @error('reason')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            
            </div>
            <div class="modal-footer flex-nowrap justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit-medical-history" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</form>
