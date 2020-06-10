<div class="d-flex flex-column justify-content-start align-items-start p-2">
	@foreach($data->contact_details as $contactType => $detailsArray)

		<h3 class="p-2 text-secondary">{{ucfirst($contactType)}} phone: {{$detailsArray['phone']}}</h3>
		<h3 class="p-2 text-secondary">{{ucfirst($contactType)}} email: {{$detailsArray['email']}}</h3>
	
	@endforeach
</div>