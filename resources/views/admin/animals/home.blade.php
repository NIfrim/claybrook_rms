@extends('layouts.rms')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<x-tables.animals-table selectable=true :model="$model" :relations="$relations" :category="$category" :subcategory="$subcategory" />
		</div>
	</div>
@endsection
