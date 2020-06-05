@extends('layouts.app')

@section('content')
	{{-- Carousel showing animal images --}}
	<x-website.carousel :category="$category" />

	<x-website.row-type-two :type="$subcategory ?? $category" :title="'I am '.$animal->name" :otherData="$animal" single="true"  />
	
	{{-- Did you know row --}}
	<x-website.row-type-three title="Did you know?" :message="$animal->long_description" />
	
@endsection

