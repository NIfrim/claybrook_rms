<div class="d-flex flex-column justify-content-between align-items-start p-2">
	{{--News description with image--}}
	<div class="d-flex justify-content-start">
		{{--News category image--}}
		<img src = "{{$data && $data->image ? '/images/news_categories/'.$data->image : 'https://via.placeholder.com/150x150'}}" width="150px" class="img-thumbnail m-2" alt = "News category image">
		{{--News category description--}}
		<h4 class="p-2">{{$data->short_description ?? ''}}</h4>
	</div>
	
	
	{{--News as cards--}}
	<div class="d-flex justify-content-start flex-wrap">
		@if($data)
			
			@foreach($data->news as $card)
				
				<x-website.news-card
						:id="$card->id"
						:title="$card['title']"
						:datePosted="$card['date_posted']"
						:dateExpire="$card['date_expire']"
						:image="$card['image']"
						:shortDescription="$card['short_description']"
				/>
			
			@endforeach
			
		@endif
	</div>
</div>