@extends('layouts.rms')

@section('content')
	<div class="container forms-container">

		<x-forms.tickets-and-passes-form :data="$data" :formType="$formType" :category="$category" :subcategory="$subcategory" title="{{implode(' - ', array_filter([ucfirst($subcategory), 'Manage']))}}" />

	</div>
@endsection