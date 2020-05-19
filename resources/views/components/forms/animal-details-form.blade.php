<!-- Modal -->
<div class="card" id="animalFormCard">
	<div class="card-header">
		<h4>Animal Details - {{$type}}</h4>
	</div>
	<div class="card-body">
		<form action = "#" method="post">
			@csrf
			<div class="container-responsive">
				{{--Generated id--}}
				<div class="form-group row">
					<label for="generatedId" class="col-md-2 col-form-label">{{ __('Generated id') }}</label>

					<div class="col-md-10">
						<input id="generatedId" type="text" class="form-control @error('generatedId') is-invalid @enderror" name="animal_id" value="{{ old('animal_id') }}" required />
						
						@error('generatedId')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Date joined--}}
				<div class="form-group row">
					<label for="dateJoined" class="col-md-2 col-form-label">{{ __('Date joined') }}</label>
					
					<div class="col-md-10">
						<input id="generatedId" type="date" class="form-control @error('dateJoined') is-invalid @enderror" name="date_joined" value="{{ old('date_joined') }}" required autofocus/>
						
						@error('dateJoined')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Species--}}
				<div class="form-group row">
					<label for="species" class="col-md-2 col-form-label">{{ __('Species') }}</label>
					
					<div class="col-md-10">
						<input id="species" type="text" class="form-control @error('species') is-invalid @enderror" name="species" value="{{ old('species') }}" required autofocus />
						
						@error('species')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Classification--}}
				<div class="form-group row">
					<label for="classification" class="col-md-2 col-form-label">{{ __('Classification') }}</label>
					
					<div class="col-md-10">
						<input id="classification" type="text" class="form-control @error('classification') is-invalid @enderror" name="classification" value="{{ old('classification') }}" autofocus />
						
						@error('classification')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Given name--}}
				<div class="form-group row">
					<label for="name" class="col-md-2 col-form-label">{{ __('Given name') }}</label>
					
					<div class="col-md-10">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus />
						
						@error('name')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Birth date--}}
				<div class="form-group row">
					<label for="dob" class="col-md-2 col-form-label">{{ __('Date of birth') }}</label>
					
					<div class="col-md-10">
						<input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="name" value="{{ old('dob') }}" autofocus />
						
						@error('dob')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Gender--}}
				<div class="form-group row">
					<label for="gender" class="col-md-2 col-form-label">{{ __('Gender') }}</label>
					
					<div class="col-md-10">
						<select name = "gender" id = "gender" class="form-control @error('gender') is-invalid @enderror">
							<option value = "" {{old('gender') === 'MALE' | old('gender') === 'FEMALE' ? '' : 'selected'}}>Select Gender</option>
							<option value = "MALE" {{old('gender') === 'MALE' ? 'selected' : ''}}>Male</option>
							<option value = "FEMALE" {{old('gender') === 'FEMALE' ? 'selected' : ''}}>Female</option>
						</select>
						
						@error('dob')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Height joined--}}
				<div class="form-group row">
					<label for="height" class="col-md-2 col-form-label">{{ __('Height when joined') }}</label>
					
					<div class="col-md-10">
						<input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height_joined" value="{{ old('height_joined') }}" autofocus />
						
						@error('height')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Weight joined--}}
				<div class="form-group row">
					<label for="weight" class="col-md-2 col-form-label">{{ __('Weight when joined') }}</label>
					
					<div class="col-md-10">
						<input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight_joined" value="{{ old('weight_joined') }}" autofocus />
						
						@error('weight')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Location--}}
				<div class="form-group row">
					<label for="location" class="col-md-2 col-form-label">{{ __('Location in zoo') }}</label>
					
					<div class="col-md-10">
						<select name = "location" id = "location" class="form-control @error('location') is-invalid @enderror">
							<option value = "">Select Location</option>
						</select>
						
						@error('location')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Sponsorship Band--}}
				<div class="form-group row">
					<label for="sponsorshipBand" class="col-md-2 col-form-label">{{ __('Sponsorship Band') }}</label>
					
					<div class="col-md-10">
						<select name = "sponsorship_band_id" id = "sponsorshipBand" class="form-control @error('sponsorshipBand') is-invalid @enderror">
							<option value = "">Select</option>
						</select>
						
						@error('sponsorshipBand')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="card-footer">
			<a href = "{{route('admin.animals.birds')}}">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</a>
			<button type="submit" name="submit-animal-details" class="btn btn-primary">Save changes</button>
	</div>
</div>