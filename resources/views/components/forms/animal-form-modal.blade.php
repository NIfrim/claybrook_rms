<!-- Modal -->
<div class="modal fade" id="animalForm" role="dialog" aria-hidden="true">
	<div class="animal-form-modal modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<ul class="nav nav-tabs flex-nowrap" id="animalFormTabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="animalDetailsTab" data-toggle="tab" href="#animalDetails" role="tab">Animal Details</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="educationalDetailsTab" data-toggle="tab" href="#educationalDetails" role="tab">Educational Details</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="medicalHistoryTab" data-toggle="tab" href="#medicalHistory" role="tab">Medical/Watchlist History</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="dietaryRequirementsTab" data-toggle="tab" href="#dietaryRequirements" role="tab">Dietary Requirements</a>
					</li>
				</ul>
			</div>
			<form action = "#" method="post">
				@csrf
				
				<div class="modal-body">
					<div class="tab-content" id="animalFormTabContent">
						{{--Animal Details Tab--}}
						<div class="tab-pane fade show active" id="animalDetails" aria-labelledby="animalDetailsTab">
							<h4>Animal Details</h4>
							
							{{--Input rows--}}
							<div class="d-flex flex-column flex-wrap justify-content-start align-items-center animal-form-inputs-wrapper">
								
								{{--Generated id--}}
								<div class="form-group col-md-4">
									<label for="generatedId" class="col-form-label text-md-right">{{ __('Generated id') }}</label>

									<input id="generatedId" type="text" class="form-control @error('generatedId') is-invalid @enderror" name="animal_id" value="{{ old('animal_id') }}" required />
									
									@error('generatedId')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Date joined--}}
								<div class="form-group col-4">
									<label for="dateJoined" class="col-form-label text-md-right">{{ __('Date joined') }}</label>
									
									<input id="generatedId" type="date" class="form-control @error('dateJoined') is-invalid @enderror" name="date_joined" value="{{ old('date_joined') }}" required autofocus/>
									
									@error('dateJoined')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Species--}}
								<div class="form-group col-4">
									<label for="species" class="col-form-label text-md-right">{{ __('Species') }}</label>
									
									<input id="species" type="text" class="form-control @error('species') is-invalid @enderror" name="species" value="{{ old('species') }}" required autofocus />
									
									@error('species')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Classification--}}
								<div class="form-group col-4">
									<label for="classification" class="col-form-label text-md-right">{{ __('Classification') }}</label>
									
									<input id="classification" type="text" class="form-control @error('classification') is-invalid @enderror" name="classification" value="{{ old('classification') }}" autofocus />
									
									@error('classification')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Given name--}}
								<div class="form-group col-4">
									<label for="name" class="col-form-label text-md-right">{{ __('Given name') }}</label>
									
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus />
									
									@error('name')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Birth date--}}
								<div class="form-group col-4">
									<label for="dob" class="col-form-label text-md-right">{{ __('Date of birth') }}</label>
									
									<input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="name" value="{{ old('dob') }}" autofocus />
									
									@error('dob')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Gender--}}
								<div class="form-group col-4">
									<label for="gender" class="col-form-label text-md-right">{{ __('Gender') }}</label>
									
									<select name = "gender" id = "gender" class="form-control @error('gender') is-invalid @enderror">
										<option value = "" {{old('gender') === 'MALE' | old('gender') === 'FEMALE' ? '' : 'selected'}}>Select Gender</option>
										<option value = "MALE" {{old('gender') === 'MALE' ? 'selected' : ''}}>Male</option>
										<option value = "FEMALE" {{old('gender') === 'FEMALE' ? 'selected' : ''}}>Female</option>
									</select>
									
									@error('dob')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Height joined--}}
								<div class="form-group col-4">
									<label for="height" class="col-form-label text-md-right">{{ __('Height when joined') }}</label>
									
									<input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height_joined" value="{{ old('height_joined') }}" autofocus />
									
									@error('height')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Weight joined--}}
								<div class="form-group col-4">
									<label for="weight" class="col-form-label text-md-right">{{ __('Weight when joined') }}</label>
									
									<input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight_joined" value="{{ old('weight_joined') }}" autofocus />
									
									@error('weight')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Location--}}
								<div class="form-group col-4">
									<label for="location" class="col-form-label text-md-right">{{ __('Location in zoo') }}</label>
									
									<select name = "location" id = "location" class="form-control @error('location') is-invalid @enderror">
										<option value = "">Select Location</option>
									</select>
									
									@error('location')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Sponsorship Band--}}
								<div class="form-group col-4">
									<label for="sponsorshipBand" class="col-form-label text-md-right">{{ __('Sponsorship Band') }}</label>
									
									<select name = "sponsorship_band_id" id = "sponsorshipBand" class="form-control @error('sponsorshipBand') is-invalid @enderror">
										<option value = "">Select</option>
									</select>
									
									@error('sponsorshipBand')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
							</div>
						</div>
						
						{{--Education Details Tab--}}
						<div class="tab-pane fade show" id="educationalDetails" aria-labelledby="educationalDetailsTab">
							<h4>Educational details</h4>
							
							{{--Input rows--}}
							<div class="d-flex flex-column flex-wrap justify-content-start align-items-center animal-form-inputs-wrapper">
								
								{{--Can Fly--}}
								{{--@todo Check if animal type is bird--}}
								<div class="form-group col-md-6">
									<label for="canFly" class="col-form-label text-md-right">{{ __('Can Fly') }}</label>
									
									<select name = "can_fly" id = "canFly" class="form-control @error('canFly') is-invalid @enderror">
										<option value = "" {{old('can_fly') === 'Y' | old('can_fly') === 'N' ? '' : 'selected'}}>Select</option>
										<option value = "Y" {{old('can_fly') === 'Y' ? 'selected' : ''}}>Yes</option>
										<option value = "N" {{old('can_fly') === 'N' ? 'selected' : ''}}>No</option>
									</select>
									
									@error('canFly')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Lifespan--}}
								{{--@todo move lifespan to educational info in database table--}}
								<div class="form-group col-md-6">
									<label for="lifespan" class="col-form-label text-md-right">{{ __('Average lifespan') }}</label>
									
									<input id="lifespan" type="text" class="form-control @error('lifespan') is-invalid @enderror" name="lifespan" value="{{ old('lifespan') }}" required />
									
									@error('lifespan')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Global population--}}
								<div class="form-group col-md-6">
									<label for="population" class="col-form-label text-md-right">{{ __('Global population') }}</label>
									
									<input id="population" type="text" class="form-control @error('population') is-invalid @enderror" name="population" value="{{ old('population') }}" required />
									
									@error('population')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Natural Habitat--}}
								<div class="form-group col-md-6">
									<label for="habitatId" class="col-form-label text-md-right">{{ __('Natural habitat') }}</label>
									
									<input id="habitatId" type="text" class="form-control @error('habitatId') is-invalid @enderror" name="habitat_id" value="{{ old('habitat_id') }}" list="habitatsList" required />
									{{--@todo fill list from database--}}
									<datalist id = "habitatsList">
										<option value = "" selected>Habitat name 1</option>
									</datalist>
									
									@error('habitatId')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Nest construction--}}
								<div class="form-group col-md-6">
									<label for="nestConstruction" class="col-form-label text-md-right">{{ __('Nest construction') }}</label>
									
									<input id="nestConstruction" type="text" maxlength="45" class="form-control @error('nestConstruction') is-invalid @enderror" name="nest_construction" value="{{ old('nest_construction') }}" required />
									
									@error('nestConstruction')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Clutch Size--}}
								<div class="form-group col-md-6">
									<label for="clutchSize" class="col-form-label text-md-right">{{ __('Clutch Size') }}</label>
									
									<input id="clutchSize" type="number" max="999" class="form-control @error('clutchSize') is-invalid @enderror" name="clutch_size" value="{{ old('clutch_size') }}" required />
									
									@error('clutchSize')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Wingspan--}}
								<div class="form-group col-md-6">
									<label for="wingspan" class="col-form-label text-md-right">{{ __('Wingspan') }}</label>
									
									<input id="wingspan" type="number" step="0.01" max="999.99" class="form-control @error('wingspan') is-invalid @enderror" name="wingspan" value="{{ old('wingspan') }}" required />
									
									@error('wingspan')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
								{{--Plumage Colour--}}
								<div class="form-group col-md-6">
									<label for="plumage" class="col-form-label text-md-right">{{ __('Plumage Colour') }}</label>
									
									<input id="plumage" type="text" maxlength="45" class="form-control @error('plumage') is-invalid @enderror" name="plumage" value="{{ old('plumage') }}" required />
									
									@error('plumage')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
								
							</div>
						</div>
						
						<div class="tab-pane fade show" id="medicalHistory" aria-labelledby="medicalHistoryTab">
							<h3>Medical History</h3>
						</div>
						
						<div class="tab-pane fade show" id="dietaryRequirements" aria-labelledby="dietaryRequirementsTab">
							<h3>Dietary requirements</h3>
						</div>
					</div>
				</div>
				<div class="modal-footer flex-nowrap justify-content-between">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit-animal" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>