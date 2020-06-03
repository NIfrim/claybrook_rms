@extends('layouts.app')

@section('content')
	{{-- Carousel showing animal images --}}
	<x-website.carousel :category="$category" />
	
	<x-website.row-type-two :type="$subcategory ?? ''" :otherData="$animal" single="true"   />
	
	{{-- Did you know row --}}
	<x-website.did-you-know-row title="Did you know?" :message="$didYouKnowMessage" />
	
@endsection

