@extends('layouts.rms')

@section('content')
	<div class="container forms-container">
		<x-forms.animal-form :data="$data" :formType="$formType" :category="$category" :subcategory="$subcategory" title="{{implode(' - ', array_filter([ucfirst($category), ucfirst($subcategory), 'Manage']))}}" />
	</div>
@endsection