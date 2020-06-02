@extends('layouts.app')

@section('content')
	<div class="section-title">
		<div class="container d-flex justify-content-center">
			<div class="d-flex justify-content-center">
				<h1>{{$title}}</h1>
			</div>
		</div>
	</div>
	
	<x-website.row-type-two :type="$subcategory ?? ''" :cardsData="$animals ?? []" />
	
	
@endsection

