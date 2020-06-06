	<form method="POST" action="#" id="registerSponsorForm">
		@csrf
		
		<div class="form-group row">
			<label for="title" class="col-form-label text-md-right text-secondary">{{ __('Title') }}</label>
			
			<div class="col-md-12 input-group">
				<div class="input-group-prepend">
					<span class="input-group-text material-icons">perm_identity</span>
				</div>
				<select name = "title" id = "title" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" autofocus>
					<option value = -1 selected>Select</option>
					<option value = "MR">Mr</option>
					<option value = "MRS">Mrs</option>
					<option value = "MISS">Miss</option>
					<option value = "MS">Ms</option>
					<option value = "MX">Mx</option>
				</select>
				
				@error('title')
				<span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
				@enderror
			</div>
		</div>
		
		<div class="form-group row">
			<label for="firstName" class="col-form-label text-md-right text-secondary">{{ __('First Name') }}</label>
			
			<div class="col-md-12 input-group">
				<div class="input-group-prepend">
					<span class="input-group-text material-icons">perm_identity</span>
				</div>
				<input id="firstName" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
				
				@error('first_name')
				<span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
				@enderror
			</div>
		</div>
		
		<div class="form-group row">
			<label for="lastName" class="col-form-label text-md-right text-secondary">{{ __('Last Name') }}</label>
			
			<div class="col-md-12 input-group">
				<div class="input-group-prepend">
					<span class="input-group-text material-icons">perm_identity</span>
				</div>
				<input id="lastName" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
				
				@error('last_name')
				<span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
				@enderror
			</div>
		</div>
		
		<div class="form-group row">
			<label for="newEmail" class="col-form-label text-md-right text-secondary">{{ __('E-Mail Address') }}</label>
			
			<div class="col-md-12 input-group">
				<div class="input-group-prepend">
					<span class="input-group-text material-icons">email</span>
				</div>
				<input id="newEmail" type="text" class="form-control @error('newEmail') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="new-email" autofocus>
				
				@error('newEmail')
				<span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
				@enderror
			</div>
		</div>
		
		<div class="form-group row">
			<label for="jobTitle" class="col-form-label text-md-right text-secondary">{{ __('Job Title') }}</label>
			
			<div class="col-md-12 input-group">
				<div class="input-group-prepend">
					<span class="input-group-text material-icons">work</span>
				</div>
				<input id="jobTitle" type="text" class="form-control @error('jobTitle') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autocomplete="new-job-title" autofocus>
				
				@error('jobTitle')
				<span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
				@enderror
			</div>
		</div>
		
		<div class="form-group row">
			<label for="pContactNumber" class="col-form-label text-md-right text-secondary">{{ __('Contact Number') }}</label>
			
			<div class="col-md-12 input-group">
				<div class="input-group-prepend">
					<span class="input-group-text material-icons">phone</span>
				</div>
				<input id="pContactNumber" type="text" class="form-control @error('pContactNumber') is-invalid @enderror" name="primary_contact_number" value="{{ old('primary_contact_number') }}" required autocomplete="new-contact-number" autofocus>
				
				@error('pContactNumber')
				<span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
				@enderror
			</div>
		</div>
		
		<div class="form-group row">
			<label for="newPassword" class="col-form-label text-md-right text-secondary">{{ __('New Password') }}</label>
			
			<div class="col-md-12 input-group">
				<div class="input-group-prepend">
					<span class="input-group-text material-icons">security</span>
				</div>
				<input id="newPassword" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="password" required autocomplete="new-password">
				
				@error('newPassword')
				<span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
				@enderror
			</div>
		</div>
		
		<div class="form-group row">
			<label for="passwordConfirm" class="col-form-label text-md-right text-secondary">{{ __('Repeat Password') }}</label>
			
			<div class="col-md-12 input-group">
				<div class="input-group-prepend">
					<span class="input-group-text material-icons">security</span>
				</div>
				<input id="passwordConfirm" type="password" class="form-control @error('passwordConfirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
				
				@error('passwordConfirm')
				<span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
				@enderror
			</div>
		</div>
		
		<div class="form-group row mb-0">
			<div class="col-md-12 offset-md-10">
				<button type="submit" class="btn col-md-2 btn-primary" name="register">
					{{ __('Register') }}
				</button>
			</div>
		</div>
	</form>