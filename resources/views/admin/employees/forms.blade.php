@extends('layouts.rms')

@section('content')
	<div class="container forms-container">
		
		@if($subcategory === 'accounts')
			
			<x-forms.employee-account-form
					:data="$data"
					:formType="$formType"
					:category="$category"
					:subcategory="$subcategory"
					title="{{implode(' - ', array_filter([ucfirst($category), ucfirst($subcategory), 'Manage']))}}" />
			
		@elseif($subcategory === 'accountTypes')
			
			<x-forms.account-type-form
					:data="$data"
					:formType="$formType"
					:category="$category"
					:subcategory="$subcategory"
					title="{{implode(' - ', array_filter([ucfirst($category), ucfirst($subcategory), 'Manage']))}}" />
			
		@endif
		
	</div>
@endsection