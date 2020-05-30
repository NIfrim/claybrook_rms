@extends('layouts.app')

@section('content')
    <div class="container">
        <x-web-login-form :loginRoute="$loginRoute"/>
        <x-sponsor-registration-form :registerRoute="$registerRoute"/>
    </div>
@endsection
