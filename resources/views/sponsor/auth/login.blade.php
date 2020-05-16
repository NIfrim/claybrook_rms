@extends('layouts.app')

@section('content')
<div class="container">
    <x-web-login-form :title="$title" :loginRoute="$loginRoute"/>
</div>
@endsection
