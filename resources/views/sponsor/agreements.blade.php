@extends('layouts.app')

@section('content')

	<div class="container p-3">
		<h1 class="text-center m-2">{{$title}}</h1>
	</div>
	
	 {{--Current agreements table row--}}
	<div class="row-type-two">
		<div class="row-top">
			<div class="container d-flex justify-content-start">
				{{--Title--}}
				<h4 class="row-title my-3 p-3 filled rotated">Active agreements</h4>
			</div>
		</div>
		
		<div class="row-middle">
			<div class="container d-flex flex-wrap align-items-start justify-content-center">
				<x-sponsor.agreements-table selectable="true" :model="$model" :category="$category" :subcategory="$subcategory" :relations="$relations" />
			</div>
		</div>
	</div>
	
	
	{{-- New agreement form --}}
	<div class="row-type-two">
		<div class="row-top">
			<div class="container d-flex justify-content-start">
				{{--Title--}}
				<h4 class="row-title my-3 p-3 filled rotated">New agreement</h4>
			</div>
		</div>
		
		<div class="row-middle">
			<div class="container d-flex flex-wrap align-items-start justify-content-center">
				<x-sponsor.agreement-form formType="new" :category="$category" :subcategory="$subcategory" title="Address details" :data="['sponsor' => $sponsor, 'animals' => $animals]" />
			</div>
		</div>
	</div>
	
@endsection

