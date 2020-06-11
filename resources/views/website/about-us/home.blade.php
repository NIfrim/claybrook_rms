@extends('layouts.app')

@section('content')
	{{--Carousel accepts array with image pathnames, if none passed it will show placeholders--}}
	<x-website.carousel :category="$subcategory ?? $category" />
	
	<x-website.row-type-two :type="$subcategory ?? $category" title="Our history" :otherData="$zoo" />
	
	<x-website.row-type-three title="Some quick numbers!" :category="$subcategory ?? $category" />
	
@endsection

