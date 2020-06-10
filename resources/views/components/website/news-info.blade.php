<div class="d-flex flex-column justify-content-between align-items-start p-2">
	{{--News description with image--}}
	<div class="d-flex justify-content-start">
		{{--News category image--}}
		<img src = "{{$data->image ? '/images/news/'.$data->image : 'https://via.placeholder.com/150x150'}}" width="150px" class="img-thumbnail m-2" alt = "News related image">
		
		{{--News content--}}
		<div class="d-flex flex-column justify-content-start align-items start">
			<div class="d-flex flex-column justify-content-start">
				{{--Date posted--}}
				<p class="pl-2 m-0 text-secondary">Posted: {{$data->date_posted}}</p>
				
				{{--Category--}}
				<p class="pl-2 m-0 text-secondary">Category: {{$data->newsCategory->title}}</p>
			</div>
			
			{{--News category description--}}
			<p class="p-3 text-secondary">{{$data->long_description}}</p>
		</div>
	</div>
</div>