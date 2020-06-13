@extends('layouts.app')

@section('content')
	<div class="section-title">
		<div class="container d-flex justify-content-center">
			<div class="d-flex justify-content-center">
				<h1>{{$title}}</h1>
			</div>
		</div>
	</div>
	
	
	
	@if(sizeof($newsCategories) > 0)
		@foreach($newsCategories as $newsCategory)
	
			<x-website.row-type-two :type="$subcategory ?? $category" :title="$newsCategory->title" :otherData="$newsCategory" />
		
		@endforeach
		
	@else
		
		<x-website.row-type-two :type="$subcategory ?? $category" title="No news" :otherData="null" />
		
	@endif
	
	{{--<x-website.row-type-two :type="$subcategory ?? $category" title="Regular times" :cardsData="$newsCategories" />--}}
	
	<x-website.row-type-three title="Important!" message="Important announcements will go here..." />
	
@endsection

