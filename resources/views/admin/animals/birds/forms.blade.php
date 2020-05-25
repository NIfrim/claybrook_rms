@extends('layouts.rms')

@section('content')
	<div class="container forms-container">
		<x-forms.animal-form :data="$data" :formType="$formType" :category="$category" :subcategory="$subcategory" title="Animals - Birds - Manage" />
	</div>
@endsection