<div class="row-type-two">
	<div class="row-top">
		<div class="container d-flex justify-content-start">
			{{--Title--}}
			<h4 class="row-title my-3 p-3 filled rotated">{{$title}}</h4>
		</div>
	</div>
	
	<div class="row-middle">
		<div class="container d-flex flex-wrap align-items-start justify-content-start">

			@if(in_array($type, ['BIRD', 'MAMMAL', 'FISH', 'REPTILE']) || in_array($type, ['birds', 'mammals', 'fish', 'reptiles']))

				@if($cardsData)
					
					@foreach($cardsData as $card)
						<x-website.animal-card
								:title="$card->species.' - '.$card->name"
								:data="$card"
								:type="$type"
						/>
					@endforeach
				
				@elseif($single)
					
					<x-website.animal-quick-info :type="$type" :data="$otherData" />
				
				@else
					
					<h4 class="p-1">No data for {{$title}}</h4>
				
				@endif
				
			@elseif($type === 'attractions')

				@if($cardsData)
					
					@foreach($cardsData as $attraction)
						<x-website.attraction-card
								:id="$attraction->id"
								:name="$attraction->name"
								:type="$attraction->type"
								:shortDescription="$attraction->short_description"
								:image="$attraction->images ? $attraction->images[0] : null"
						/>
					@endforeach
				
				@elseif($single)
					
					<x-website.attraction-quick-info :data="$otherData" />
					
				@endif
			
			@elseif($type === 'opening-times')
			
				<x-website.opening-times :data="$otherData" />
			
			@elseif($type === 'map-and-directions')
				
				<x-website.map-and-directions :title="$title" :data="$otherData" />
			
			@elseif($type === 'news')
				
				@if($single)
					
					<x-website.news-info :title="$title" :data="$otherData" />
					
				@else
					
					<x-website.news-category-row :title="$title"  :data="$otherData" />
					
				@endif
			
			
			@elseif($type === 'events')
				
				@if($single)
					
					<x-website.event-info :title="$title" :data="$otherData" />
				
				@else
					
					<x-website.events-category-row :title="$title"  :data="$otherData" />
				
				@endif
			
			
			@elseif($type === 'about-us')
				
					<x-website.about-us-info :title="$title"  :data="$otherData" />
			
			@elseif($type === 'contact-details')
				
				@if($title === 'Our Location')
					
					<x-website.contact-us-location :title="$title"  :data="$otherData" />
					
				@else
					
					<x-website.contact-us-info :title="$title"  :data="$otherData" />
					
				@endif
			
			
			@elseif($type === 'tickets-and-passes')
				
				@if($title === 'Tickets')
					
					<x-website.tickets-purchase :title="$title"  :data="$otherData" />
				
				@elseif($title === 'Annual Passes')
					
					<x-website.annual-passes-purchase :title="$title"  :data="$otherData" />
				
				@endif
			
			@elseif($type === 'become-a-sponsor')
				
				@if($title === 'Sponsorship Details')
					
					<x-website.sponsorship-details :title="$title" :data="$otherData" />
					
				@elseif($title === 'Register as a sponsor')
				
					<div class="d-flex flex-column">
						<h4 class="p-2 text-secondary">If all is good, use the form below to register as a sponsor:</h4>
						<x-website.sponsor-registration-form :title="$title" />
					</div>
				
				@endif
			
			@endif
			
		</div>
	</div>
	
	@if(isset($action))
	
		<div class="row-bottom">
			<div class="container d-flex justify-content-center">
				<button class="btn-lg">
					<a href = "{{route('website.ticketsAndPasses.show')}}"><h4 class="m-0 p-2">{{$action}}</h4></a>
				</button>
			</div>
		</div>
	
	@endif
	
</div>