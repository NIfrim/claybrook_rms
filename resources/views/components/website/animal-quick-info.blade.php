<ul class="quick-info-list list-unstyled d-flex flex-column justify-content-between align-items-baseline">
	<li class="list-item d-flex">
		<h4 class="p-1">Species:</h4>
		<h4 class="p-1"><small class="text-secondary">{{$data->species}}</small></h4>
	</li>
	
	<li class="list-item d-flex">
		<h4 class="p-1">Name:</h4>
		<h4 class="p-1"><small class="text-secondary">{{$data->name}}</small></h4>
	</li>
	
	<li class="list-item d-flex">
		<h4 class="p-1">Height:</h4>
		<h4 class="p-1"><small class="text-secondary">{{$data->height_current ?? ' - '}} m</small></h4>
	</li>
	
	<li class="list-item d-flex">
		<h4 class="p-1">Weight:</h4>
		<h4 class="p-1"><small class="text-secondary">{{$data->weight_current ?? ' - '}} kg</small></h4>
	</li>
	
	<li class="list-item d-flex">
		<h4 class="p-1">Life Span:</h4>
		<h4 class="p-1"><small class="text-secondary">{{$data->life_span ?? ' - '}}</small></h4>
	</li>
	
	<li class="list-item d-flex">
		<h4 class="p-1">Diet:</h4>
		<h4 class="p-1"><small class="text-secondary">{{$data->diet ?? ' - '}}</small></h4>
	</li>
	
	@switch($type)
		
		@case('birds')
		<li class="list-item d-flex">
			<h4 class="p-1">Wingspan:</h4>
			<h4 class="p-1"><small class="text-secondary">{{$data->wingspan ?? ' - '}} cm</small></h4>
		</li>
		
		<li class="list-item d-flex">
			<h4 class="p-1">Nest construction:</h4>
			<h4 class="p-1"><small class="text-secondary">{{$data->nest_construction ?? ' - '}}</small></h4>
		</li>
		@break
		
		@case('fish')
		<li class="list-item d-flex">
			<h4 class="p-1">Colour:</h4>
			<h4 class="p-1"><small class="text-secondary">{{$data->colour}}</small></h4>
		</li>
		
		<li class="list-item d-flex">
			<h4 class="p-1">Water temperature:</h4>
			<h4 class="p-1"><small class="text-secondary">{{$data->water_temperature ?? ' - '}}Celsius</small></h4>
		</li>
		@break
		
		@case('reptiles')
		<li class="list-item d-flex">
			<h4 class="p-1">Reproduction type:</h4>
			<h4 class="p-1"><small class="text-secondary">{{$data->reproduction_type}}</small></h4>
		</li>
		@break
	
	@endswitch

</ul>