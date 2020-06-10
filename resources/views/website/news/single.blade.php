@extends('layouts.app')

@section('content')
	
	<x-website.row-type-two :type="$subcategory ?? $category" :title="$news->title" :otherData="$news" single="true" />
	
	 {{--Did you know row--}}
	<x-website.row-type-three title="Important!" message="No important news." />
	
@endsection

