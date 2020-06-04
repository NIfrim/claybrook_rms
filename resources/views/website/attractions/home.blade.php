@extends('layouts.app')

@section('content')
	<div class="section-title">
		<div class="container d-flex justify-content-center">
			<div class="d-flex justify-content-center">
				<h1>{{$title}}</h1>
			</div>
		</div>
	</div>
	
	@if(sizeof($attractionsCategories) > 0)
		@foreach(array_keys($attractionsCategories->toArray()) as $rideType)

			<x-website.row-type-two :type="$category" :title="$rideType.' rides'" :cardsData="$attractionsCategories->get($rideType) ?? null" action="Visit us for more rides" />
		
		@endforeach
	@endif
	
	{{--<x-website.did-you-know-row title="Did you know?" :message="$didYouKnowMessage" />--}}
	
@endsection

