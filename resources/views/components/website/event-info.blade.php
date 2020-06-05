<div class="d-flex flex-column justify-content-between align-items-start p-2">
	{{--News description with image--}}
	<div class="d-flex justify-content-start">
		{{--News category image--}}
		<img src = "{{$data->image ?? 'https://via.placeholder.com/150x150'}}" class="img-fluid m-2" alt = "Event related image">
		
		{{--News content--}}
		<div class="d-flex flex-column justify-content-start align-items start">
			<div class="d-flex flex-column justify-content-start">
				{{--Between--}}
				<p class="pl-2 m-0">Between: {{$data->start_date}} & {{$data->end_date}}</p>

				
				{{--Category--}}
				<p class="pl-2 m-0">Category: {{$data->eventCategory->title}}</p>
			</div>
			
			{{--News category description--}}
			<h5 class="p-3">{{$data->long_description}}</h5>
		</div>
	</div>
</div>