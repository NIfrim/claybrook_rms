<ul class="quick-info-list list-unstyled d-flex flex-column justify-content-between align-items-baseline">
	<li class="list-item d-flex">
		<h4 class="p-1">Ride type:</h4>
		<h4 class="p-1"><small class="text-white">{{$data->type}}</small></h4>
	</li>
	
	<li class="list-item d-flex">
		<h4 class="p-1">Suitable for:</h4>
		<h4 class="p-1"><small class="text-white">{{ucfirst(strtolower($data->for))}}</small></h4>
	</li>
	
	<li class="list-item d-flex">
		<h4 class="p-1">Minimum height:</h4>
		<h4 class="p-1"><small class="text-white">{{$data->minimum_height}} cm</small></h4>
	</li>
	
	<li class="list-item d-flex">
		<h4 class="p-1">Ride intensity:</h4>
		<h4 class="p-1"><small class="text-white">{{ucfirst(strtolower($data->ride_intensity))}}</small></h4>
	</li>
</ul>