@extends('layouts.app')

@section('content')
	<div class="section-title">
		<div class="container d-flex justify-content-center">
			<div class="d-flex justify-content-center">
				<h1>{{$title}}</h1>
			</div>
		</div>
	</div>
	
	@if(sizeof($eventsCategories) > 0)
		@foreach($eventsCategories as $eventCategory)
	
			<x-website.row-type-two :type="$subcategory ?? $category" :title="$eventCategory->title" :otherData="$eventCategory" />
		
		@endforeach
		
	@else
		<x-website.row-type-two :type="$subcategory ?? $category" title="No events" :otherData="null" />
	@endif
	
	{{--<x-website.row-type-two :type="$subcategory ?? $category" title="Regular times" :cardsData="$newsCategories" />--}}
	
	<x-website.row-type-three title="Important!" message="Important announcements will go here..." />
	
@endsection

