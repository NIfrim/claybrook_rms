@extends('layouts.rms')

@section('login')

        <x-forms.admin-login-form :loginRoute="$loginRoute"/>

@endsection
