@extends('layouts.rms')

@section('content')
	<x-forms.animal-details-form :type="$formType" />
@endsection