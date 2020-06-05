<div class="d-flex flex-column justify-content-between align-items-start p-2">
	{{--News description with image--}}
	<div class="d-flex justify-content-start">
		{{--News category image--}}
		<img src = "{{$data->images[0] ?? 'https://via.placeholder.com/150x150'}}" class="img-fluid m-2" alt = "Event related image">
		
		{{--Zoo history content--}}
		<div class="d-flex flex-column justify-content-start align-items start">
			<h5 class="p-3">{{$data->history}}</h5>
		</div>
	</div>
</div>