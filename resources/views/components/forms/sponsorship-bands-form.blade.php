<form action = "{{$route}}" method="post">
	<div class="card">
		<div class="card-header">
			<h4>{{$title}}</h4>
		</div>
		
		<div class="card-body">
			@csrf
			{{--The current record id--}}
			<input type = "number" id="id" name="id" value="{{$data['currentRow']['id'] ?? ''}}" hidden required readonly>
			
			<div class="container-responsive">
				{{--Band name--}}
				<div class="form-group row">
					<label for="band" class="col-xl-2 col-form-label">{{ __('Band name') }}</label>
					
					<div class="col-xl-10">
						<input
								id="band"
								type="text"
								class="form-control @error('band') is-invalid @enderror"
								name="band"
								value="{{old('band') ?? $data['currentRow']['band'] ?? ''}}"
								required
								autofocus
						/>
						
						@error('band')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Price--}}
				<div class="form-group row">
					<label for="price" class="col-xl-2 col-form-label">{{ __('Band cost') }}</label>
					
					<div class="col-xl-10 input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">£</span>
						</div>
						<input
								id="signageArea"
								type="number"
								step="100"
								max="99999"
								class="form-control @error('price') is-invalid @enderror"
								name="price"
								value="{{old('price') ?? $data['currentRow']['price'] ?? ''}}"
								required
								autofocus
						/>
						
						@error('price')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				{{--Duration--}}
				<div class="form-group row">
					<label for="duration" class="col-xl-2 col-form-label">{{ __('Duration') }}</label>
					
					<div class="col-xl-10 input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">months</span>
						</div>
						<input
								id="duration"
								type="number"
								step="1"
								max="12"
								class="form-control @error('duration') is-invalid @enderror"
								name="duration"
								value="{{old('duration') ?? $data['currentRow']['duration'] ?? ''}}"
								required
								autofocus
						/>
						
						@error('duration')
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
			<button type="submit" name="submitType" value="agreement" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>