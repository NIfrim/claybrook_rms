@extends('layouts.app')

@section('content')
	
	<x-website.row-type-two :type="$subcategory ?? $category" title="Our Location" :otherData="$zoo" />
	
	<x-website.row-type-two :type="$subcategory ?? $category" title="Get in touch" :otherData="$zoo" />
	
	<x-website.row-type-three title="Important!" message="No important announcements." />
	
@endsection

