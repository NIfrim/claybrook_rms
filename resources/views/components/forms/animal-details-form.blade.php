<!-- Modal -->
<div class="card" id="animalFormCard">
	<div class="card-header">
		<h4>Animal Details - {{ucfirst($type)}} Record</h4>
	</div>
	<div class="card-body">
		<form action = "#" method="post">
			@csrf
			<div class="container-responsive">
				{{--Generated id--}}
				<div class="form-group row">
					<label for="generatedId" class="col-xl-2 col-form-label">{{ __('Generated id') }}</label>

					<div class="col-xl-10">
						<input
								id="generatedId"
								type="text"
								class="form-control @error('generatedId') is-invalid @enderror"
								name="animal_id"
								value="{{old('animal_id') ?? isset($idTemplate) ? $idTemplate.sprintf('%05d', end($ids)) : ''}}"
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
						<input id="generatedId" type="date" class="form-control @error('dateJoined') is-invalid @enderror" name="date_joined" value="{{ old('date_joined') }}" required autofocus/>
						
						@error('dateJoined')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Species--}}
				<div class="form-group row">
					<label for="species" class="col-xl-2 col-form-label">{{ __('Species') }}</label>
					
					<div class="col-xl-10">
						<input id="species" list="speciesList" type="text" class="form-control @error('species') is-invalid @enderror" name="species" value="{{ old('species') }}" required autofocus />
						
						<datalist id="speciesList">
							@foreach($species as $specie)
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
						<input id="classification" list="classificationsList" type="text" class="form-control @error('classification') is-invalid @enderror" name="classification" value="{{ old('classification') }}" autofocus />
						
						<datalist id="classificationsList">
							@foreach($classifications as $classification)
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
								<option value = "" {{old('can_fly') === 'Y' | old('can_fly') === 'N' ? '' : 'selected'}}>Select</option>
								<option value = "Y" {{old('can_fly') === 'Y' ? 'selected' : ''}}>Yes</option>
								<option value = "N" {{old('can_fly') === 'N' ? 'selected' : ''}}>No</option>
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
							<input id="nestConstruction" type="text" maxlength="45" class="form-control @error('nestConstruction') is-invalid @enderror" name="nest_construction" value="{{ old('nest_construction') }}" required />
							
							@error('nestConstruction')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
					</div>
					
					{{--Clutch Size--}}
					<div class="form-group row">
						<label for="clutchSize" class="col-xl-2 col-form-label">{{ __('Clutch Size') }}</label>
						
						<div class="col-xl-10">
							<input id="clutchSize" type="number" max="999" class="form-control @error('clutchSize') is-invalid @enderror" name="clutch_size" value="{{ old('clutch_size') }}" required />
							
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
							<input id="wingspan" type="number" step="0.01" max="999.99" class="form-control @error('wingspan') is-invalid @enderror" name="wingspan" value="{{ old('wingspan') }}" required />
							
							@error('wingspan')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
					</div>
					
					{{--Plumage Colour--}}
					<div class="form-group row">
						<label for="plumage" class="col-xl-2 col-form-label">{{ __('Plumage Colour') }}</label>
						
						<div class="col-xl-10">
							<input id="plumage" type="text" maxlength="45" class="form-control @error('plumage') is-invalid @enderror" name="plumage" value="{{ old('plumage') }}" required />
							
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
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus />
						
						@error('name')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Birth date--}}
				<div class="form-group row">
					<label for="dob" class="col-xl-2 col-form-label">{{ __('Date of birth') }}</label>
					
					<div class="col-xl-10">
						<input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="name" value="{{ old('dob') }}" autofocus />
						
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
					<label for="height" class="col-xl-2 col-form-label">{{ __('Height when joined') }}</label>
					
					<div class="col-xl-10 input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">m</span>
						</div>
						<input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height_joined" value="{{ old('height_joined') }}" autofocus />
						
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
						<input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight_joined" value="{{ old('weight_joined') }}" autofocus />
						
						@error('weight')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Location--}}
				<div class="form-group row">
					<label for="location" class="col-xl-2 col-form-label">{{ __('Location in zoo') }}</label>
					
					<div class="col-xl-10">
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
					<label for="sponsorshipBand" class="col-xl-2 col-form-label">{{ __('Sponsorship Band') }}</label>
					
					<div class="col-xl-10">
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
	<div class="card-footer d-flex justify-content-between">
			<a href = "{{route('admin.animals.'.$subcategory)}}">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</a>
			<button type="submit" name="submit-animal-details" class="btn btn-primary">Submit</button>
	</div>
</div>