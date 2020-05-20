<!-- Modal -->
<div class="card" id="animalFormCard">
	<div class="card-header">
		<h4>Animal Details - {{ucfirst($formType)}} Record</h4>
	</div>
	<form action = "{{route('admin.locations.aviary.manage', ['formType' => $formType])}}" method="post">
		@csrf
		<div class="card-body">
			{{--Hidden inputs--}}
			<input type = "number" name="zoo_id" value="{{$zooId}}" required hidden>
			
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
								value="{{old('id') ?? $idTemplate ? $idTemplate.sprintf('%02d', (intval(end($ids)) + 1)) : ''}}"
								required
								readonly
						/>
						
						@error('generatedId')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Location name--}}
				<div class="form-group row">
					<label for="name" class="col-xl-2 col-form-label">{{ __('Location Name') }}</label>
					
					<div class="col-xl-10">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus/>
						
						@error('dateJoined')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Location type--}}
				<div class="form-group row">
					<label for="type" class="col-xl-2 col-form-label">{{ __('Location Type') }}</label>
					
					<div class="col-xl-10">
						<input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') ?? strtoupper($subcategory) }}" required readonly />
						
						@error('type')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Vacant--}}
				<div class="form-group row">
					<label for="vacant" class="col-xl-2 col-form-label">{{ __('Vacant') }}</label>
					
					<div class="col-xl-10">
						<select name = "vacant" id = "vacant" class="form-control @error('vacant') is-invalid @enderror">
							<option value = "" {{old('vacant') === 'Y' | old('vacant') === 'N' ? '' : 'selected'}}>Select</option>
							<option value = "Y" {{old('vacant') === 'Y' ? 'selected' : ''}}>Yes</option>
							<option value = "N" {{old('vacant') === 'N' ? 'selected' : ''}}>No</option>
						</select>
						
						@error('vacant')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Surface Area--}}
				<div class="form-group row">
					<label for="surfaceArea" class="col-xl-2 col-form-label">{{ __('Surface area') }}</label>
					
					<div class="col-xl-10 input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">ft<sup>2</sup></span>
						</div>
						<input id="surfaceArea" type="number" max="99999" class="form-control @error('surfaceArea') is-invalid @enderror" name="surface_area" value="{{ old('surface_area') }}" required autofocus />
						
						@error('surfaceArea')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Description--}}
				<div class="form-group row">
					<label for="description" class="col-xl-2 col-form-label">{{ __('Description') }}</label>
					
					<div class="col-xl-10">
						<textarea name = "description" id = "description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" rows = "5" autofocus></textarea>
						
						@error('description')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer d-flex justify-content-between">
				<a href = "{{route('admin.locations.'.$subcategory)}}">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</a>
			
				<button type="submit" name="submit-animal-details" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>