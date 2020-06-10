@extends('layouts.rms')

@section('content')
	<div class="container forms-container">
		@switch($subcategory)
			@case('sponsorshipBands')
				<x-forms.sponsorship-bands-form :data="$data" :formType="$formType" :category="$category" :subcategory="$subcategory" title="{{implode(' - ', array_filter([ucfirst($category), ucfirst($subcategory), 'Manage']))}}" />
			@break
			
			@case('accounts')
				<x-forms.sponsors-form :data="$data" :formType="$formType" :category="$category" :subcategory="$subcategory" title="{{implode(' - ', array_filter([ucfirst($category), ucfirst($subcategory), 'Manage']))}}" />
			@break
		
			@case('agreements')
				<x-forms.sponsors-agreements-form :data="$data" :formType="$formType" :category="$category" :subcategory="$subcategory" title="{{implode(' - ', array_filter([ucfirst($category), ucfirst($subcategory), 'Manage']))}}" />
			@break
		
			@case('signage')
			<x-forms.agreement-signage-form :data="$data" :formType="$formType" :category="$category" :subcategory="$subcategory" title="{{implode(' - ', array_filter([ucfirst($category), ucfirst($subcategory), 'Manage']))}}" />
			@break
			
			@default
				<p>Expected 'accounts' | 'agreements' | 'signage' | 'sponsorshipBands'</p>
				<p>Received {{$subcategory}}</p>
		@endswitch
		
	</div>
@endsection