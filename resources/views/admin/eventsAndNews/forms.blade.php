@extends('layouts.rms')

@section('content')
	<div class="container forms-container">
		@if($formType === 'newCategory' || $subcategory === 'eventsCategory' || $subcategory === 'newsCategory')
			<x-forms.events-and-news-category-form :data="$data" :formType="$formType" :category="$category" :subcategory="$subcategory" title="{{implode(' - ', array_filter([ucfirst($subcategory), 'Category', 'Manage']))}}" />
		@else
			<x-forms.events-and-news-form :data="$data" :formType="$formType" :category="$category" :subcategory="$subcategory" title="{{implode(' - ', array_filter([ucfirst($subcategory), 'Manage']))}}" />
		@endif
	</div>
@endsection