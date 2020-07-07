@if($data && sizeof($data) > 0)
	
	@foreach($data as $card)
		
		@if($card->getTable() === 'events')
			
			<x-website.event-card
					:id="$card->id"
					:title="$card['title']"
					:startDate="$card['start_date']"
					:endDate="$card['end_date']"
					:image="$card['image']"
					:shortDescription="$card['short_description']"
			/>
		
		@elseif($card->getTable() === 'news')
			
			<x-website.news-card
					:id="$card->id"
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
					:type="$card->type"
			/>
		
		@endif
	
	@endforeach

@else
	
	<h4>No data for {{$title}}</h4>

@endif