<div class="row-type-one">
	<div class="row-body">
		<div class="container d-flex justify-content-center">
			{{--Title--}}
			<h2 class="row-title my-3">{{$title}}</h2>
		</div>
		
		<div class="row-cards">
			<div class="container d-flex flex-wrap align-items-center justify-content-center">
				@if(sizeof($cardsData) > 0)
					
					@foreach($cardsData as $card)
						
						@if($card->getTable() === 'events')
							
							<x-website.event-card
									:title="$card['title']"
									:startDate="$card['start_date']"
									:endDate="$card['end_date']"
									:image="$card['image']"
									:shortDescription="$card['short_description']"
							/>
						
						@elseif($card->getTable() === 'news')
							
							<x-website.news-card
									:title="$card['title']"
									:datePosted="$card['date_posted']"
									:dateExpire="$card['date_expire']"
									:image="$card['image']"
									:shortDescription="$card['short_description']"
							/>
						
						@elseif($card->getTable() === 'animals')
							
							<x-website.animal-card
									:title="$card->species.' - '.$card->name"
									:data="$card"
									:type="$type"
							/>
						
						@endif
					
					
					@endforeach
				
				@else
					
					<h4>No data for {{$title}}</h4>
				
				@endif
			</div>
		</div>
	</div>
</div>