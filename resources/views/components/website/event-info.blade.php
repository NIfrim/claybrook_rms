{{--News description with image--}}
<div class="d-flex justify-content-start">
	{{--News category image--}}
	<img src = "{{$data->image ? '/images/events/'.$data->image : 'https://via.placeholder.com/150x150'}}" width="150px" class="img-thumbnail m-2" alt = "Event related image">
	
	{{--News content--}}
	<div class="d-flex flex-column justify-content-start align-items start">
		<div class="d-flex flex-column justify-content-start">
			{{--Between--}}
			<p class="pl-2 m-0 text-secondary">Between: {{$data->start_date}} & {{$data->end_date}}</p>

			
			{{--Category--}}
			<p class="pl-2 m-0 text-secondary">Category: {{$data->eventCategory->title}}</p>
		</div>
		
		{{--News category description--}}
		<p class="p-3 text-secondary">{{$data->long_description}}</p>
	</div>
</div>
