<!-- Modal -->
<form action = "{{route('admin.animals.submit', ['type' => $subcategory, 'formType' => $formType.'MedicalHistory'])}}" id="medicalHistoryForm" method="post">
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
				
				{{--Date/Time of incident--}}
				<div class="form-group row">
					<label for="datetime" class="col-md-12 col-form-label">{{ __('Incident Datetime') }}</label>
					
					<div class="col-md-12">
						<input
								id="datetime"
								type="datetime-local"
								class="form-control @error('datetime') is-invalid @enderror"
								name="datetime"
								value="{{old('datetime') ?? ''}}"
								required
								autofocus
						/>
						
						@error('datetime')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				
				{{-- Incident report --}}
				<div class="form-group row">
					<label for="incident" class="col-md-12 col-form-label">{{ __('Incident report') }}</label>
					
					<div class="col-md-12">
						<textarea name = "incident"
											id = "incident"
											class="form-control @error('incident') is-invalid @enderror"
											required autofocus>{{old('incident') ?? ''}}</textarea>
						
						@error('incident')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{-- Applied treatment --}}
				<div class="form-group row">
					<label for="treatment" class="col-md-12 col-form-label">{{ __('Applied treatment') }}</label>
					
					<div class="col-md-12">
						<textarea name = "treatment"
											id = "treatment"
											class="form-control @error('treatment') is-invalid @enderror"
											required autofocus>{{old('treatment') ?? ''}}</textarea>
						
						@error('treatment')
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
