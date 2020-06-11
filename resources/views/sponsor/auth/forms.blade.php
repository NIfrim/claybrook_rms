@extends('layouts.app')

@section('content')

    <x-website.web-login-form :loginRoute="$loginRoute"/>
    
@endsection
