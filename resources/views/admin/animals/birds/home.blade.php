@extends('layouts.rms')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<x-tables.animals-table selectable=true showId=true :columns="$columns" :rows="$rows"/>
		</div>
	</div>
@endsection
