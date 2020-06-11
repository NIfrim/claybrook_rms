<div class="row-type-one">
	<div class="row-body">
		<div class="container d-flex justify-content-center">
			{{--Title--}}
			<h2 class="row-title my-3">{{$title}}</h2>
		</div>
		
		<div class="row-cards">
			<div class="container d-flex flex-wrap align-items-center justify-content-center">

				@if($type === 'home')
					
					<x-website.welcome-page :title="$title" :type="$type" :data="$cardsData" />
				
				@endif
			</div>
		</div>
	</div>
</div>