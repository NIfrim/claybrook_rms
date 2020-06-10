@extends('layouts.app')

@section('content')
	<div class="section-title">
		<div class="container d-flex justify-content-center">
			<div class="d-flex justify-content-center">
				<h1>{{$title}}</h1>
			</div>
		</div>
	</div>
	
	<x-website.row-type-two :type="$subcategory ?? $category" title="Sponsorship Details" :otherData="$sponsorshipBands" />
	
	<x-website.row-type-two :type="$subcategory ?? $category" title="Register as a sponsor" />
	
	<x-website.row-type-three title="Important!" message="Important announcements will go here..." />
	
@endsection

