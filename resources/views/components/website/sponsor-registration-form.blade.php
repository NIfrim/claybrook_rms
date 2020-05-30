<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($registerRoute) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
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
                                <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newEmail" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="newEmail" type="text" class="form-control @error('newEmail') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="new-email" autofocus>

                                    @error('newEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jobTitle" class="col-md-4 col-form-label text-md-right">{{ __('Job Title') }}</label>

                                <div class="col-md-6">
                                    <input id="jobTitle" type="text" class="form-control @error('jobTitle') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autocomplete="new-job-title" autofocus>

                                    @error('jobTitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pContactNumber" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                                <div class="col-md-6">
                                    <input id="pContactNumber" type="text" class="form-control @error('pContactNumber') is-invalid @enderror" name="primary_contact_number" value="{{ old('primary_contact_number') }}" required autocomplete="new-contact-number" autofocus>

                                    @error('pContactNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newPassword" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="newPassword" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('newPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="passwordConfirm" class="col-md-4 col-form-label text-md-right">{{ __('Repeat Password') }}</label>

                                <div class="col-md-6">
                                    <input id="passwordConfirm" type="password" class="form-control @error('passwordConfirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

                                    @error('passwordConfirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="register">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>