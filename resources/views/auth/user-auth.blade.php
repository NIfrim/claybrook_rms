@extends('layouts.app')

@section('content')
<div class="flex-column">
    {{--User login row--}}
    <div class="row justify-content-center">
        <div class="container rowTitle">
            <h1>Login</h1>
        </div>
        <x-login-form userType="user" />
    </div>

    {{--User register row--}}
    <div class="row justify-content-center">
        <div class="container rowTitle">
            <h1>Register</h1>
        </div>
        <x-register-form userType="user" />
    </div>
</div>
@endsection
