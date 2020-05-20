@extends('layouts.rms')

@section('content')
	<div class="container forms-container">
		<x-forms.animal-details-form :idTemplate="$idTemplate" :type="$formType" :subcategory="$subcategory" :ids="$ids" :species="$species" :classifications="$classifications" />
	</div>
@endsection