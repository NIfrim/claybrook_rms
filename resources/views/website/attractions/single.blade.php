@extends('layouts.app')

@section('content')
	 {{--Carousel showing attraaction images --}}
	<x-website.carousel :category="$category" />
	
	<x-website.row-type-two :type="$subcategory ?? $category" title="Some quick info" :otherData="$attraction" single="true"   />
	
	 {{--Did you know row--}}
	<x-website.row-type-three title="Did you know?" :message="$attraction->long_description" />
	
@endsection

