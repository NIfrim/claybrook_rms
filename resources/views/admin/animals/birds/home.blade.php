@extends('layouts.rms')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<x-birds.table selectable=true :model="$model" :relations="$relations"/>
		</div>
	</div>
@endsection
