@extends('layouts.app')

@section('content')
    <div class="container">
        <x-website.web-login-form :loginRoute="$loginRoute"/>
    </div>
@endsection
