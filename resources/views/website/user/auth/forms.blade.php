@extends('layouts.app')

@section('content')
    <div class="container">
        <x-web-login-form :loginRoute="$loginRoute"/>
        <x-user-registration-form :registerRoute="$registerRoute"/>
    </div>
@endsection
