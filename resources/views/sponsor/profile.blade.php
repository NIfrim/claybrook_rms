@extends('layouts.app')

@section('content')
	
	<div class="container p-3">
		<h2 class="text-center m-2">{{$title}}</h2>
	</div>
	
	<div class="row-type-two">
		<div class="row-top">
			<div class="container d-flex justify-content-start">
				{{--Title--}}
				<h4 class="row-title my-3 p-3 filled rotated">Personal Details</h4>
			</div>
		</div>
		
		<div class="row-middle">
			<div class="container d-flex flex-wrap align-items-start justify-content-center">
				<x-sponsor.profile-form :formType="$formType" :category="$category" :subcategory="$subcategory" title="Personal details" :data="$data" />
			</div>
		</div>
	</div>
	
	
	<div class="row-type-two">
		<div class="row-top">
			<div class="container d-flex justify-content-start">
				{{--Title--}}
				<h4 class="row-title my-3 p-3 filled rotated">Address</h4>
			</div>
		</div>
		
		<div class="row-middle">
			<div class="container d-flex flex-wrap align-items-start justify-content-center">
				<x-sponsor.address-form :formType="$formType" :category="$category" :subcategory="$subcategory" title="Address details" :data="$data" />
			</div>
		</div>
	</div>
	
@endsection

