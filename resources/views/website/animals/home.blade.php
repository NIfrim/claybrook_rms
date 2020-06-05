@extends('layouts.app')

@section('content')
	<div class="section-title">
		<div class="container d-flex justify-content-center">
			<div class="d-flex justify-content-center">
				<h1>{{$title}}</h1>
			</div>
		</div>
	</div>
	
	<x-website.row-type-two :type="$subcategory ?? $category" :title="'Some '.$subcategory" :cardsData="$animals ?? []" action="Visit us for more {{$subcategory}}" />
	
	{{-- Did you know row --}}
	<x-website.row-type-three title="Did you know?" message="Some interesting facts about the zoo animals..." />
	
@endsection

