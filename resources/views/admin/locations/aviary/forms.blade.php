@extends('layouts.rms')

@section('content')
	<div class="container forms-container">
		<x-forms.location-details-form
				:idTemplate="$idTemplate"
				:formType="$formType"
				:subcategory="$subcategory"
				:ids="$ids"
				:zooId="$zooId"
		/>
	</div>
@endsection