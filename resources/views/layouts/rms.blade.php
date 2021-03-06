<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>{{ config('app.name', 'Laravel') }}</title>
	
	<!-- Scripts -->
	<script src="{{ mix('js/app.js') }}" defer></script>
	<script src="{{ mix('css/app.css') }}" defer></script>
	
	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
	<link rel = "stylesheet" href = "https://cdn.datatables.net/responsive/2.2.4/css/responsive.dataTables.min.css">

</head>
<body>
<div id="rms" class="d-flex flex-nowrap">
	{{--SIDE NAV--}}
	@guest
		{{-- If not authenticated --}}
		@yield('login')
	
	@else
		{{-- If authenticated --}}
		<x-navigation.side-nav :category="$category" :subcategory="$subcategory" />
		
		<div class="flex-grow-1 d-flex flex-column">
			{{--TOP NAV--}}
			<x-navigation.top-nav :category="$category" :subcategory="$subcategory" :subcategory2="$subcategory2 ?? null" :formType="$formType ?? null" />
			<main id="main" class="container overflow-auto">
				@yield('content')
			</main>
		</div>
		
		@if(session('success'))
			<div class="alert-wrapper d-flex justify-content-center fade show" role="alert">
				<div class="alert d-flex justify-content-center alert-success alert-dismissible">
					<strong class="m-2">{{session('success')}}</strong>
					<button type="button" class="close m-2" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		
		@elseif(session('error'))
			<div class="alert d-flex justify-content-center alert-danger alert-dismissible fade show" role="alert">
				<strong>{{session('error')}}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
	@endauth
</div>
</body>
</html>
