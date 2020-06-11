@extends('layouts.rms')

@section('content')
	<div class="container mb-3" id="tabsWrapper">
		<ul class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link {{$subcategory === 'details' ? 'active' : ''}}" href="{{route('admin.zoo.manage', ['type' => 'details', 'id' => 1])}}">Zoo Details</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{$subcategory === 'address' ? 'active' : ''}}" href="{{route('admin.zoo.manage', ['type' => 'address', 'id' => 1])}}">Zoo Address</a>
			</li>
		</ul>
	</div>
	
	<div class="tab-content" id="pillsContentWrapper">
		
		<div class="container forms-container tab-pane {{$subcategory === 'details' ? 'active' : ''}}" role="tabpanel" id="zooDetailsForm">
			
			<x-forms.zoo-details-form
					:data="$data"
					:formType="$formType"
					:category="$category"
					subcategory="details"
					title="{{implode(' - ', array_filter([ucfirst($category), ucfirst('details'), 'Manage']))}}"/>
		
		</div>
		
		<div class="container forms-container tab-pane {{$subcategory === 'address' ? 'active' : ''}}" role="tabpanel" id="zooAddressForm">
			
			<x-forms.zoo-address-form
					:data="$data"
					:formType="$formType"
					:category="$category"
					subcategory="address"
					title="{{implode(' - ', array_filter([ucfirst($category), ucfirst('address'), 'Manage']))}}"/>
		
		</div>
		
		<div class="container tab-pane" role="tabpanel" id="zooContactDetailsForm">
			
			<h1>Zoo Contact details</h1>
		
		</div>
	
	</div>
@endsection