@if($title === 'How to get here?')

	<div class="d-flex col-md-12 justify-content-center">
		
		<div class="d-flex flex-column justify-content-between mr-5 mapAndDirectionsColumn">
			<h3 class="p-2 bg-primary rounded-lg align-self-stretch text-center">Address</h3>
			<h4 class="p-2 text-left text-secondary">{{join(', ', $data->address)}}</h4>
		</div>
		
		<div class="d-flex flex-column justify-content-between mapAndDirectionsColumn">
			<h3 class="p-2 bg-primary rounded-lg align-self-stretch text-center">Contact Numbers</h3>
			@foreach($data->contact_details as $key => $array)
				<div class="d-flex flex-nowrap">
					<h4 class="p-2 text-secondary text-nowrap">{{$key}}:</h4>
					<h4 class="p-2 text-secondary text-nowrap">{{$array['phone']}}</h4>
				</div>
			@endforeach
		</div>
		
	</div>

@elseif($title === 'Already here?')

	<div class="d-flex flex-column justify-content-start align-items-start">
		<h3 class="p-2 text-secondary">Here is a map of the Zoo to help you find what you are looking:</h3>
		<img src = "{{'/images/zoo/'.$data->map_image}}" class="img-fluid" alt = "Map with area view of the entire zoo">
	</div>

@endif