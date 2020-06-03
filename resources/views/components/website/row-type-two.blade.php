<div class="row-type-two">
	<div class="row-top">
		<div class="container d-flex justify-content-start">
			{{--Title--}}
			<h4 class="row-title my-3 p-3 filled rotated">{{$title}}</h4>
		</div>
	</div>
	
	<div class="row-middle">
		<div class="container d-flex flex-wrap align-items-center justify-content-between">
			@if($cardsData)
				
				@foreach($cardsData as $card)
					<x-website.animal-card
							:title="$card->species.' - '.$card->name"
							:data="$card"
							:type="$type"
					/>
				@endforeach
			
			@elseif($single)
				
				@if(in_array($otherData->type, ['BIRD', 'FISH', 'MAMMAL', 'REPTILE']))
					
					<ul class="quick-info-list list-unstyled d-flex flex-column justify-content-between align-items-baseline">
						<li class="list-item d-flex">
							<h4 class="p-1">Species:</h4>
							<h4 class="p-1"><small class="text-white">{{$otherData->species}}</small></h4>
						</li>
						
						<li class="list-item d-flex">
							<h4 class="p-1">Name:</h4>
							<h4 class="p-1"><small class="text-white">{{$otherData->name}}</small></h4>
						</li>
						
						<li class="list-item d-flex">
							<h4 class="p-1">Height:</h4>
							<h4 class="p-1"><small class="text-white">{{$otherData->height ?? ' - '}} m</small></h4>
						</li>
						
						<li class="list-item d-flex">
							<h4 class="p-1">Weight:</h4>
							<h4 class="p-1"><small class="text-white">{{$otherData->weight ?? ' - '}} kg</small></h4>
						</li>
						
						<li class="list-item d-flex">
							<h4 class="p-1">Life Span:</h4>
							<h4 class="p-1"><small class="text-white">{{$otherData->life_span ?? ' - '}}</small></h4>
						</li>
						
						<li class="list-item d-flex">
							<h4 class="p-1">Diet:</h4>
							<h4 class="p-1"><small class="text-white">{{$otherData->diet ?? ' - '}}</small></h4>
						</li>
						
						@switch($type)
							
							@case('birds')
								<li class="list-item d-flex">
									<h4 class="p-1">Wingspan:</h4>
									<h4 class="p-1"><small class="text-white">{{$otherData->wingspan ?? ' - '}} cm</small></h4>
								</li>
								
								<li class="list-item d-flex">
									<h4 class="p-1">Nest construction:</h4>
									<h4 class="p-1"><small class="text-white">{{$otherData->nest_construction ?? ' - '}}</small></h4>
								</li>
							@break
						
							@case('fish')
							@break
							
							@case('mammals')
							@break
							
							@case('reptiles')
							@break
							
						@endswitch
					
					</ul>
				@endif
				
			@else
				
				<h4 class="p-1">No data for {{$title}}</h4>
			
			@endif
		</div>
	</div>
	
	@if(isset($action))
	
		<div class="row-bottom">
			<div class="container d-flex justify-content-center">
				<button class="btn-lg">
					<a href = "#"><h4 class="m-0 p-2">{{$action}}</h4></a>
				</button>
			</div>
		</div>
	
	@endif
	
</div>