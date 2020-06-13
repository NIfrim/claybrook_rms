
	<div class="d-flex flex-column justify-content-between align-items-end mr-4">
		<h2 class="p-2 align-self-stretch bg-primary rounded-lg text-center opening-times-header">Day</h2>
		@foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
			<h3 class="p-2 text-secondary">{{$day}}</h3>
		@endforeach
	</div>
	
	<div class="d-flex flex-column justify-content-between align-items-end mr-4">
		<h2 class="p-2 align-self-stretch bg-primary rounded-lg text-center opening-times-header">Opens</h2>
		@foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $index => $day)
			{{--For days up to Saturday--}}
			@if($index < 5)
				<h3 class="p-2 text-secondary">{{$data->opening_times['weekdays']['opens']}}</h3>
			@else
				<h3 class="p-2 text-secondary">{{$data->opening_times['weekend']['opens']}}</h3>
			@endif
		@endforeach
	</div>
	
	<div class="d-flex flex-column justify-content-between align-items-end mr-4">
		<h2 class="p-2 align-self-stretch bg-primary rounded-lg text-center opening-times-header">Closes</h2>
		@foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $index => $day)
			{{--For days up to Saturday--}}
			@if($index < 5)
				<h3 class="p-2 text-secondary">{{$data->opening_times['weekdays']['closes']}}</h3>
			@else
				<h3 class="p-2 text-secondary">{{$data->opening_times['weekend']['closes']}}</h3>
			@endif
		@endforeach
	</div>
