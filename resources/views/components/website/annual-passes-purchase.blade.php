<div class="d-flex flex-column justify-content-start align-items-center">
	<form action = "#" class="container-responsive">
		@csrf
		
		{{--Calendar picker row--}}
		<div class="form-group row">
			
			<label for="ticketDate" class="col-xl-4 col-form-label text-secondary text-left">{{ __('Select start date') }}</label>
			
			<div class="col-xl-8">
				<input id="ticketDate"
							 type="date"
							 class="form-control @error('ticketDate') is-invalid @enderror"
							 name="ticket_date"
							 required
							 autofocus />
				
				@error('ticketDate')
				<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
				@enderror
			</div>
		</div>
		
		{{--Tickets table--}}
		<table class="table table-responsive">
			<thead class="thead-light">
			<tr>
				<th scope="col" class="text-center">Type</th>
				<th scope="col" class="text-center">Gate Price</th>
				<th scope="col" class="text-center">Online Price</th>
				<th scope="col" class="text-center" style="width: 100px">Amount</th>
			</tr>
			</thead>
			
			<tbody>
			@foreach($data as $annualPass)
				<tr>
					<td scope="row" class="text-center text-secondary">{{$annualPass->type}}</td>
					<td scope="row" class="text-center text-secondary">{{$annualPass->price_gate}}</td>
					<td scope="row" class="text-center text-secondary">{{$annualPass->price_online}}</td>
					<td scope="row" class="text-center text-secondary">
						{{--Ticket select amount--}}
						<div class="form-group">
							<input type = "number"
										 max="99.99"
										 step="any"
										 id="ticketAmount"
										 name="ticket_amount"
										 value="{{old('ticket_amount')}}"
										 class="form-control @error('ticketAmount') is-invalid @enderror"
										 required
										 autofocus>
							
							@error('ticketAmount')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	
	</form>
</div>