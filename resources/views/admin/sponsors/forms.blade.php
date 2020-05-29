@extends('layouts.rms')

@section('content')
	<div class="container forms-container">
		@if($formType === 'new')
			<p>New forms</p>
			
		@else
			<p>Edit forms</p>
		@endif
	</div>
@endsection